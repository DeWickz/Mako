@extends('layouts.apps')

@section('content')

<html>
<br>
<br>

<h3 align="center"><b>Users' Shopping Carts</b></h3>
<br>
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
          <th>Carts</th>

        </tr>
    </thead>
        @foreach($user_names as $user)
        <tr>

            <td>

                <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$user->user_firstname}} {{$user->user_lastname}}
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('editCart',$user->identifier)}}">Edit Cart</a>
                </div>
            </td>
            {{-- href="{{route('admin.carts.edit',$ci->user_id)}} --}}
            <td>
          {{-- @role('admin')
          <form method="POST" action="{{ route('admin.carts.destroy',$ci->id) }}">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
          </form>
          @endrole --}}
            </td>

      </tr>
      @endforeach
    </tbody>


</table>
{{-- {{ $cart_items->links() }} --}}


</html>

@endsection
