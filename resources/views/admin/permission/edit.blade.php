@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><h3> Edit {{$permission->type}}</h3></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="card-body">
                                <div class="card" style="width: 22rem;">
                                    <button class="btn btn-primary" href="#" type="button" data-toggle="modal" data-target="#form">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Update Jenis </h5>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card" style="width: 23rem;">
                                    <button class="btn btn-primary" href="#" type="button" data-toggle="modal" data-target="#form_condition">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Update Syarat (PR)</h5>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card" style="width: 25rem;" >
                                    <button class="btn btn-primary" href="#" type="button" data-toggle="modal" data-target="#form_step">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Update Langkah (PR)</h5>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card" style="width: 23rem;">
                                    <button class="btn btn-primary" href="#" type="button" data-toggle="modal" data-target="#modal_form">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Update File (PR)</h5>
                                        </div>
                                    </button>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Kembali</a>
                            </div>

                            {{-- Modal Update Jenis --}}
                            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                            <form action="{{route('admin.permission.update.permission', $permission->id)}}" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="modal-header border-bottom-0">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Perizinan</label>
                                                    <input type="text" class="form-control" name="type" value="{{$permission->type}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Lama Pengerjaan</label>
                                                    <input type="number" class="form-control" name="duration" value="{{$permission->duration}}">
                                                </div>
                                                <div class="form-group">
                                                    <label >Biaya</label>
                                                    <input type="text" class="form-control" name="cost" value="{{$permission->cost}}">
                                                </div>
                                            </div>
                                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                @method('put')
                                                @csrf
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal Update Syarat Perizinan --}}
                            <div class="modal fade" id="form_condition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="modal-header border-bottom-0">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <table class="table table-bordered data-table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Syarat</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($condition as $conditions)
                                                    <tbody>
                                                            <tr>
                                                                <td>{{$loop->index + 1}}</td>
                                                                <td>
                                                                    <a href="" class="update" data-name="name" data-type="text" data-pk="a" data-title="Enter name">{{$conditions->condition}}
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>
                                            </div>
                                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                @method('put')
                                                @csrf
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal Update Langkah Perizinan --}}
                            <div class="modal fade" id="form_step" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="modal-header border-bottom-0">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <table class="table table-bordered data-table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Langkah</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($step as $steps)
                                                    <tbody>
                                                            <tr>
                                                                <td>{{$loop->index + 1}}</td>
                                                                <td>
                                                                    <a href="" class="update" data-name="name" data-type="text" data-pk="a" data-title="Enter name">{{$steps->step}}
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>
                                            </div>
                                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                @method('put')
                                                @csrf
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal Update Langkah Perizinan --}}
                            <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="modal-header border-bottom-0">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Update Formulir</label>
                                                    <input name="file" type="file" class="form-control-file" id="exampleFormControlFile1">
                                                    <br>
                                                    <img src="{{ asset('Permission/' . $permission->form_permission->file)}}" width="70px" height="70px" >
                                                </div>
                                            </div>
                                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                @method('put')
                                                @csrf
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection