@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route'(Dropzone)' }}" class="dropzone" method="post" enctype="multipart/form-data">@csrf</form>
        </div>
    </div>
</div>
{{-- TEMPORARY working dropzone code here --}}
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
{{------------------------------------------}}
@endsection
