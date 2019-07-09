@extends('layouts.appProfile')

@section('content')

<html>
<br>
<br>
<div class="container">
<h3 align=""><b>สมุดที่อยู่</b></h3>

<table class="table table-bordered table-sm" >
    <thead>
      <tr>
        <th><b>ชื่อ-สกุล</b><br>{{ $current_user->user_firstname }} {{$current_user->user_lastname}}<br></th><br>
        @foreach($addresses as $address)
        <th><b>ที่อยู่</b><br>{{ $address->address_moo }} {{ $address->address_soi }} {{ $address->address_houseNo }} {{ $address->address_district }} {{ $address->address_province }} {{ $address->address_city }} {{ $address->address_state }} {{ $address->address_country }} {{ $address->address_postal_code }}</th>
        @endforeach
        <th><b>เบอร์โทรศัพท์มือถือ</b><br>{{ $current_user->user_mobile }} </th>

      </tr>

    </thead>
    <tr>
    </tr>
</table>

<div class="row-2">
    <div class="col-2 pr-1">
	@role('admin')
        <a href="{{ Route('profile.addAddress') }}"class="nav-link btn btn-success">+ เพิ่มที่อยู่ใหม่</a>
		 @endrole
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
