
    <div class = "container">
        <h3 style="padding-bottom: 20px;">Your Scheduled exams</h3>

        @foreach($exams as $exam)

            <div class="card border-info mb-3">
                <div class="card-header">{{$exam->subject->name}}</div>
                <div class="card-body text-info">
                    <h5 class="card-title">{{$exam->date()->diffForHumans()}}</h5>
                </div>
            </div>
        @endforeach
    </div>
