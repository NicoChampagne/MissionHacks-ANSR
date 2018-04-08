@extends('layouts.app')

@section('content')

    <div class="container">
        <div v-cloak class="col-lg-10 col-md-offset-1">


            <div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>

            <div id="field" data-field-id="{{$jobs}}" ></div>
            <div id="field2" data-field-id="{{$showMany}}" ></div>
        </div>
    </div>

    <script>

        var dataNames = $('#field').data("field-id");
        var counts = $('#field2').data("field-id");
        var data = [
            {
                x: dataNames,
                y: counts,
                type: 'bar',
                text: counts,
                marker: {
                    color: 'rgb(142,124,195)'
                }
            }

        ];
        var layout = {
            title: 'The Future'
        };

        Plotly.newPlot('myDiv', data,layout);

    </script>



@endsection