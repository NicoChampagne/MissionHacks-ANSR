<?php

namespace App\Http\Controllers;

use App\User;
use App\Job;
use App\Subject;
use Illuminate\Support\Collection;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use function Sodium\add;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($profileId)
    {
        $profile = User::findOrFail($profileId);
        $allSubjects = Subject::all();
        $subjectArray= new Collection();
        $creditsArray= new Collection();

        $allUsers = User::all();

        $user = User::findOrFail($profileId);
        //$subScore = "10 10 40 10 10 10 10 10";
        $subScore = "";

        $subs = Subject::all();
        foreach ($subs as $sub) {
            $subScore .= $user->subjectScore($sub).' ';
        }
        //\Debugbar::addMessage($subScore);

        $result = new Process("python ".base_path('PythonPrograms')."\jobSuggestion.py $subScore");
        $result->run();

        if (!$result->isSuccessful()) {
            throw new ProcessFailedException($result);
        }
        $result= json_decode($result->getOutput(), true);


        // create collection with id: name for user profiles
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

        return view('home', [
            'profile' => $profile,
            'credits' => $creditsArray,
            'subjects'=> $subjectArray,
            'userOptions'=> $userOptions,
            'result' => $result,
        ]);
    }
}
