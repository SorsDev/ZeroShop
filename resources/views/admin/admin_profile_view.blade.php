@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Perfil</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Extra</li>
                            <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12 col-lg-5 col-xl-4">

                <div class="box box-inverse bg-img"
                    style="background-image: url({{asset('backend/images/gallery/full/1.jpg')}});" data-overlay="2">
                    <div class="flexbox px-20 pt-20">
                        <label class="toggler toggler-danger text-white">
                            <input type="checkbox">
                            <i class="fa fa-heart"></i>
                        </label>
                    </div>

                    <div class="box-body text-center pb-50">
                        <a href="#">
                            <img class="avatar avatar-xxl avatar-bordered"
                                src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}"
                                alt="">
                        </a>
                        <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{ $adminData->name }}</a>
                        </h4>
                        <span><i class="fa fa-map-marker w-20"></i> {{$adminData->address}}</span>
                    </div>
                </div>

                <!-- Profile Image -->
                <div class="box">
                    <div class="box-body box-profile">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <p>Email :<span class="text-gray pl-10">{{$adminData->email}}</span> </p>
                                    <p>Phone :<span class="text-gray pl-10">{{$adminData->phone}}</span></p>
                                    <p>Address :<span class="text-gray pl-10">{{$adminData->address}}</span></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pb-15">
                                    <p class="mb-10">Social Profile</p>
                                    <div class="user-social-acount">
                                        <a class="btn btn-circle btn-social-icon btn-facebook"
                                            href="{{$adminData->facebook}}" target="__blank"><i
                                                class="fa fa-facebook"></i></a>
                                        <a class="btn btn-circle btn-social-icon btn-twitter"
                                            href="{{$adminData->twitter}}" target="__blank"><i
                                                class="fa fa-twitter"></i></a>
                                        <a class="btn btn-circle btn-social-icon btn-instagram"
                                            href="{{$adminData->instagram}}" target="__blank"><i
                                                class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <div class="col-12 col-lg-7 col-xl-8">

                <div class="nav-tabs-custom box-profile">
                    <ul class="nav nav-tabs">
                        <li><a class="active" href="#welcomed" data-toggle="tab">Perfil</a></li>
                        <li><a href="#settings" data-toggle="tab">Configuración</a></li>
                        <li><a href="#activity" data-toggle="tab">Usuario</a></li>
                    </ul>

                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="active tab-pane" id="welcomed">

                            <div class="box p-15">
                                @php
                                    date_default_timezone_set('America/Lima');
                                    setlocale(LC_TIME, 'es_ES.UTF-8');
                                @endphp
                                <div class="timeline timeline-line-dotted">
                                    <span class="timeline-label">
                                        <span class="badge badge-pill badge-primary badge-lg">@php echo date('l jS \of F Y h:i:s A'); @endphp</span>
                                    </span>
                                    <div class="timeline-item">
                                        <div class="timeline-point timeline-point-success">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="timeline-event">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Bienvenido {{$adminData->name}} </h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p>En esta sección vas a poder modificar tus datos personales.</p>
                                            </div>
                                            <div class="timeline-footer">
                                                <p class="text-right">@php echo date("l") @endphp</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="tab-pane" id="settings">

                            <div class="box p-15">

                                <form action="{{route('admin.profile.store')}}" method="POST"
                                    class="form-horizontal form-element col-12" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 control-label">Email</label>

                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control"
                                                value="{{$adminData->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 control-label">Nombre</label>

                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control"
                                                value="{{$adminData->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPhone" class="col-sm-2 control-label">Teléfono</label>

                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" name="phone" id="inputPhone"
                                                value="{{$adminData->phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPhone" class="col-sm-2 control-label">Ubicación</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address" id="inputPhone"
                                                value="{{$adminData->address}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="facebook">Facebook :</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-facebook"></i>
                                                    </div>
                                                    <input type="text" class="form-control" name="facebook"
                                                        value="{{$adminData->facebook}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="twitter">Twitter :</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-twitter"></i>
                                                    </div>
                                                    <input type="text" class="form-control" name="twitter"
                                                        value="{{$adminData->twitter}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="instagram">Instagram :</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-instagram"></i>
                                                    </div>
                                                    <input type="text" class="form-control" name="instagram"
                                                        value="{{$adminData->instagram}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="firstName5">Foto de perfil :</label>
                                                <input type="file" class="form-control" id="image"
                                                    name="profile_photo_path">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="firstName5">Foto:</label>
                                            <div class="form-group">
                                                <img id="showImage"
                                                    src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}"
                                                    style="width: 250px; height:250px;" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <div class="checkbox">
                                                <input type="checkbox" id="basic_checkbox_1" checked="">
                                                <label for="basic_checkbox_1"> I agree to the</label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms and Conditions</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" hr
                                                class="btn btn-rounded btn-success">Actualizar</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="activity">

                            <div class="box p-15">

                                <form action="{{route('admin.change.password')}}" method="POST" class="form-horizontal form-element col-12">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputPhone" class="col-sm-2 control-label">Contraseña Actual</label>

                                        <div class="col-sm-10">
                                            <input type="password" name="oldpassword" id="current_password" class="form-control" required>
                                            @error('oldpassword')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPhone" class="col-sm-2 control-label">Contraseña Nueva</label>

                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password" id="password" required>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPhone" class="col-sm-2 control-label">Confirmar
                                            Contraseña</label>

                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" >
                                            @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="ml-auto col-sm-10">
                                            <div class="checkbox">
                                                <input type="checkbox" id="basic_checkbox_1" checked="">
                                                <label for="basic_checkbox_1"> I agree to the</label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms and Conditions</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="ml-auto col-sm-10">
                                            <button type="submit" class="btn btn-rounded btn-success">Actualizar</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
