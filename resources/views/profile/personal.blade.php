@extends('layouts.appProfile')

@section('content')

<html>
<br>
<br>
<div class="container">
<h3 align=""><b>ข้อมูลส่วนตัว</b></h3>

<table class="table table-bordered">
    <thead>
      <tr>
        <th><b>ชื่อ-สกุล</b><br>{{ $current_user->user_firstname }} {{$current_user->user_lastname}}<br></th><br>

        <th><b>Email</b><br>{{ $current_user->email }} </th>

        <th><b>เบอร์โทรศัพท์มือถือ</b><br>{{ $current_user->user_mobile }} </th>

      </tr>
      <tbody>
      <tr>
        <td><b>LineUID</b><br>{{ $current_user->user_LineUID }}  </td>
        <td><b>รหัสประจำตัวประชาชน</b><br>{{ $current_user->user_citizenID }}  </td>

      </tr>
    </thead>
    <tr>
    </tr>
</table>

        <a href="{{ Route('profile.editPersonal', $current_user->id) }}" class="btn btn-info">Edit</a>


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
