@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Galeri Foto </div>
                    <div class="card-body">
                        <form action="{{route('admin.gallery.update', $gallery->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Caption</label>
                                    <input type="text" class="form-control" value="{{$gallery->caption}}" name="caption">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Update Foto</label>
                                <input name="photo" type="file" class="form-control-file" id="exampleFormControlFile1">
                                <br>
                                <img src="{{ asset('Gallery/' . $gallery->photo)}}" width="100px" height="100px" alt="image">
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