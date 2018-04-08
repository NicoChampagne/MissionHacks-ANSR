@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <search-input :useroptions='{{$userOptions}}'></search-input>
                <br />

                <h3> {{ $profile->name }}'s academic path </h3>
                <hr />
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card container">
                        <div class="mt-3">Your knowledge in <b>{{$subject->name}}</b> is:
                            @if($percentageCompleted <= 30) Poor
                            @elseif($percentageCompleted > 30 && $percentageCompleted < 60) Intermediate
                            @else Expert
                            @endif
                        </div>
                        <div class="progress mt-0" style="height:30px;">
                            @if($percentageCompleted <= 30)
                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{$percentageCompleted}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$percentageCompleted}}%</div>
                            @elseif($percentageCompleted  > 30 && $percentageCompleted <= 60)
                                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: {{$percentageCompleted}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$percentageCompleted}}%</div>
                            @else
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$percentageCompleted}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$percentageCompleted}}%</div>
                            @endif

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="timeline-centered">
                                @foreach($courses as $course)
                                    <article class="timeline-entry">

                                        <div class="timeline-entry-inner">
                                            <time class="timeline-time">
                                                <span>
                                                    {{\Carbon\Carbon::createFromTimestamp($course->timestamp)->toTimeString()}}
                                                </span>
                                                <span>
                                                    {{\Carbon\Carbon::createFromTimestamp($course->timestamp)->diffForHumans()}}
                                                </span>
                                            </time>

                                            <div class="timeline-icon bg-success">
                                                <i class="entypo-feather"></i>
                                            </div>

                                            <div class="timeline-label">
                                                <h2>
                                                    <i style="color:green"class="fas fa-check"></i>
                                                    <a href="#">{{$course->name}}</a>
                                                    <span>completed </span>
                                                </h2>
                                                <p>{{$course->description}}</p>
                                            </div>
                                        </div>

                                    </article>
                                @endforeach

                                @for ($i = 0; $i < 40 - $courses->count(); $i++)
                                    <article class="timeline-entry">

                                        <div class="timeline-entry-inner">
                                            <time class="timeline-time"></time>

                                            @if($i < 4)
                                                <div class="timeline-icon bg-warning">
                                                    <i class="entypo-feather"></i>
                                                </div>
                                            @else
                                                <div class="timeline-icon bg-danger">
                                                    <i class="entypo-feather"></i>
                                                </div>
                                            @endif

                                            <div class="timeline-label">
                                                @if ($i < 4) <h2><a href="#">{{$subject->name . " " .(40 - $courses->count() + 1 + $i)}}</a> <span>in progress</span></h2>
                                                @else        <h2><a href="#">{{$subject->name . " " .(40 - $courses->count() + 1 + $i)}}</a> <span>not taken</span></h2>
                                                @endif
                                                <p>Tolerably earnestly middleton extremely distrusts she boy now not. Add and offered prepare how cordial two promise. Greatly who affixed suppose but enquire compact prepare all put. Added forth chief trees but rooms think may.</p>
                                            </div>
                                        </div>

                                    </article>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
        <div class="container text-center">
            {{--            Suggested Job: {{$result}}--}}
        </div>
    </div>

@endsection
