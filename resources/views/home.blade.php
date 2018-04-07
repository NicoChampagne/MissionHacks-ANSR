@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <line-chart :graphData='[1,2,4,5,2,5,3,3]'></line-chart>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
