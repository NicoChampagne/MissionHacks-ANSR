<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use App\Subject;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function suggestJob($id = 1) #$id
    {
         $user = User::find($id);
         //$subScore = "10 10 40 10 10 10 10 10";
         $subScore = "";

         $subs = Subject::all();
         foreach ($subs as $sub) {
             $subScore .= $user->subjectScore($sub).' ';
         }
        \Debugbar::addMessage($subScore);

        $result = new Process("python ".base_path('PythonPrograms')."\jobSuggestion.py $subScore");
        $result->run();

        if (!$result->isSuccessful()) {
            throw new ProcessFailedException($result);
        }
        $result= json_decode($result->getOutput(), true);

        return view("tester")->with(compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
