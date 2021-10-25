@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{ asset('News/' . $news->photo)}}" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><strong>{{$news->title}}</strong></h4>
                        <p class="card-text">{{$news->description}}</p>
                        <p class="card-text"><small class="text-muted">Last updated {{$news->created_at}}</small></p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection