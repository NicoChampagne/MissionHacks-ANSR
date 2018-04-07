@extends('layouts.app')

@section('content')

            <div class="fluid-container">
                <div class="jumbotron">
                    <div class="text-center">
                     <h1>EduPath</h1>
                    </div>
                </div>

                <div class="text-center container-fluid">
                    <h3>Please <a href="{{ route('register') }}">Register</a> or <a href="{{ route('login') }}">Login</a> to begin your Path!</h3>
                </div>
            </div>
        </div>

@endsection