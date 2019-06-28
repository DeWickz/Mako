@extends('layouts.apps')

@section('content')

<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Edit Groups</div>
                <div class="card-body">
                <form method="POST" action="{{ route('admin.groups.update', $group->id)}}">
                    {{ method_field('PUT') }}
                    @csrf
                    Name:
                    <input type="text" name="group_name" value="{{ $group->group_name }}" class="form-control" />


                    <input type="submit" value="Save" class="btn btn-primary" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        @endsection
