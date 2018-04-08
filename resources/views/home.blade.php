@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <search-input :useroptions='{{$userOptions}}'></search-input>
                <br />

                <div class="card">
                    <div class="card-header"> {{ $profile->name }}'s academic path</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <quick-menu :icon-class='["fa fa-users", "fa fa-graduation-cap","fa fa-book","fa fa-sign-out-alt"]'
                                    :menu-url-list='["/profile/"+{{Auth::getUser()->id}},"/exams","/mentors"]'>
                        </quick-menu>
                        <polar-area :graphData='{{$credits}}'
                                    :graphLabels='{{$subjects}}'>

                        </polar-area>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
