@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Mentors Near You</h2>
        <p>This is based off of your location services... or is it?... no... it's not</p>
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Course</th>
            </tr>
            </thead>
            <tbody id="myTable">
            <tr data-toggle="modal" data-target="#orderModal">
                <td>Roy</td>
                <td>Khoury</td>
                <td>Math</td>
            </tr>
            <tr data-toggle="modal" data-target="#orderModal">
                <td>Nico</td>
                <td>Brodeur Champagne</td>
                <td>Science</td>
            </tr>
            <tr data-toggle="modal" data-target="#orderModal">
                <td>Frank</td>
                <td>Hatchetnov</td>
                <td>History</td>
            </tr>
            <tr data-toggle="modal" data-target="#orderModal">
                <td>Siamak</td>
                <td>Samie</td>
                <td>Unravelling</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div id="orderModal" class="modal hide fade" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Name of Mentor</h5>
                </div>
                <div class="modal-body">
                    <h3>Understdability</h3>
                    <p>5/5</p>

                    <h3>Understdability</h3>
                    <p>5/5</p>

                    <h3>Understdability</h3>
                    <p>5/5</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

@endsection