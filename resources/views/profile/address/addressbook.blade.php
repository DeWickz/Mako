@extends('layouts.appProfile')

@section('content')

<html>
<br>
<br>
<div class="container">
<h3 align=""><b>สมุดที่อยู่</b></h3>

<table class="table table-bordered">
    <thead>
        <tr>
          <th>ชื่อ-สกุล</th>
          <th>ที่อยู่</th>
          <th>รหัสไปรษณีย์</th>
          <th>เบอร์โทร</th>

          <th width = 200>Action</th>

        </tr>
    </thead>
    @foreach ($user_address as $address)
        <tr>
          <td> {{ $address->address_owner }} </td>
          <td> {{ $address->address_moo }} {{ $address->address_soi }} {{ $address->address_houseNo }} {{ $address->address_district }} {{ $address->address_province }} {{ $address->address_city }} {{ $address->address_state }} {{ $address->address_country }} {{ $address->address_postal_code }}</td>
          <td> {{ $address->address_postal_code }}</td>
          <td> {{ $address->address_phone }}</td>
          <td>
          <a href="{{ Route('address.edit', $address->id) }}" class="btn btn-info">Edit</a>
          <form method="POST" action="{{ route('address.destroy',$address->id) }}">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
          </form>

          </td>

      </tr>
    @endforeach
    </tbody>

</table>

<div class="row-2">
    <div class="col-2 pr-1">

        <a href="{{ Route('profile.addAddress') }}"class="nav-link btn btn-success">+ เพิ่มที่อยู่ใหม่</a>

    </div>
</div>


</div>



    <!-- <tbody>
      <tr>
        <td> </td>
        <td> </td>
        <td> </td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table> -->
</div>


</html>

@endsection
