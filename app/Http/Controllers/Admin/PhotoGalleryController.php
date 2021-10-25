<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PhotoGalleryController extends Controller
{
public function __construct()
    {
        $this->middleware('role');
    }

    public function show()
    {
        $gallery= PhotoGallery::all();
        return view('admin.photo_gallery.show', ['gallery' => $gallery]);
    }

    public function form_create(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => ['required','image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'caption' => ['required', 'string', 'max:255'],
        ]);

        $gallery = new PhotoGallery();

        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('Gallery', $filename);
            $gallery->photo = $filename;
        }else{
            return $request;
            $gallery->image = "";
        }
        $gallery->caption = $request->input('caption');
        $gallery->save();

        return redirect()->route('admin.gallery.ui')->with('success','Data Berhasil Ditambahkan');

    }

    public function delete($id)
    {
        $gallery = PhotoGallery::findOrFail($id);
        $image_path = public_path().'/Gallery'.'/'.$gallery->photo;
        unlink($image_path);
        $gallery->delete();
        return redirect()->route('admin.gallery.ui')->with('success','Data Berhasil Dihapus');
    }

    public function detail($id)
    {
        $gallery = PhotoGallery::where('id', '=', $id)->first();
        return view('admin.photo_gallery.detail', ['gallery' => $gallery]);
    }

    public function edit($id)
    {
        $gallery = PhotoGallery::find($id);
        return view('admin.photo_gallery.edit', ['gallery' => $gallery]);
    }

    public function update(Request $request ,$id)
    {
        $gallery = PhotoGallery::find($id);

        if ($request->hasfile('photo'))
        {
            $destination = 'Gallery/'. $gallery->photo;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('Gallery', $filename);
            $gallery->photo = $filename;
        }
        $gallery->caption = $request->input('caption');    
        $gallery->save();
        
        return redirect()->route('admin.gallery.ui')->with('success','Data Berhasil Diupdate');
    }
}
