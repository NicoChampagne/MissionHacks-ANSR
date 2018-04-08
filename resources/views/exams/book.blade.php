@extends('layouts.app')

@section('content')

    <div class = "container" style="padding-bottom: 30px;">
        <h3 style="padding-bottom: 20px;">Schedule An Exam</h3>

        <form id="contact_form" action="{{route('bookExam')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}  <!-- needed for laravel security otherwise nothing works-->

            <div class="form-group">
                <label for="subject">Select Course</label>
                <select class="form-control" id="subject" name="subject" style="height: 35px;" required>
                    <option value="1" disabled selected>Select your course</option>
                    <option value="2" >Mathematics</option>
                    <option value="3" >Sciences</option>
                    <option value="4" >Languages</option>
                    <option value="5" >Arts</option>
                    <option value="6" >Physical Education</option>
                    <option value="7" >Social Studies</option>
                    <option value="8" >History</option>
                    <option value="9" >Practical Experience</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date">Choose a date</label><br />
                <div>
                    <datepicker id="date" name="date" required></datepicker>
                </div>
            </div>
            <input id="submit_button" class="btn btn-primary btn-lg btn-block" type="submit" value="Schedule Exam" />
        </form>
    </div>

    <hr />

    <div class = "container">
        <h3 style="padding-bottom: 20px;">Your Scheduled exams</h3>

        <div class="panel panel-info">
            <div class="panel-heading">Mathematics 1 (test) </div>
            <div class="panel-body">January 5 2019 (test)</div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">Mathematics 1 (test) </div>
            <div class="panel-body">January 5 2019 (test)</div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">Mathematics 1 (test) </div>
            <div class="panel-body">January 5 2019 (test)</div>
        </div>
    </div>


@endsection
