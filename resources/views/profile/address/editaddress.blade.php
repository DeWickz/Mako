@extends('layouts.appprofile')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Edit Address</div>
                <div class="card-body">
                <form method="POST" action="{{ route('address.update', $address->id)}}">
                    {{ method_field('PUT') }}
                    @csrf

                        ชื่อ-สกุล :

                        <input type="text" name="address_owner" value="{{ $address->address_owner }}" class="form-control"/>
                        <br>

                        เบอร์โทร :

                        <input type="text" name="address_phone" value="{{ $address->address_phone }}"class="form-control"/>
                        <br>

                        บ้านเลขที่ :

                        <input type="text" name="address_houseNo" value="{{ $address->address_houseNo }}"class="form-control"/>
                        <br>

                        หมู่ :

                        <input type="text" name="address_moo" value="{{ $address->address_moo }}" class="form-control"/>
                        <br>


                        ซอย :

                        <input type="text" name="address_soi" value="{{ $address->address_soi }}" class="form-control"/>
                        <br>


                        เขต/แขวง :

                        <input type="text" name="address_district" value="{{ $address->address_district }}" class="form-control"/>
                        <br>

                        จังหวัด :

                        <input type="text" name="address_province" value="{{ $address->address_province}}" class="form-control"/>
                        <br>

                        เมือง :

                        <input type="text" name="address_city" value="{{ $address->address_city}}" class="form-control"/>
                        <br>

                        รัฐ :

                        <input type="text" name="address_state" value="{{ $address->address_state}}" class="form-control"/>
                        <br>

                        ประเทศ :

                        <input type="text" name="address_country" value="{{ $address->address_country}}" class="form-control"/>
                        <br>

                        รหัสไปรษณีย์ :

                        <input type="text" name="address_postal_code" value="{{ $address->address_postal_code}}" class="form-control"/>
                        <br>


                    <input type="submit" value="Save" class="btn btn-primary" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        @endsection
