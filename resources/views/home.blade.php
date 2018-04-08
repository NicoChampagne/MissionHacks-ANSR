@extends('layouts.app')

@section('content')

    <div class="container text-center">
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

                        <polar-area :graphData='{{$credits}}'
                                    :graphLabels='{{$subjects}}'>

                        </polar-area>
                    </div>
                </div>
            </div>
        </div>
        <button style="margin-top: 20px" type="button" class="row text-center btn btn-info" data-toggle="modal" data-target="#exampleModal">
            Career Prediction
        </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Job Prediction</h5>
                </div>
                <div class="modal-body">
                    Based on your academic achievememnts and preferences, we have determined you are likely to become a(n) <span style="color:darkolivegreen;font-weight:bold; font-size:17px;">{{$result}}</span>. With more information the prediction becomes more accurate.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
