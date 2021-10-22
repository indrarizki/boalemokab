@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center" >PERIZINAN</h1>
                        <div class="card-header"><a href="{{route('admin.permission.form.ui')}}" class="btn btn-primary btn-sm">+ Tambah Perizinan</a></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center"> No </th>
                                        <th class="text-center"> Jenis Perizinan </th>
                                        <th class="text-center"> Lama Pengerjaan </th>
                                        <th class="text-center"> Biaya </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($permission as $permissions)
                                    <tr>
                                        <td class="font-weight-medium text-center"> {{$loop->index + 1}} </td>
                                        <td class="text-center"> {{$permissions->type}} </td>
                                        <td class="text-center"> {{$permissions->duration}} Hari</td>
                                        <td class="text-center"> {{$permissions->cost}} </td>
                                        <td class="text-center"> 
                                            <a href="{{route('admin.permission.detail.ui', $permissions->id)}}" class="btn btn-primary btn-sm"><i class=""></i> Detail</a>
                                            <a href="{{route('admin.permission.edit.ui', $permissions->id)}}" class="btn btn-secondary btn-sm"><i class=""></i> Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.permission.delete', $permissions->id)}}" method="post">
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