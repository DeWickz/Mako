@extends('layouts.apps')

@section('content')

<br>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Create Stock</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.stocks.store')}}">
                        @csrf

                        Product ID:

                        <input type="text" name="stock_product_id" class="form-control"/>

                        <br/>
                        Amount:

                        <input type="text" name="stock_amount" class="form-control"/>
                        <br>

                        Serial number:

                        <input type="text" name="stock_sn" class="form-control"/>
                        <br>

                        In:

                        <input type="text" name="stock_in" class="form-control"/>

                        <br/>

                        Out:

                        <input type="text" name="stock_out" class="form-control"/>

                        <br/>


                        <input type="submit" value="Save" class="btn btn-primary">
                    </form>

                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
