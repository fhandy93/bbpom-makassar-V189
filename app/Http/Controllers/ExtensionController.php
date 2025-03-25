<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Extension;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExtensionController extends Controller
{
    public function latar(){
        $latar = Extension::where('id',1)->first();
        return view('extension.latar', ['latar' => $latar]);
    }
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            "title"     => "required|unique:posts,title,".$id,
            "desc"      => "required",
            "keywords"  => "required",
            "meta_desc" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $exten = Extension::findOrFail($id);

        $new_cover = $request->file('cover');

        if($new_cover){
            if($exten->cover && file_exists(storage_path('app/public/' . $exten->cover))){
                unlink(public_path().'/storage/'.$exten->cover);
            }

            $new_cover_path = $new_cover->store('images/blog', 'public');

            $exten->cover = $new_cover_path;
        }

        $exten->title        = $request->title;
        $exten->slug         = $request->slug;
        $exten->desc         = $request->desc;
        $exten->keywords     = $request->keywords;
        $exten->meta_desc    = $request->meta_desc;
        $exten->updated_at   = date('Y-m-d H:i:s');
        $exten->save();

        return back()->with('succes', 'Data berhasil diupdate');
    }
    public function latarshow($slug){
        $post['post'] = Extension::where('slug', $slug)->first();
        $post['tag'] = Tag :: get();
        $post['category'] = Category :: with('posts')->get(); 
     

        return view('posts/exten_detail', compact('post'));
    }
    public function vm(){
        $vm = Extension::where('id',2)->first();
        return view('extension.vm', ['vm' => $vm]);
    }

    public function tf(){
        $tf = Extension::where('id',3)->first();
        return view('extension.tf', ['tf' => $tf]);
    }

    public function so(){
        $so = Extension::where('id',4)->first();
        return view('extension.so', ['so' => $so]);
    }
   
}
