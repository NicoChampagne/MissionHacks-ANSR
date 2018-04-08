@extends('layouts.app')

@section('content')

    <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default panel-table rounded">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                    <tr>
                        <th><em class="fa fa-cog"> Name</em></th>
                        <th class="hidden-xs">Exam</th>
                        <th>Date</th>
                        <th>Passed?</th>

                    </tr>
                    </thead>
                    @foreach ($exams as $exam)
                        <tbody>
                        <tr>
                            <td>{{ $exam->user->name}}</td>
                            <td>{{ $exam->course->name }}</td>
                            <td>{{ $exam->date }}</td>
                            <td>
                                <form action="{{route('passOrFail')}}" method="POST" >
                                    {{ csrf_field() }}
                                    <input type="hidden" name="examid" value="{{$exam->id}}"/>
                                    <input type="radio" id="pass" name="passing" value="passed"> Passed
                                    <input type="radio" id="fail" name="passing" value="failed"> Failed
                                    <button type="sumbit">Enter</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>

            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col col-xs-4">Page 1 of 5
                    </div>
                    <div class="col col-xs-8">
                        <ul class="pagination hidden-xs pull-right">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                        </ul>
                        <ul class="pagination visible-xs pull-right">
                            <li><a href="#">«</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection