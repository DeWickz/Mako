@extends('layouts.app')

@section('content')
<html>
<h3 align="center">All Products</h3>
<table class="table table-bordered">
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
          <td>{{ $product->product_id }}</td>
          <td>{{ $product->product_name }}</td>
          <td>{{ $product->product_code }}</td>
          <td>{{ $product->product_price }}</td>
          <td>{{ $product->product_detail }}</td>
          <td>{{ $product->product_createdBy }}</td>
          <td>{{ $product->product_brand }}</td>
          <td>{{ $product->product_group }}</td>
          <td>
          <a href="{{ Route('admin.addproduct.edit', $product->product_id) }}" class="btn btn-info">Edit</a>        
          <form method="POST" action="{{ route('admin.addproduct.destroy',$product->product_id) }}">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
          </form>
          </td>

      </tr>
    @endforeach
    </tbody>
</table>
<div class="row-2">
    <div class="col-2 pr-1">
      @role('admin')
        <li><a href="{{ route('admin.addproduct.create') }}" class="nav-link btn btn-primary">Add product</a></li>
      @endrole

      
    </div>
</div>
</html>

@endsection
