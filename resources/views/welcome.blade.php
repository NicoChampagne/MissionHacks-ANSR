@extends('layouts.app')

@section('content')

    <div v-cloak class="fluid-container text-center">
        <div class="jumbotron">
            <div class="text-center">
                <div>
                    <h2>EduPath</h2>
                    <h6><i class="fa fa-plane"></i><strong> Follow your own path </strong></h6>
                    <br />
                    <a class="btn btn-secondary btn-rounded text-light" href="{{ route('login') }}"><i class="fa fa-clone left"></i> Get started!</a>
                </div>
            </div>
        </div>
    </div>

@endsection