@extends('layouts.apps')

@section('content')

<html>
<br>
<br>

<h3 align="center"><b>All Groups</b></h3>

<div class="row-2">
    <div class="col-2 pr-1">
	@role('admin')
        <a href="{{ Route('admin.groups.create') }}"class="nav-link btn btn-success">ADD Groups</a>
		 @endrole
    </div>
</div>


<br>
<table class="table table-bordered">
    <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Product ID</th>

          @role('admin')
          <th width = 200>Action</th>
          @endrole
        </tr>
    </thead>
    @foreach ($groups as $group)
        <tr>
          <td>{{ $group->id }}</td>
          <td>{{ $group->group_name }}</td>
          <td>{{ $group->group_product_id }}</td>
          <td>
          @role('admin')
          <a href="{{ Route('admin.groups.edit', $group->id) }}" class="btn btn-info">Edit</a>
          <form method="POST" action="{{ route('admin.groups.destroy',$group->id) }}">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
          </form>
          @endrole
          </td>

      </tr>
    @endforeach
    </tbody>


</table>
{{ $groups->links() }}


</html>

@endsection
