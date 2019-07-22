@extends('layouts.apps')

@section('content')

<html>
<br>
<br>

<h3 align="center"><b>All Products</b></h3>


<div class="row-2">
    <div class="col-2 pr-1">
	@role('admin')
        <a href="{{ Route('admin.products.create') }}"class="nav-link btn btn-success">ADD Product</a>
    @endrole
    </div>
</div>

<br>

<table class="table">
    <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Code</th>
          <th>Price</th>
          <th>Details</th>
          <th>CreatedBy</th>
          <th>Brand</th>
          <th>Group</th>
          @role('admin')
          <th width = 200>Action</th>
          @endrole
        </tr>
    </thead>
    @foreach ($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->product_name }}</td>
          <td>{{ $product->product_code }}</td>
          <td>{{ $product->product_price }}</td>
          <td>{{ $product->product_detail }}</td>
          <td>{{ $product->product_createdBy }}</td>
          <td>{{ $product->product_brand }}</td>
          <td>{{ $product->product_group }}</td>
          <td>{{ $product->group_id}}</td>
          <td>
          @role('admin')<a href="{{ Route('admin.products.edit', $product->id) }}" class="btn btn-info">Edit</a>

          <form method="POST" action="{{ route('admin.products.destroy',$product->id) }}">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
          </form>
          @endrole
          {{-- @role('customer') --}}

          <form method="POST" action="{{ route('admin.products.store',$product->id) }}">
            <input type="submit" value="Bug" onclick="return confirm(' ')" class="btn btn-facebook"/>
          </form>

          {{-- @endrole --}}
          </td>

      </tr>
    @endforeach
    </tbody>


</table>
{{ $products->links() }}


</html>

@endsection
