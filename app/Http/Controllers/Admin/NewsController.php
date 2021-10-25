<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
public function __construct()
    {
        $this->middleware('role');
    }

    public function show()
    {
        $news= News::all();
        return view('admin.news.show', ['news' => $news]);
    }

    public function form_create(Request $request)
    {
        $validatedData = $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'photo' => ['required','image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ]);

        $news = new News();

        $news->category = $request->input('category');
        $news->title = $request->input('title');
        $news->description = $request->input('description');

        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('News', $filename);
            $news->photo = $filename;
        }else{
            return $request;
            $news->image = "";
        }

        $news->save();

        return redirect()->route('admin.news.ui')->with('success','Berita Berhasil Ditambahkan');

    }

    public function delete($id)
    {
        $news = News::findOrFail($id);
        $image_path = public_path().'/News'.'/'.$news->photo;
        unlink($image_path);
        $news->delete();
        return redirect()->route('admin.news.ui')->with('success','Data Berhasil Dihapus');
    }

    public function detail($id)
    {
        $news = News::where('id', '=', $id)->first();
        return view('admin.news.detail', ['news' => $news]);
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', ['news' => $news]);
    }

    public function update(Request $request ,$id)
    {
        $news = News::find($id);
        $news->category = $request->input('category');
        $news->title = $request->input('title');
        $news->description = $request->input('description');

        if ($request->hasfile('photo'))
        {
            $destination = 'News/'. $news->photo;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('News', $filename);
            $news->photo = $filename;
        }   
        $news->save();
        
        return redirect()->route('admin.news.ui')->with('success','Data Berhasil Diupdate');
    }
}
