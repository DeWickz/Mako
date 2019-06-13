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
          @role('admin')
          <a href="{{ Route('admin.addproduct.edit', auth()->$product->product_id) }}" class="btn btn-info">Edit</a>



          <button class="delete-modal btn btn-danger"
            data-info="{$product->product_id}},{{$product->product_name}},{{$product->product_code}},{{$product->product_price}},
                       {{$product->product_detail}},{{$product->product_createdBy}},{{$product->product_brand}},{{$product->product_group}}">
            <span class="glyphicon glyphicon-trash"></span> Delete
          </button>
          </td>
          @endrole
          
      </form>
      </tr>
    @endforeach
    </tbody>
</table>
<div class="row-2">
    <div class="col-2 pr-1">
      @role('admin')
        <li><a href="/admin/adding" class="nav-link btn btn-primary">Add product</a></li>
      @endrole

      
    </div>
</div>
</html>

@endsection
