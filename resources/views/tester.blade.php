@extends('layouts.app')

@section('content')

    <quick-menu :menu-count=count :icon-class=icons :menu-url-list=list></quick-menu>


    <div class="fluid-container">
        <div class="jumbotron">
            <div class="text-center">

                <h1>{{$result}}</h1>

            </div>
        </div>
        <div class="text-center container-fluid">
            <h3>Please <a href="{{ route('register') }}">Register</a> or <a href="{{ route('login') }}">Login</a> to begin your Path!</h3>
        </div>
    </div>
@endsection