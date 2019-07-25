@extends('layouts.appProfile')

@section('content')



<html>
<br>
<br>
<div class="container">
<h3><b>Your orders</b></h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Name</th>
        </tr>
    </thead>
    @foreach ($orders as $order)
        <tr>
        <td><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$order->order_code}}
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('profile.viewOrder',$order->order_code)}}">View Order</a>
            </div></td>
        <td>{{ $order->order_date }}</td>
        <td>{{ $order->order_name }}</td>
        </tr>
    @endforeach
</table>



</div>
</div>


</html>









@endsection
