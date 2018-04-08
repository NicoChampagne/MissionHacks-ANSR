<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\Job;
use App\Subject;
use Illuminate\Support\Collection;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        if (\Auth::check()) {
            redirect('/profile/'.\Auth::id());
        }
        return redirect()->back();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($profileId)
    {
        $profile = User::findOrFail($profileId);
        $allSubjects = Subject::all();
        $subjectArray= new Collection();
        $creditsArray= new Collection();

        $allUsers = User::all();

        // create collection with id and name for user profiles
        $userOptions = "[";
        foreach($allUsers as $user) {
            $userOptions = $userOptions . "{ value: \"". $user->id ."\", text: \"". $user->name . "\"},";
        }
        $userOptions = $userOptions . "]";


        foreach($allSubjects as $index => $subject) {
            $subjectArray->push($subject->name);
            $score = $profile->subjectScore($subject);
            $creditsArray->push($score);
        }

        //$user = User::findOrFail($uid);
        //$subScore = "10 10 40 10 10 10 10 10";
        $subScore = "";

        foreach ($creditsArray as $value) {
            $subScore .= $value.' ';
        }
        \Debugbar::addMessage($subScore);

        $result = new Process("python ".base_path('PythonPrograms')."\jobSuggestion.py $subScore");
        $result->run();

        if (!$result->isSuccessful()) {
            throw new ProcessFailedException($result);
        }
        $result= json_decode($result->getOutput(), true);

        return view('home', [
            'profile' => $profile,
            'credits' => $creditsArray,
            'subjects'=> $subjectArray,
            'userOptions'=> $userOptions,
            'result' => $result,
        ]);
    }

    public function subject($profileId, $subjectId)
    {
        $profile = User::findOrFail($profileId);

        $allUsers = User::all();
        $userOptions = "[";

        foreach($allUsers as $user) {
            $userOptions = $userOptions . "{ value: \"". $user->id ."\", text: \"". $user->name . "\"},";
        }
        $userOptions = $userOptions . "]";

        // get all courses completed from the current user, related to the specified
        $subject = Subject::findOrFail($subjectId);
        $courses = $profile->courses->where('subject_id', $subjectId);
        $completedRatio = ($courses->count()/40)*100;

        return view('subjects', [
            'userOptions'=> $userOptions,
            'profile'=> $profile,
            'courses'=> $courses,
            'subject'=>$subject,
            'percentageCompleted'=>$completedRatio
        ]);

    }
}
