@extends('layouts.apps')

@section('content')

<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Orders</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.orders.update', $order->id)}}">
                        {{method_field('PUT')}}
                        @csrf

                        Order name:

                        <input type="text" name="order_name" value="{{$order->order_name}}" class="form-control"/>

                        Order code:

                        <input type="text" name="order_code" value="{{$order->order_code}}" class="form-control"/>

                        Order date:

                        <input type="text" name="order_date" value="{{$order->order_date}}" class="form-control"/>

                        Order user ID:

                        <input type="text" name="order_user_id" value="{{$order->order_user_id}}" class="form-control"/>

                        Order PaymentMethod:

                        <input type="text" name="order_PaymentMethod" value="{{$order->order_PaymentMethod}}" class="form-control"/>

                        <br/>
                        <br/>

                        <input type="submit" value="Save" class="btn btn-sm btn-primary">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
