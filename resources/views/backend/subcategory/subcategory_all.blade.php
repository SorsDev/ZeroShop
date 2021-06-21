@extends('admin.admin_master')
@section('admin')


    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Listado Categorías <span class="badge badge-pill badge-danger"> {{ count($subcategories)}} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Categoría</th>
                                        <th>SubCategoría EN </th>
                                        <th>SubCategoría ES</th>
                                        <th>Creado</th>
                                        <th>Acciones</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subcategories as $subcategory)
                                        <tr>
                                            <td>{{$subcategory->category_id}}</td>
                                            <td>{{ $subcategory->subcategory_name_en }}</td>
                                            <td>{{ $subcategory->subcategory_name_es }}</td>
                                            <td>{{ Carbon\Carbon::parse($subcategory->created_at)->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-info" title="Edit Data">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{route('subcategory.delete',$subcategory->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <!--   ------------ Add Brand Page -------- -->
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Agregar Categoría </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('subcategory.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Categoría <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" required class="form-control">
                                                <option value="" selected>Seleccionar Categoría</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name_es}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Nombre SubCategoría English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_en" class="form-control">
                                            @error('subcategory_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Nombre SubCategoría Español <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_es" class="form-control">
                                            @error('subcategory_name_es')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Agregar Nuevo">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>




@endsection
