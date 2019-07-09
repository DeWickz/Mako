@extends('layouts.apps')

@section('content')

<br>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Create Product</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.products.store')}}">
                        @csrf

                        product_name:

                        <input type="text" name="product_name" class="form-control"/>
                        <br>
                        product_code:

                        <input type="text" name="product_code" class="form-control"/>
                        <br>
                        product_price:

                        <input type="text" name="product_price" class="form-control"/>
                        <br>

                        product_detail:

                        <input type="text" name="product_detail" class="form-control"/>

                        <br/>

                        product_createdBy:

                        <input type="text" name="product_createdBy" class="form-control"/>

                        <br/>
                        product_brand:

                        <input type="text" name="product_brand" class="form-control"/>

                        <br/>
                        product_group:

                        <input type="text" name="product_group" class="form-control"/>

                        <br/>
                        product_warranty:

                        <input type="text" name="product_warranty" class="form-control"/>

                        <br/>
                        product_model:

                        <input type="text" name="product_model" class="form-control"/>

                        <br/>

                        product_image:

                        <input type="text" name="product_images" class="form-control"/>

                        <br/>



                        group:
                        <br>
                        <br>
                        <select name="group_id">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->group_name }}<br/></option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <br>
                        <br>

                        <input type="submit" value="Save" class="btn btn-primary">

                    </form>

                        <br/>

                        <!DOCTYPE html>
                            <html>
                                <head>
                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
                                    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

                                </head>

                                <body>
                                    <div class="pl-2" class="dropzone form-control" method="post" enctype="multipart/form-data" >Image upload</div>
                                        {{ Form::open(array('url' => 'imageUpload', 'method' => 'PUT', 'name'=>'product_images', 'id'=>'myImageDropzone', 'class'=>'dropzone', 'files' => true)) }}
                                        {{ Form::close() }}
                                </body>
                            </html>
                        <br/>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
