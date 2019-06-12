@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addproduct.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="product_id" type="text" class="form-control @error('product_id') is-invalid @enderror" name="product_id" value="{{ old('product_id') }}" required autocomplete="product_id" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_code" class="col-md-4 col-form-label text-md-right">{{ __('Line ID') }}</label>

                            <div class="col-md-6">
                                <input id="product_code" type="text" class="form-control @error('product_code') is-invalid @enderror" name="product_code" value="{{ old('product_code') }}" required autocomplete="product_code" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="product_price" type="taxt" class="form-control @error('product_price') is-invalid @enderror" name="product_price" value="{{ old('product_price') }}" required autocomplete="product_price">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_detail" class="col-md-4 col-form-label text-md-right">{{ __('product_detail') }}</label>

                            <div class="col-md-6">
                                <input id="product_detail" type="taxt" class="form-control @error('product_detail') is-invalid @enderror" name="product_detail" required autocomplete="new-product_detail">

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="product_createdBy" class="col-md-4 col-form-label text-md-right">{{ __('product_createdBy') }}</label>

                            <div class="col-md-6">
                                <input id="product_createdBy" type="taxt" class="form-control" name="product_createdBy" required autocomplete="product_createdBy">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_brand" class="col-md-4 col-form-label text-md-right">{{ __('product_brand') }}</label>

                            <div class="col-md-6">
                                <input id="product_brand" type="text" class="form-control @error('product_brand') is-invalid @enderror" name="product_brand" value="{{ old('product_brand') }}" required autocomplete="product_brand" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_group" class="col-md-4 col-form-label text-md-right">{{ __('product_group') }}</label>

                            <div class="col-md-6">
                                <input id="product_group" type="text" class="form-control @error('product_group') is-invalid @enderror" name="product_group" value="{{ old('product_group') }}" required autocomplete="product_group" autofocus>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" value="Save" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
