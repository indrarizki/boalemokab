@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center" >INFORMASI</h1>
                        <h3 class="card-title text-center" ><strong> Judul : {{$information->title}} </strong></h3>

                        <div class="card-image">
                            <img src="{{ asset('Information/' . $information->photo)}}" class="rounded mx-auto d-block" alt="Card image">
                        </div>
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