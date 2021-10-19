@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center" >INFORMASI</h1>
                        <div class="card-header"><a href="{{route('admin.information.form.ui')}}" class="btn btn-primary btn-sm">+ Tambah Informasi</a></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center"> No </th>
                                        <th class="text-center"> Judul </th>
                                        <th class="text-center"> Deskripsi </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($information as $informations)
                                    <tr>
                                        <td class="font-weight-medium text-center"> {{$loop->index + 1}} </td>
                                        <td class="text-center"> {{$informations->title}} </td>
                                        <td class="text-center"> {{$informations->description}} </td>
                                        <td class="text-center"> 
                                            <a href="{{route('admin.information.detail.ui', $informations->id)}}" class="btn btn-primary btn-sm"><i class=""></i> Detail</a>
                                            <a href="{{route('admin.information.edit.ui', $informations->id)}}" class="btn btn-secondary btn-sm"><i class=""></i> Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.information.delete', $informations->id)}}" method="post">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection