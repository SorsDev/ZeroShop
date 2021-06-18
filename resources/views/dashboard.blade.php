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
                    <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href=" {{route('user.logout')}} " class="btn btn-primary btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-6 sidebar-widget">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi.....</span><strong>{{Auth::user()->name}}</strong> Welcome to SorsEcommerce</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
