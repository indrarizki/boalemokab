@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center" >BERITA</h1>
                        <div class="card-header">
                            <button class="btn btn-primary btn-sm" href="#" type="button" data-toggle="modal" data-target="#form">
                                    <h6 class="card-title text-center">+ Berita </h6>
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center"> No </th>
                                        <th class="text-center"> Kategori </th>
                                        <th class="text-center"> Judul </th>
                                        <th class="text-center"> Deskripsi </th>
                                        <th class="text-center"> Foto </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($news as $newss)
                                    <tr>
                                        <td class="font-weight-medium text-center"> {{$loop->index + 1}} </td>
                                        <td class="text-center"> {{$newss->category}} </td>
                                        <td class="text-center"> {{$newss->title}} </td>
                                        <td class="text-center"> {{$newss->description}} </td>
                                        <td class="text-center"><img src="{{ asset('News/' . $newss->photo)}}" width="100px" height="70px" ></td>
                                        <td class="text-center"> 
                                            <a href="{{route('admin.news.detail.ui', $newss->id)}}" class="btn btn-primary btn-sm"><i class=""></i> Detail</a>
                                            <a href="{{route('admin.news.edit.ui', $newss->id)}}" class="btn btn-secondary btn-sm"><i class=""></i> Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.news.delete', $newss->id)}}" method="post">
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
                                <form action="{{route('admin.news.form')}}" method="POST" enctype="multipart/form-data">
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
                                                <option value="Kabar Utama">Kabar Utama</option>
                                                <option value="Berita Internal">Berita Internal</option>
                                                <option value="Kegiatan Dinas">Kegiatan Dinas</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" name="title" placeholder="Kegiatan DPM-ESDM Kab. Boalemo">
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea type="text" class="form-control" name="description" placeholder=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Upload Foto</label>
                                            <input name="photo" type="file" class="form-control-file" id="exampleFormControlFile1">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">POST BERITA</button>
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