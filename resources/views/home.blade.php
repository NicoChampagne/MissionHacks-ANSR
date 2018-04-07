@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ Auth::user()->name }}'s academic path</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <quick-menu :icon-class='["fa fa-users", "fa fa-graduation-cap","fa fa-book","fa fa-sign-out-alt"]'
                                    :menu-url-list='["/profile","/exams","/mentors"]'>
                        </quick-menu>
                        <polar-area :graphData='[1,2,4,5,2,5,3,3]'></polar-area>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
