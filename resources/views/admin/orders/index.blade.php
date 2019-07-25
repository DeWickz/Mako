@extends('layouts.apps')

@section('content')

<html>
<br>
<br>

<h3 align="center"><b>All Orders</b></h3>
{{--
<div class="row-2">
    <div class="col-2 pr-1">
	@role('admin')
        <a href="{{ Route('admin.orders.create') }}"class="nav-link btn btn-success">ADD Order</a>
	@endrole
    </div>
</div> --}}


<br>
<table class="table table-bordered">
    <thead>
        <tr>
          <th>Code</th>
          <th>Date</th>
          <th>User</th>
          <th>Status</th>
          <th>PaymentMethod</th>

          @role('admin')
          <th width = 200>Action</th>
          @endrole
        </tr>
    </thead>

    @forelse($orders as $order)
        <tr>
          <td>{{ $order->order_code}}</td>
          <td>{{ $order->order_date }}</td>
          <td>{{$order->user_firstname}} {{$order->user_lastname}} (ID:{{ $order->order_user_id}}) </td>
          <td>{{ $order->order_status }}</td>
          <td>{{ $order->order_PaymentMethod}}</td>

          <td>
          @role('admin')
          <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-info">Edit</a>
            <form method="POST" action="{{route('admin.orders.destroy', $order->id)}}">
            @csrf
            {{ method_field('DELETE')}}
            <input type="submit" value="Delete" onclick="return confirm('Are you sure about that')"
            class="btn btn-primary btn-danger"/>
          </form>
          @endrole
          </td>

      </tr>
    @endforeach
    </tbody>


</table>
{{ $orders->links() }}



</html>

@endsection
