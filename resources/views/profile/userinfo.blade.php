@extends('layouts.appProfile')

@section('content')

<html>
<br>
<br>
<div class="container">
<h3 align=""><b>จัดการกับบัญชีของฉัน</b></h3>

<table class="table table-bordered table-sm" >
    <thead>
      <tr>
        <th><b>ข้อมูลส่วนตัว</b><br><br>{{ $current_user->user_firstname }} {{$current_user->user_lastname}}<br>{{ $current_user->email }} </th><br>

        <th><b>ที่อยู่ใบกำกับภาษี</b><br><br><br>{{ $current_user->user_LineUID }} </th>
      </tr>
    </thead>
    <tr>
    </tr>
</table>

<h3 align=""><b>รายการคำสั่งซื้อล่าสุด</b></h3>
<table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>คำสั่งซื้อ #</th>
        <th>สั่งซื้อวันที่</th>
        <th>รายการสินค้า</th>
        <th>ยอดรวมทั้งสื้น</th>
      </tr>
    </thead>
</table>
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
