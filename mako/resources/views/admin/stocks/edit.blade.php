@extends('layouts.apps')

@section('content')

<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Edit Stock</div>
                <div class="card-body">
                <form method="POST" action="{{ route('admin.stocks.update', $stock->id)}}">
                    {{ method_field('PUT') }}
                    @csrf

                    product_ID:
                    <input type="text" name="stock_product_id" value="{{ $stock->stock_product_id }}" class="form-control" />
                    <br />

                    amount:
                    <input type="text" name="stock_amount" value="{{ $stock->stock_amount }}" class="form-control" />
                    <br />

                    SN:
                    <input type="text" name="stock_SN" value="{{ $stock->stock_sn }}" class="form-control" />
                    <br />

                    in:
                    <input type="text" name="stock_in" value="{{ $stock->stock_in }}" class="form-control" />
                    <br />

                    out:
                    <input type="text" name="stock_out" value="{{ $stock->stock_out }}" class="form-control" />
                    <br />

                    <input type="submit" value="Save" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        @endsection
