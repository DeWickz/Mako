@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">All Users</h3>
        <br />
        <table class="table table-bordered">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
            @foreach($users as $row)
            <tr>
                <td>{{$row['user_firstname']}}</td>
                <td>{{$row['last_firstname']}}</td>
                <td>{{$row['email']}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
