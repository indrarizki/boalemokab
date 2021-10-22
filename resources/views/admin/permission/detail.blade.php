@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center text-uppercase" >{{$permissions->type}}</h1>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="table-active">
                                        <th class="text-center"> No </th>
                                        <th class="text-center"> Jenis Perizinan </th>
                                        <th class="text-center"> Lama Pengerjaan </th>
                                        <th class="text-center"> Biaya </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-weight-medium text-center"> {{$permissions->index + 1}} </td>
                                        <td class="text-center"> {{$permissions->type}} </td>
                                        <td class="text-center"> {{$permissions->duration}} Hari</td>
                                        <td class="text-center"> {{$permissions->cost}} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-uppercase"><strong>syarat {{$permissions->type}} </strong></h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="table-active">
                                            <th class="text-center"> No </th>
                                            <th class="text-center"> Syarat </th>
                                        </tr>
                                    </thead>
                                    @foreach ($condition as $conditions)
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-medium text-center"> {{$loop->index + 1}} </td>
                                            <td class=""> {{$conditions->condition}} </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-uppercase" ><strong>langkah {{$permissions->type}}</strong></h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead >
                                        <tr class="table-active">
                                            <th class="text-center"> No </th>
                                            <th class="text-center"> Langkah </th>
                                        </tr>
                                    </thead>
                                    @foreach ($step as $steps)
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-medium text-center"> {{$loop->index + 1}} </td>
                                            <td class=""> {{$steps->step}} </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    @foreach ($form as $forms)
                    @if ($forms->file == null)
                    <div class="card-body">
                        
                    </div>
                    @else
                    <div class="card-body">
                        <embed src="{{ asset('Permission/' . $forms->file)}}" frameborder="0" width="100%" height="700px">
                    </div>
                    @endif
                    @endforeach
                    <div class="modal-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection