@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row outer-top-vs outer-bottom-small">
            <div class="col-md-3 sidebar-widget">
                <img class="card-img-top outer-bottom-small" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" style="border-radius: 50%" height="100%" width="100%" alt="">
                <ul class="list-group list-group-flush">
                    <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href=" {{route('user.logout')}} " class="btn btn-primary btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-6 sidebar-widget">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Change Password</span></h3>
                </div>
                <div class="card-body">
                    <form action="{{route('user.password.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="info-title">Current Password:</label>
                            <input type="password" name="oldpassword" id="current_password" class="form-control unicase-form-control text-input">
                            @error('oldpassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title">New Password</label>
                            <input type="password" name="password" id="password" class="form-control unicase-form-control text-input">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title">Confirmation Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
