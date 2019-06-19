@extends('layouts.apps')

@section('content')

<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Product') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('admin.products.store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="product_code" type="text" class="form-control @error('product_code') is-invalid @enderror" name="product_code" value="{{ old('product_code') }}" required autocomplete="product_code" autofocus>

                            @error('product_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="product_price" type="text" class="form-control @error('product_price') is-invalid @enderror" name="product_price" required autocomplete="new-product_price">

                            @error('product_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>

                            @enderror

                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="product_detail" class="col-md-4 col-form-label text-md-right">{{ __('Detail') }}</label>

                            <div class="col-md-6">
                                <input id="product_detail" type="text" class="form-control @error('product_detail') is-invalid @enderror" name="product_detail" required autocomplete="new-product_detail">

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="product_createdBy" class="col-md-4 col-form-label text-md-right">{{ __('CreatedBy') }}</label>

                            <div class="col-md-6">
                                <input id="product_createdBy" type="text" class="form-control" name="product_createdBy" required autocomplete="product_createdBy">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_brand" class="col-md-4 col-form-label text-md-right">{{ __('Brand') }}</label>

                            <div class="col-md-6">
                                <input id="product_brand" type="text" class="form-control @error('product_brand') is-invalid @enderror" name="product_brand" value="{{ old('product_brand') }}" required autocomplete="product_brand" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_group" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <input id="product_group" type="text" class="form-control @error('product_group') is-invalid @enderror" name="product_group" value="{{ old('product_group') }}" required autocomplete="product_group" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_warranty" class="col-md-4 col-form-label text-md-right">{{ __('Warranty') }}</label>

                            <div class="col-md-6">
                                <input id="product_warranty" type="text" class="form-control @error('product_warranty') is-invalid @enderror" name="product_warranty" value="{{ old('product_warranty') }}" required autocomplete="product_warranty" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_model" class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>

                            <div class="col-md-6">
                                <input id="product_model" type="text" class="form-control @error('product_model') is-invalid @enderror" name="product_model" value="{{ old('product_model') }}" required autocomplete="product_model" autofocus>

                            </div>
                        </div>



                    <div class="form-group row mb-0"></div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" value="Save" class="btn btn-sm btn-primary">
                                {{ __('Add') }}
                            </button>
                        </div>
                    </div>


                </form>

                <html>
                    <head>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
                        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
                    </head>

                    <body>
                        <div class="pl-2">Image upload</div>
                        {{ Form::open(array('url' => 'products', 'method' => 'PUT', 'name'=>'product_images', 'id'=>'myImageDropzone', 'class'=>'dropzone', 'files' => true)) }}
                        {{ Form::close() }}
                    </body>
                </html>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
