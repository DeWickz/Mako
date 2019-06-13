@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Edit Note</div>
                <div class="card-body">
                  <form method="POST" action="{{ route('admin.addproduct.update',$s->id) }}">
                    {{ method_field('PUT') }}
                    @csrf
                    Type:
                    <input type="text" name="product_name" value="{{ $s->product_name }}" class="form-control" />
                    <br />
                    Staffname:
                    <input type="text" name="product_code" value="{{ $s->product_code }}" class="form-control" />
                    <br />
                    Date:
                    <input type="date" name="product_price" value="{{ $s->product_price }}" class="form-control" />
                    <br />
                    Address:
                    <input type="text" name="product_detail" value="{{ $s->product_detail }}" class="form-control" />
                    <br />
                    Contact:
                    <input type="text" name="product_createdBy" value="{{ $s->product_createdBy }}" class="form-control" />
                    <br />
                    Note:
                    <input type="text" name="product_brand" value="{{ $s->product_brand }}" class="form-control" />
                    <br />
                    <input type="text" name="product_group" value="{{ $s->product_group }}" class="form-control" />
                    <br />
                    <input type="submit" value="Save" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
