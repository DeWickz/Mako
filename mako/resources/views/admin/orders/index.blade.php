@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="{{ route('admin.orders.create') }}" class="btn btn-sm btn-primary">Add</a>
                    </br></br>
                    <table class="table">
                        <tr>
                            <th>Order name</th>
                            <th></th>
                            @forelse($orders as $order)
                            <tr>
                                <td>{{ $order->order_name }}</td>
                                    <td><a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form method="POST" action="{{route('admin.orders.destroy', $order->id)}}">
                                            @csrf
                                            {{ method_field('DELETE')}}
                                            <input type="submit" value="Delete" onclick="return confirm('Are you sure about that')"
                                                   class="btn btn-primary btn-danger"/>
                                        </form>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="2">No records found</td>
                            </tr>
                            @endforelse
                            
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
