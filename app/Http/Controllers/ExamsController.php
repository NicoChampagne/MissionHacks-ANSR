<?php

namespace App\Http\Controllers;

use App\Exam;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$exams = Exam::findOrFail($id)->first();

        return view('exams.book');

    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) //user id
    {
        $exams = Exam::whereUserId($id)->get();

        return view('exams.scheduled',compact('exams'));

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
        $this->validate(request(), [
            'subject' => 'required',
            'date' => 'required',
        ]);

         Exam::create([
             'user_id' => \Auth::id(),
             'subject_id' => request('subject'),
             'date' => new Carbon(request('date')),//->toDateTimeString(),
        ]);

        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function edit(exams $exams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, exams $exams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function destroy(exams $exams)
    {
        //
    }
}
