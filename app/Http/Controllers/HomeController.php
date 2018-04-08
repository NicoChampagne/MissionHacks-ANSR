<?php

namespace App\Http\Controllers;

use App\User;
use App\Subject;
use Illuminate\Support\Collection;
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


        foreach($allSubjects as $index => $subject) {
            $subjectArray->push($subject->name);
            $score = $profile->subjectScore($subject);
            $creditsArray->push($score);
        }

        return view('home', [
            'profile' => $profile,
            'credits' => $creditsArray,
            'subjects'=> $subjectArray,
            'allusers'=> $allUsers
        ]);
    }
}
