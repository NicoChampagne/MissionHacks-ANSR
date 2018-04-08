<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        $exams = Exam::all();
        return view('admin', ['exams' => $exams]);
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'passing' => 'required',
            'examid' => 'required',
        ]);

        $exam = Exam::findOrFail(request('examid'));
        //$subj = $exam->subject;
        $user = $exam->user;
        if(strcmp(request('passing'), ('passed')) === 0 && !$user->hasCompleted($exam->course))
        {
            //$lvl = $user->subjectScore($subj) + 1;
            //$course = Course::whereName("$subj->name $lvl")->get();
            $user->courses()->attach($exam->course_id);
        }

        $exam->delete();

        return redirect()->back();
    }

}
