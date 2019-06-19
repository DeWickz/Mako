@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Orders</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.orders.store')}}">
                        @csrf

                        Order name:

                        <input type="text" name="order_name" class="form-control"/>

                        Order code:

                        <input type="text" name="order_code" class="form-control"/>

                        Order date:

                        <input type="text" name="order_date" class="form-control"/>

                        Order user ID:

                        <input type="text" name="order_user_id" class="form-control"/>

                        Order PaymentMethod:

                        <input type="text" name="order_PaymentMethod" class="form-control"/>

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