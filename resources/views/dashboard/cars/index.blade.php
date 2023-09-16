@extends('dashboard.layout')


@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1017.2px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row --> --}}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="container-fluid">
            @include('dashboard.inc.msg')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="float: right">سيارات</h3>
                            {{-- <h3 class="card-title">Responsive Hover Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-sm-12 col-md-6">
                                <a href="{{ url('dashboard/gallery/create') }}" type="button" class="btn btn-primary ">
                                    إضافة صور
                                </a>
                            </div> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover" >
                                <thead>
                                    <tr>
                                        <th> رقم </th>
                                        <th>الاسم</th>
                                        <th>البريد الالكتروني</th>
                                        <th>رقم التليفون</th>
                                        <th></th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cars as $id => $car)
                                        <tr>
                                            <td>{{ $id + 1 }}</td>
                                            <td>{{ $car->username }}</td>
                                            <td>{{ $car->title }}</td>
                                            <td>{{ $car->make }}</td>
                                            <td>{{ $car->model }}</td>
                                            
                                            <td>
                                                {{-- <button type="button" href="#"
                                                        class="btn btn-sm btn-info edit-btn" data-id="{{ $image->id }}"
                                                        data-desc="{{ $image->description }}"
                                                        data-toggle="modal" data-target="#edit-modal">
                                                        <i class="fas fa-edit"></i>
                                                    </button> --}}
                                                {{-- <a href="{{ url("dashboard/gallery/delete/$image->id") }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-trash"></i>
                                                </a> --}}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>



    {{-- <div class="modal fade" id="edit-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('dashboard.inc.msg')
                    <form method="POST" action="{{ url('dashboard/gallery/update') }}" id="edit-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="edit-form-id">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="desc" class="form-control" id="edit-form-desc">
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="edit-form" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </div> --}}
@endsection


{{-- @section('scripts')
   <script>
      $('.edit-btn').click(function(){
        let id = $(this).attr('data-id')
        let desc = $(this).attr('data-desc')


        console.log(id , desc);

        // $('#edit-form-id').val(id)
        // $('#edit-form-desc').val(nameEn)

      })
   </script>
@endsection --}}