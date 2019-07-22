@extends('layouts.appprofile')

@section('content')

<br>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>ADD Address</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.addressStore')}}">
                        {{ method_field('POST') }}
                        @csrf

                        ชื่อ-สกุล :

                        <input type="text" name="address_owner" class="form-control"/>
                        <br>

                        เบอร์โทร :

                        <input type="text" name="address_phone" class="form-control"/>
                        <br>

                        บ้านเลขที่ :

                        <input type="text" name="address_houseNo" class="form-control"/>
                        <br>

                        หมู่ :

                        <input type="text" name="address_moo" class="form-control"/>
                        <br>


                        ซอย :

                        <input type="text" name="address_soi" class="form-control"/>
                        <br>


                        เขต/แขวง :

                        <input type="text" name="address_district" class="form-control"/>
                        <br>

                        จังหวัด :

                        <input type="text" name="address_province" class="form-control"/>
                        <br>

                        เมือง :

                        <input type="text" name="address_city" class="form-control"/>
                        <br>

                        รัฐ :

                        <input type="text" name="address_state" class="form-control"/>
                        <br>

                        ประเทศ :

                        <input type="text" name="address_country" class="form-control"/>
                        <br>

                        รหัสไปรษณีย์ :

                        <input type="text" name="address_postal_code" class="form-control"/>
                        <br>


                        <input type="submit" value="Save" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
