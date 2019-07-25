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
            <th><b>Item</b></th>
            <th><b>Price</b></th>
            <th><b>Quantity</b></th>
        </tr>
    </thead>
    @foreach ($viewing as $order)
        <tr>
        <td>{{ $order->name}}</td>
        <td>{{ $order->price }}</td>
        <td>{{ $order->qty }}</td>
        </tr>
    @endforeach
</table>



</div>
</div>


</html>









@endsection
