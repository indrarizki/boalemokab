@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center" >Publikasi</h1>
                        <div class="card-header">
                            <button class="btn btn-primary btn-sm" href="#" type="button" data-toggle="modal" data-target="#form">
                                    <h6 class="card-title text-center">+ Publikasi </h6>
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center"> No </th>
                                        <th class="text-center"> Kategori </th>
                                        <th class="text-center"> Nama </th>
                                        <th class="text-center"> File </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($publication as $publications)
                                    <tr>
                                        <td class="font-weight-medium text-center"> {{$loop->index + 1}} </td>
                                        <td class="text-center"> {{$publications->category}} </td>
                                        <td class="text-center "> {{$publications->name}} </td>
                                        <td class="text-center">{{$publications->file}}</td>
                                        <td class="text-center"> 
                                            <a href="{{route('admin.publication.detail.ui', $publications->id)}}" class="btn btn-primary btn-sm"><i class=""></i> Detail</a>
                                            <a href="{{route('admin.publication.edit.ui', $publications->id)}}" class="btn btn-secondary btn-sm"><i class=""></i> Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.publication.delete', $publications->id)}}" method="post">
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
                                <form action="{{route('admin.publication.form')}}" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="modal-header border-bottom-0">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="form-group">
                                             <label  for="inlineFormCustomSelect">Katageori </label>
                                            <select id="inlineFormCustomSelect" name="category">
                                                <option selected>Pilih...</option>
                                                <option value="Peraturan">Peraturan</option>
                                                <option value="Dokumen Perencanaan">Dokumen Perencanaan</option>
                                                <option value="Laporan">Laporan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="name" placeholder="Kegiatan DPM-ESDM Kab. Boalemo">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Upload File</label>
                                            <input name="file" type="file" class="form-control-file" id="exampleFormControlFile1">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Tambah Publikasi</button>
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