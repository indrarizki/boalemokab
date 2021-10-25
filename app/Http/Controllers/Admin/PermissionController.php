<?php

namespace App\Http\Controllers\Admin;

use App\ConditionPermission;
use App\FormPermission;
use App\Http\Controllers\Controller;
use App\Permission;
use App\StepPermission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
public function __construct()
    {
        $this->middleware('role');
    }

    public function show()
    {
        $permission = Permission::all();
        return view('admin.permission.show', ['permission' => $permission]);
    }
    public function form()
    {
        return view('admin.permission.form');
    }

    public function form_create(Request $request)
    {
        $data=$request->all();
        $lastid=Permission::create($data)->id;

        if(count($request->condition) > 0) {
            foreach($request->condition as $conditionPermission=>$v){
            $data2=array(
                'permission_id'=>$lastid,
                'condition'=>$request->condition[$conditionPermission],
                );
            ConditionPermission::insert($data2);
            }
        } if(count($request->step) > 0){
            foreach($request->step as $stepPermission=>$s){
            $data3=array(
                'permission_id'=>$lastid,
                'step'=>$request->step[$stepPermission],
            );
            StepPermission::insert($data3);
            }
        }if($request->file){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('Permission', $filename);

            $data4 = [
                'permission_id'=>$lastid,
                'file'=>$filename
        ];
        FormPermission::insert($data4);
        } 
        return redirect()->route('admin.permission.ui')->with('success','Data Berhasil Ditambahkan');
    }    

    public function delete($id)
    {
        $permission = Permission::findOrFail($id);
        $file_path = public_path().'/Permission'.'/'.$permission->file;
        unlink($file_path);
        $permission->delete();
        return redirect()->route('admin.permission.ui')->with('success','Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        $conditionPermission = $permission->condition_permission()->get();
        $stepPermission = $permission->step_permission()->get();
        return view('admin.permission.edit', ['permission' => $permission,'condition' => $conditionPermission , 'step' => $stepPermission]);
    }

    public function update_permission(Request $request ,$id)
    {
        $permission = Permission::find($id);
        $permission->type = $request->input('type');
        $permission->duration = $request->input('duration');
        $permission->cost = $request->input('cost');
 
        $permission->save();
        return redirect()->route('admin.permission.edit.ui', $id)->with('success','Data Perizinan Berhasil Diupdate');
    }

    public function detail($id)
    {
        $permission = Permission::where('id', '=', $id)->first();
        $conditionPermission = $permission->condition_permission()->get();
        $stepPermission = $permission->step_permission()->get();
        $formPermission = $permission->form_permission()->get();
        
        return view('admin.permission.detail', ['permissions' => $permission, 'condition' => $conditionPermission, 'step' => $stepPermission, 'form' => $formPermission]);
    }

}
