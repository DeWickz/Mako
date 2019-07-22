@extends('layouts.apps')

@section('content')

<html>
<br>
<br>

<h3 align="center"><b>All Stocks</b></h3>


<div class="row-2">
    <div class="col-2 pr-1">
	@role('admin')
        <a href="{{ Route('admin.stocks.create') }}"class="nav-link btn btn-success">ADD Stock</a>
		 @endrole
    </div>
</div>

<br>

<table class="table table-bordered">
    <thead>
        <tr>
          <th>ID</th>
          <th>Product ID</th>
          <th>Amount</th>
          <th>Serial Number</th>
          <th>Incoming</th>
          <th>Outgoing</th>

          @role('admin')
          <th width = 200>Action</th>
          @endrole
        </tr>
    </thead>
    @foreach ($stocks as $stock)
        <tr>
          <td>{{ $stock->id }}</td>
          <td>{{ $stock->stock_product_id }}</td>
          <td>{{ $stock->stock_amount }}</td>
          <td>{{ $stock->stock_sn }}</td>
          <td>{{ $stock->stock_in }}</td>
          <td>{{ $stock->stock_out }}</td>

          <td>
          @role('admin')
          <a href="{{ Route('admin.stocks.edit', $stock->id) }}" class="btn btn-info">Edit</a>
          <form method="POST" action="{{ route('admin.stocks.destroy',$stock->id) }}">
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
{{ $stocks->links() }}


</html>

@endsection
