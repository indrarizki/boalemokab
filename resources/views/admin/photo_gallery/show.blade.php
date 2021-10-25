@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center" >GALERI FOTO</h1>
                        <div class="card-header">
                            <button class="btn btn-primary btn-sm" href="#" type="button" data-toggle="modal" data-target="#form">
                                    <h6 class="card-title text-center">+ Galeri Foto </h6>
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center"> No </th>
                                        <th class="text-center"> Caption </th>
                                        <th class="text-center"> Foto </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($gallery as $gallerys)
                                    <tr>
                                        <td class="font-weight-medium text-center"> {{$loop->index + 1}} </td>
                                        <td class="text-center"> {{$gallerys->caption}} </td>
                                        <td class="text-center"><img src="{{ asset('Gallery/' . $gallerys->photo)}}" width="100px" height="70px" ></td>
                                        <td class="text-center"> 
                                            <a href="{{route('admin.gallery.detail.ui', $gallerys->id)}}" class="btn btn-primary btn-sm"><i class=""></i> Detail</a>
                                            <a href="{{route('admin.gallery.edit.ui', $gallerys->id)}}" class="btn btn-secondary btn-sm"><i class=""></i> Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.gallery.delete', $gallerys->id)}}" method="post">
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{route('admin.gallery.form')}}" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="modal-header border-bottom-0">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <label>Caption</label>
                                            <input type="text" class="form-control" name="caption" placeholder="Kegiatan DPM-ESDM Kab. Boalemo">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Upload Foto</label>
                                            <input name="photo" type="file" class="form-control-file" id="exampleFormControlFile1">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                        @method('post')
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
@endsection