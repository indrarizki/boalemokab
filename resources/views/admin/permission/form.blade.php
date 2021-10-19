@extends('layouts.main_admin')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Perizinan</div>
                    <div class="card-body">
                        <form action="{{route('admin.permission.form')}}" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Jenis Perizinan</label>
                                    <input type="text" class="form-control" name="type">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Lama Pengerjaan (Hari)</label>
                                    <input type="number" class="form-control" name="duration" placeholder="3">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Biaya</label>
                                    <input type="text" class="form-control" name="cost">
                                </div>
                            </div>
                            <div class="panel panel-footer" >
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Syarat Perizinan</th>
                                            <th><a class="btn btn-primary addRow" id="addRow"><i class=""></i>+</a></th>
                                        </tr>
                                    </thead>
                                    <tbody id="condition">
                                        <tr>
                                        <td><input type="text" name="condition[]" class="form-control" required=""></td>
                                        <td><a class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                                        </tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="panel panel-footer" >
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Langkah Perizinan</th>
                                            <th><a class="btn btn-primary addRowStep"><i class=""></i>+</a></th>
                                        </tr>
                                    </thead>
                                    <tbody id="step">
                                        <tr>
                                        <td><input type="text" name="step[]" class="form-control" required=""></td>
                                        <td><a class="btn btn-danger remove1"><i class="glyphicon glyphicon-remove"></i></a></td>
                                        </tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Formulir Perizinan</label>
                                <input name="file" type="file" class="form-control-file" id="exampleFormControlFile1">
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
<script type="text/javascript">
    $('#condition').delegate(function(){
    });
    $('#addRow').on('click',function(){
        addRow();
    });
    function addRow()
    {
        var tr='<tr>'+
        '<td><input type="text" name="condition[]" class="form-control" required=""></td>'+
        '<td><a  class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
        '</tr>';
        $('#condition').append(tr);
    };
    $('.remove').live('click',function(){
        var last=$('#condition tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
    
    });

    $('#step').delegate(function(){
    });
    $('.addRowStep').on('click',function(){
        addRowStep();
    });
    function addRowStep()
    {
        var tr='<tr>'+
        '<td><input type="text" name="step[]" class="form-control" required=""></td>'+
        '<td><a  class="btn btn-danger remove1"><i class="glyphicon glyphicon-remove"></i></a></td>'+
        '</tr>';
        $('#step').append(tr);
    };
    $('.remove1').live('click',function(){
        var last=$('#step tr').length;
       
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
    
    });
</script>
@endsection