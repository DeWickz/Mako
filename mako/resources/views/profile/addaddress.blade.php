@extends('layouts.appprofile')

@section('content')

<br>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>ADD Address</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.addressStore')}}">
                        {{ method_field('POST') }}
                        @csrf

                        address_moo:

                        <input type="text" name="address_moo" class="form-control"/>
                        <br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
