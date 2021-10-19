<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;

class InformationController extends Controller
{
 public function __construct()
    {
        $this->middleware('role');
    }

    public function show()
    {
        $information = Information::all();
        return view('admin.information.show', ['information' => $information]);
    }
    public function form()
    {

        return view('admin.information.form');
    }

    public function form_create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'photo' => ['required','image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ]);

        $information = new Information();
        $information->title = $request->input('title');
        $information->description = $request->input('description');

        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('Information', $filename);
            $information->photo = $filename;
        }else{
            return $request;
            $information->image = "";
        }

        $information->save();

        return redirect()->route('admin.information.ui')->with('success','Data Berhasil Ditambahkan');

    }

    public function delete($id)
    {
        $information = Information::findOrFail($id);
        $image_path = public_path().'/Information'.'/'.$information->photo;
        unlink($image_path);
        $information->delete();
        return redirect()->route('admin.information.ui')->with('success','Data Berhasil Dihapus');
    }

    public function detail($id)
    {
        $information = Information::where('id', '=', $id)->first();
        return view('admin.information.detail', ['information' => $information]);
    }

    public function edit($id)
    {
        $information = Information::find($id);
        return view('admin.information.edit', ['information' => $information]);
    }

    public function update(Request $request ,$id)
    {
        $information = Information::find($id);
        $information->title = $request->input('title');
        $information->description = $request->input('description');

        if ($request->hasfile('photo'))
        {
            $destination = 'Information/'. $information->photo;
            if(FacadesFile::exists($destination))
            {
                FacadesFile::delete($destination);
            }
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('Information', $filename);
            $information->photo = $filename;
        }    
        $information->save();
        return redirect()->route('admin.information.ui')->with('success','Data Berhasil Diupdate');
    }
}
