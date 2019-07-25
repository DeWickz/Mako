@extends('layouts.appProfile')

@section('content')


<html>
<br>
<br>
<div class="container">
<h3><b>Payment Pending</b></h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:300px">Code</th>
            <th style="width:500px">Date</th>
            <th><b>Status</b></th>
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
        <td>{{ $order->order_status }}</td>
        </tr>
    @endforeach
</table>



</div>
</div>


</html>

@endsection
