@extends('layouts.app')

@section('content')

    <div class="col-md-10 col-md-offset-1">

        {{--<div class="panel panel-default panel-table rounded">--}}
            {{--<div class="panel-heading">--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}
                {{--<table class="table table-striped table-bordered table-list">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th><em>Job Title</em></th>--}}
                        {{--<th class="hidden-xs">Quantity</th>--}}

                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--@foreach($allJobs as $job => $howMany)--}}
                        {{--<tbody>--}}
                        {{--<tr>--}}
                            {{--<td>{{ $job}}</td>--}}
                            {{--<td>{{ $howMany }}</td>--}}
                        {{--</tr>--}}
                        {{--</tbody>--}}
                    {{--@endforeach--}}
                {{--</table>--}}

            {{--</div>--}}
            {{--<div class="panel-footer">--}}
                {{--<div class="row">--}}
                    {{--<div class="col col-xs-4">Page 1 of 5--}}
                    {{--</div>--}}
                    {{--<div class="col col-xs-8">--}}
                        {{--<ul class="pagination hidden-xs pull-right">--}}
                            {{--<li><a href="#">1</a></li>--}}
                            {{--<li><a href="#">2</a></li>--}}
                            {{--<li><a href="#">3</a></li>--}}
                            {{--<li><a href="#">4</a></li>--}}
                            {{--<li><a href="#">5</a></li>--}}
                        {{--</ul>--}}
                        {{--<ul class="pagination visible-xs pull-right">--}}
                            {{--<li><a href="#">«</a></li>--}}
                            {{--<li><a href="#">»</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

        <div>{{ $showMany }}</div>
        <div>{{ $jobs }}</div>

    <bar-chart :graphData='{{ $showMany }}'
                :graphLabels='{{ $jobs }}'>
    </bar-chart>

@endsection