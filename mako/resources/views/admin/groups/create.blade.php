@extends('layouts.apps')

@section('content')

<br>
<br>
<br>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Group') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.groups.store')}}">
                            @csrf

                            Group name:

                            <input type="text" name="group_name" class="form-control @error('groups_name') is-invalid @enderror"/>
                            <br>

                            Group product ID:

                            <input type="text" name="group_product_id" class="form-control @error('group_product_id') is-invalid @enderror"/>
                            <br>

                            Product ID:

                            <input type="text" name="product_id" class="form-control @error('product_id') is-invalid @enderror"/>
                            <br>


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
