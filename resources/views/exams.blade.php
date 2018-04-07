@extends('layouts.app')

@section('content')

    <div class = "container">
        <h3>Schedule An Exam</h3>

        <form id="contact_form" action="/createExam" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}  <!-- needed for laravel security otherwise nothing works-->
            <div class="form-group">
                <label for="name">Your name:</label><br />
                <input id="name" class="form-control" name="name" type="text" value="" size="30" required/><br />
            </div>
            <div class="form-group">
                <label for="email">Your email:</label><br />
                <datepicker></datepicker>
            </div>
            <div class="form-group">
                <label for="message">Your message:</label><br />
                <textarea id="message" class="form-control" name="message" rows="7" cols="30" required></textarea><br />
            </div>
            <input id="submit_button" class="btn btn-success btn-lg btn-block" type="submit" value="Send email" />
        </form>
    </div>
@endsection
