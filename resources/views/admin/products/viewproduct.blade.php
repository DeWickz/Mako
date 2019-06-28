@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">View product</div>
                <div class="card-body">
                    @csrf
                    product_name:
                    <textvalue"{{ $pro->product_name }}">
                    <br/>
                    product_code:
                    <taxtvalue"{{ $pro->product_code }}">
                    <br/>
                    product_price:
                    <taxtvalue"{{ $pro->product_price }}">
                    <br/>
                    product_detail:
                    <taxtvalue"{{ $pro->product_detail }}">
                    <br/>
                    product_createdBy:
                    <taxtvalue"{{ $pro->product_createdBy }}">
                    <br/>
                    product_brand:
                    <taxtvalue"{{ $pro->product_brand }}">
                    <br/>
                    product_group:
                    <taxtvalue"{{ $pro->product_group }}">
                    <br/>
                    product_warranty:
                    <taxtvalue"{{ $pro->product_warranty }}">
                    <br/>
                    product_model:
                    <taxtvalue"{{ $pro->product_model }}">
                    <br/>
                    <br/>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
