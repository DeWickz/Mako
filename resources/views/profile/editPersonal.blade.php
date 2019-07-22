@extends('layouts.appProfile')

@section('content')

<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Edit Personal</div>
                <div class="card-body">
                <form method="HEAD" action="{{ route('profile.updatePersonal', $current_user->id)}}">
                    {{ method_field('PUT') }}
                    @csrf

                    ชื่อ:
                    <input type="text" name="user_firstname" value="{{ $current_user->user_firstname }}" class="form-control" />
                    <br />

                    นามสกุล:
                    <input type="text" name="user_lastname" value="{{ $current_user->user_lastname }}" class="form-control" />
                    <br />

                    email:
                    <input type="text" name="email" value="{{ $current_user->email }}" class="form-control" />
                    <br />

                    เบอร์โทรศัพท์มือถือ:
                    <input type="text" name="user_mobile" value="{{ $current_user->user_mobile }}" class="form-control" />
                    <br />

                    LineUID:
                    <input type="text" name="user_LineUID" value="{{ $current_user->user_LineUID }}" class="form-control" />
                    <br />

                    รหัสประจำตัวประชาชน:
                    <input type="text" name="user_citizenID" value="{{ $current_user->user_citizenID }}" class="form-control" />
                    <br />

                    <input type="submit" value="Save" class="btn btn-primary" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        @endsection
