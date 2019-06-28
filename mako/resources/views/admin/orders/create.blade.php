@extends('layouts.apps')

@section('content')

<br>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Create Orders</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.orders.store')}}">
                        @csrf

                        Order name:

                        <input type="text" name="order_name" class="form-control"/>
                        <br>
                        Order code:

                        <input type="text" name="order_code" class="form-control"/>
                        <br>
                        Order date:

                        <input type="date" name="order_date" class="form-control"/>
                        <br>
                        Order user ID:

                        <input type="text" name="order_user_id" class="form-control"/>
                        <br>
                        {{-- <input type="text" name="order_user_id" value="{{$user->id}}" class="form-control"/> --}}

                        Order PaymentMethod:

                        <input type="text" name="order_PaymentMethod" class="form-control"/>

                        <br/>
                        <br/>

                        <input type="submit" value="Save" class="btn btn-primary">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
