@extends('layouts.apps')

@section('content')

<html>
<br>
<br>

@foreach($username as $name)
<h3 align="center"><b>{{$name->user_firstname}} {{$name->user_lastname}}'s Cart</b></h3>
@endforeach

<div class="row-2">
    <div class="col-2 pr-1">
        <a href="{{ Route('admin.carts.index') }}"class="nav-link btn btn-facebook">Back</a>
    </div>
</div>

<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width = 500>Product Name</th>
            <th width = 500>Action</th>
        </tr>
    </thead>
        {{-- foreach --}}
        <tr>
            <td>product name</td>

            <td>

            <form method="POST">
            {{-- action="{{ route('admin.carts.destroy',$product->id) }}"   --}}
             @csrf
                {{ method_field('DELETE') }}
                <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
            </form>

            </td>

        </tr>
        {{-- endforeach --}}
    </tbody>


</table>
{{-- {{ $cart_items->links() }} --}}


</html>

@endsection
