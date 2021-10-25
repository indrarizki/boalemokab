<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('role');
    }

    public function show()
    {
        $publication= Publication::all();
        return view('admin.publication.show', ['publication' => $publication]);
    }

    public function form_create(Request $request)
    {
        $validatedData = $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'file' => ['required'],
        ]);

        $publication = new Publication();

        $publication->category = $request->input('category');
        $publication->name = $request->input('name');

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('Publication', $filename);
            $publication->file = $filename;
        }else{
            return $request;
            $publication->file = "";
        }

        $publication->save();

        return redirect()->route('admin.publication.ui')->with('success','Berita Berhasil Ditambahkan');

    }

    public function delete($id)
    {
        $publication = Publication::findOrFail($id);
        $file_path = public_path().'/Publication'.'/'.$publication->file;
        unlink($file_path);
        $publication->delete();
        return redirect()->route('admin.publication.ui')->with('success','Data Berhasil Dihapus');
    }

    public function detail($id)
    {
        $publication = Publication::where('id', '=', $id)->first();
        return view('admin.publication.detail', ['publication' => $publication]);
    }

    public function edit($id)
    {
        $publication = Publication::find($id);
        return view('admin.publication.edit', ['publication' => $publication]);
    }

    public function update(Request $request ,$id)
    {
        $publication = Publication::find($id);
        $publication->category = $request->input('category');
        $publication->name = $request->input('name');

        if ($request->hasfile('file'))
        {
            $destination = 'Publication/'. $publication->file;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('Publication', $filename);
            $publication->file = $filename;
        }   
        $publication->save();
        
        return redirect()->route('admin.publication.ui')->with('success','Data Berhasil Diupdate');
    }
}
