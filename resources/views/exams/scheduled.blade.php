
        <h3 style="padding-bottom: 20px;">Your Scheduled exams</h3>

        @foreach($exams as $exam)

        <div class="panel panel-info">
            <div class="panel-heading">{{$exam->subject->name}} </div>
            <div class="panel-body">{{$exam->date()->diffForHumans()}} </div>
        </div>
        @endforeach
