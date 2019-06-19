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

                        <div class="form-group row">
                            <label for="group_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="group_name" type="text" class="form-control @error('groups_name') is-invalid @enderror" name="group_name" value="{{ old('group_name') }}" required autocomplete="group_name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group_product_id" class="col-md-4 col-form-label text-md-right">{{ __('Group product ID') }}</label>

                            <div class="col-md-6">
                                <input id="group_product_id" type="text" class="form-control @error('groups_name') is-invalid @enderror" name="group_product_id" value="{{ old('group_product_id') }}" required autocomplete="group_product_id" autofocus>

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
