@extends('layouts.apps')

@section('content')

<html>
<br>
<br>

@foreach($username as $name)
<h3 align="center"><b>{{$name->user_firstname}} {{$name->user_lastname}}'s Cart</b></h3>
@endforeach

<div class="row-2">
    <div class="col-2 pr-1">
        <a href="{{ Route('admin.carts.index') }}"class="nav-link btn btn-facebook">Back</a>
    </div>
</div>

<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width = 400 class="font-weight-bold">Product Name</th>
            <th width = 400 class="font-weight-bold">Quantity</th>
            <th width = 400 class="font-weight-bold">Actions</th>
        </tr>
    </thead>
        @foreach($editing as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->qty}}</td>
            <td>
                <a type="button" class="btn btn-secondary" href="{{route('itemDel', ['rowid' => $product->rowId])}}">Remove</a>
            </td>
        </tr>
        @endforeach
    </tbody>


</table>
{{-- {{ $cart_items->links() }} --}}


</html>

@endsection
