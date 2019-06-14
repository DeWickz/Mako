@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Edit Product</div>
                <div class="card-body">
                  <form method="POST" action="{{ route('admin.addproduct.update',1,$products->product_id) }}">
                    {{ method_field('PUT') }}
                    @csrf
                    Name:
                    <input type="text" name="product_name" value="{{ $products->product_name }}" class="form-control" />
                    <br />
                    Code:
                    <input type="text" name="product_code" value="{{ $products->product_code }}" class="form-control" />
                    <br />
                    Price:
                    <input type="text" name="product_price" value="{{ $products->product_price }}" class="form-control" />
                    <br />
                    Detail:
                    <input type="text" name="product_detail" value="{{ $products->product_detail }}" class="form-control" />
                    <br />
                    CreatedBy:
                    <input type="text" name="product_createdBy" value="{{ $products->product_createdBy }}" class="form-control" />
                    <br />
                    Brand:
                    <input type="text" name="product_brand" value="{{ $products->product_brand }}" class="form-control" />
                    <br />
                    Group:
                    <input type="text" name="product_group" value="{{ $products->product_group }}" class="form-control" />
                    <br />
                    <input type="submit" value="Save" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
