@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Berita </div>
                    <div class="card-body">
                        <form action="{{route('admin.news.update', $news->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Kategori </label>
                                    <select class="form-control" name="category">
                                        <option selected>{{$news->category}}</option>
                                        <option value="Kabar Utama">Kabar Utama</option>
                                        <option value="Berita Internal">Berita Internal</option>
                                        <option value="Kegiatan Dinas">Kegiatan Dinas</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" value="{{$news->title}}" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea type="text" class="form-control" name="description" placeholder="{{$news->description}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Update Foto</label>
                                <input name="photo" type="file" class="form-control-file" id="exampleFormControlFile1">
                                <br>
                                <img src="{{ asset('News/' . $news->photo)}}" width="100px" height="100px" alt="image">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mb-2">Update Galeri</button>
                                @method('put')
                                @csrf
                                <a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Kembali</a>
                            </div>
                        </form>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection