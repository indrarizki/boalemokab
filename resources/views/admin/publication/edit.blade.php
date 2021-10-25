@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Berita </div>
                    <div class="card-body">
                        <form action="{{route('admin.publication.update', $publication->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Kategori </label>
                                    <select class="form-control" name="category">
                                        <option selected>{{$publication->category}}</option>
                                        <option value="Peraturan">Peraturan</option>
                                        <option value="Dokumen Perencanaan">Dokumen Perencanaan</option>
                                        <option value="Laporan">Laporan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" value="{{$publication->name}}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Update File</label>
                                <input name="file" type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mb-2">Update Publikasi</button>
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