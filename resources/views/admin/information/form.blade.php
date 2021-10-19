@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Informasi</div>
                    <div class="card-body">
                        <form action="{{route('admin.information.form')}}" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Tambah Foto</label>
                                <input name="photo" type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                                @method('post')
                                @csrf
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