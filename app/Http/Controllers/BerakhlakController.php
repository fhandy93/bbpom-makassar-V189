<?php

namespace App\Http\Controllers;

use App\Models\Berakhlak;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerakhlakController extends Controller
{
    public function index(){
        return view('berakhlak.index');
    }
    public function menu($id){
        switch ($id) {
            case 'pelayanan':
              return 1;
              break;
            case 'akuntabel':
              return 2;
              break;
            case 'kompeten':
              return 3;
              break; 
            case 'harmonis':
              return 4;
              break;
            case 'loyal':
              return 5;
              break; 
            case 'adaptif':
              return 6;
              break; 
            case 'kolaboratif':
              return 7;
              break; 
          
          }
    }
    public function image($id){
        $data = Berakhlak :: where('menu',$this->menu($id))->where('type',1)->latest()->get();
        return view('berakhlak.image.imagev',['data'=>$data,'id'=>$this->menu($id),'url'=>$id]);
    }
    public function imageInput($id){
        return view('berakhlak.image.imagei',['idn'=>$this->menu($id), 'url'=>$id]);
    }
    public function imageStore(Request $request, $id){
        $request -> validate([
            'file' => ['required','mimes:jpeg,png,jpg'],
            'judul' => 'required',
        ]);
        try{
          $akhlak = new Berakhlak();
          $akhlak -> menu       = $id;
          $akhlak -> judul      = $request->judul;
          $akhlak -> desk       = $request->desc;
          $akhlak -> type       = 1;
          $akhlak -> user_id    = Auth::user()-> id;
          if($request->file != ''){        
            $path = public_path().'/storage/berakhlak/image/';

            //upload new file
            $file = $request->file;
            $filename1 = "/storage/berakhlak/image/".time().$file->getClientOriginalName();
            $file->move($path, $filename1);
            $akhlak->file = $filename1;
          }
          $akhlak->save();
          return back()->with('success','Data berhasil diinput');
        }catch(\Exception $e){
          return back()->with('unsuccess', $e->getMessage());
        }
    }
    public function deleteImage($id){
      try{
        $akhlak = Berakhlak::findOrFail($id);
        $akhlak -> delete();
        if($akhlak && file_exists(public_path().$akhlak->file)){
          unlink(public_path().$akhlak->file);
        }
        return back()->with('success','Data berhasil dihapus');
      }catch(\Exception $e){
        return back()->with('unsuccess',$e->getMessage());
      }
    }
    public function imageDetail($url,$id){
      $akhlak = Berakhlak :: Where('id',$id)->first();
      return view('berakhlak.detail_file',['data'=>$akhlak,'url'=>$url]);
    }
    public function imageEdit($url,$id){
      
    }
    public function video($id){
      $data = Berakhlak :: where('menu',$this->menu($id))->where('type',2)->latest()->get();
      return view('berakhlak.video.videov',['data'=>$data,'id'=>$this->menu($id),'url'=>$id]);
    }
    public function videoInput($id){
      return view('berakhlak.video.videoi',['idn'=>$this->menu($id), 'url'=>$id]);
    }
    public function videoStore(Request $request, $id){
      $request -> validate([
          'link' => 'required',
          'judul' => 'required',
      ]);
      try{
        $akhlak = new Berakhlak();
        $akhlak -> menu       = $id;
        $akhlak -> judul      = $request->judul;
        $akhlak -> desk       = $request->desc;
        $akhlak -> type       = 2;
        $akhlak -> user_id    = Auth::user()-> id;
        $akhlak-> file        = $request->link;
        $akhlak->save();
        return back()->with('success','Data berhasil diinput');
      }catch(\Exception $e){
        return back()->with('unsuccess', $e->getMessage());
      }
    }
    public function deleteVideo($id){
      try{
        $akhlak = Berakhlak::findOrFail($id);
        $akhlak -> delete();
        return back()->with('success','Data berhasil dihapus');
      }catch(\Exception $e){
        return back()->with('unsuccess',$e->getMessage());
      }
    }
    public function videoDetail($url,$id){
      $akhlak = Berakhlak :: Where('id',$id)->first();
      return view('berakhlak.detail_file',['data'=>$akhlak,'url'=>$url]);
    }
    public function file($id){
      $data = Berakhlak :: where('menu',$this->menu($id))->where('type',3)->latest()->get();
      return view('berakhlak.file.filev',['data'=>$data,'id'=>$this->menu($id),'url'=>$id]);
    }
    public function fileInput($id){
      return view('berakhlak.file.filei',['idn'=>$this->menu($id), 'url'=>$id]);
    }
    public function fileStore(Request $request, $id){
      $request -> validate([
          'file' => ['required','mimes:pdf,xlsx,docx,pptx'],
          'judul' => 'required',
      ]);
      try{
        $akhlak = new Berakhlak();
        $akhlak -> menu       = $id;
        $akhlak -> judul      = $request->judul;
        $akhlak -> desk       = $request->desc;
        $akhlak -> type       = 3;
        $akhlak -> user_id    = Auth::user()-> id;
        if($request->file != ''){        
          $path = public_path().'/storage/berakhlak/file/';

          //upload new file
          $file = $request->file;
          $filename1 = "/storage/berakhlak/file/".time().$file->getClientOriginalName();
          $file->move($path, $filename1);
          $akhlak->file = $filename1;
        }
        $akhlak->save();
        return back()->with('success','Data berhasil diinput');
      }catch(\Exception $e){
        return back()->with('unsuccess', $e->getMessage());
      }
  }
  public function deleteFile($id){
    try{
      $akhlak = Berakhlak::findOrFail($id);
      $akhlak -> delete();
      if($akhlak && file_exists(public_path().$akhlak->file)){
        unlink(public_path().$akhlak->file);
      }
      return back()->with('success','Data berhasil dihapus');
    }catch(\Exception $e){
      return back()->with('unsuccess',$e->getMessage());
    }
  }
  public function fileDetail($url,$id){
    $akhlak = Berakhlak :: Where('id',$id)->first();
    return view('berakhlak.detail_file',['data'=>$akhlak,'url'=>$url]);
  }
  public function link($id){
    $data = Berakhlak :: where('menu',$this->menu($id))->where('type',4)->latest()->get();
    return view('berakhlak.link.linkv',['data'=>$data,'id'=>$this->menu($id),'url'=>$id]);
  }
  public function linkInput($id){
    return view('berakhlak.link.linki',['idn'=>$this->menu($id), 'url'=>$id]);
  }
  public function linkStore(Request $request, $id){
    $request -> validate([
        'link' => 'required',
        'judul' => 'required',
    ]);
    try{
      $akhlak = new Berakhlak();
      $akhlak -> menu       = $id;
      $akhlak -> judul      = $request->judul;
      $akhlak -> desk       = $request->desc;
      $akhlak -> type       = 4;
      $akhlak -> user_id    = Auth::user()-> id;
      $akhlak-> file        = $request->link;
      $akhlak->save();
      return back()->with('success','Data berhasil diinput');
    }catch(\Exception $e){
      return back()->with('unsuccess', $e->getMessage());
    }
  }
  public function deleteLink($id){
    try{
      $akhlak = Berakhlak::findOrFail($id);
      $akhlak -> delete();
      return back()->with('success','Data berhasil dihapus');
    }catch(\Exception $e){
      return back()->with('unsuccess',$e->getMessage());
    }
  }
  public function linkDetail($url,$id){
    $akhlak = Berakhlak :: Where('id',$id)->first();
    return view('berakhlak.detail_file',['data'=>$akhlak,'url'=>$url]);
  }
  public function pelayanan(){
    $post['new_image'] = Berakhlak :: where('menu', 1)->where('type', 1)->latest()->first();
    $post['all_image'] = Berakhlak :: where('menu', 1)->where('type', 1)->take(5)->latest()->get();
    $post['new_video'] = Berakhlak :: where('menu', 1)->where('type', 2)->latest()->first();
    $post['all_video'] = Berakhlak :: where('menu', 1)->where('type', 2)->take(5)->latest()->get();
    $post['file'] = Berakhlak :: where('menu', 1)->where('type', 3)->latest()->paginate(8);
    $post['link'] = Berakhlak :: where('menu', 1)->where('type', 4)->latest()->paginate(8);

    return view('berakhlak.view_front',['post'=>$post,'menu'=>'Berorientasi Pelayanan','menu2'=>'pelayanan']);
  }
  public function fotoPelayanan(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',1)->where('type', 1)->latest()->paginate(5);
    $post['menu'] = 'Berorientasi Pelayanan';
    return view('berakhlak.view_all_foto', compact('post'));
  }
  public function videoPelayanan(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',1)->where('type', 2)->latest()->paginate(5);
    $post['menu'] = 'Berorientasi Pelayanan';
    return view('berakhlak.view_all_video', compact('post'));
  }
  public function akuntabel(){
    $post['new_image'] = Berakhlak :: where('menu', 2)->where('type', 1)->latest()->first();
    $post['all_image'] = Berakhlak :: where('menu', 2)->where('type', 1)->take(5)->latest()->get();
    $post['new_video'] = Berakhlak :: where('menu', 2)->where('type', 2)->latest()->first();
    $post['all_video'] = Berakhlak :: where('menu', 2)->where('type', 2)->take(5)->latest()->get();
    $post['file'] = Berakhlak :: where('menu', 2)->where('type', 3)->latest()->paginate(8);
    $post['link'] = Berakhlak :: where('menu', 2)->where('type', 4)->latest()->paginate(8);

    return view('berakhlak.view_front',['post'=>$post,'menu'=>'Akuntabel','menu2'=>'akuntabel']);
  }
  public function fotoAkuntabel(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',2)->where('type', 1)->latest()->paginate(5);
    $post['menu'] = 'Akuntabel';
    return view('berakhlak.view_all_foto', compact('post'));
  }
  public function videoAkuntabel(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',2)->where('type', 2)->latest()->paginate(5);
    $post['menu'] = 'Akuntabel';
    return view('berakhlak.view_all_video', compact('post'));
  }
  public function kompeten(){
    $post['new_image'] = Berakhlak :: where('menu', 3)->where('type', 1)->latest()->first();
    $post['all_image'] = Berakhlak :: where('menu', 3)->where('type', 1)->take(5)->latest()->get();
    $post['new_video'] = Berakhlak :: where('menu', 3)->where('type', 2)->latest()->first();
    $post['all_video'] = Berakhlak :: where('menu', 3)->where('type', 2)->take(5)->latest()->get();
    $post['file'] = Berakhlak :: where('menu', 3)->where('type', 3)->latest()->paginate(8);
    $post['link'] = Berakhlak :: where('menu', 3)->where('type', 4)->latest()->paginate(8);

    return view('berakhlak.view_front',['post'=>$post,'menu'=>'Kompeten','menu2'=>'kompeten']);
  }
  public function fotoKompeten(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',3)->where('type', 1)->latest()->paginate(5);
    $post['menu'] = 'Kompeten';
    return view('berakhlak.view_all_foto', compact('post'));
  }
  public function videoKompeten(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',3)->where('type', 2)->latest()->paginate(5);
    $post['menu'] = 'Kompeten';
    return view('berakhlak.view_all_video', compact('post'));
  }
  public function harmonis(){
    $post['new_image'] = Berakhlak :: where('menu', 4)->where('type', 1)->latest()->first();
    $post['all_image'] = Berakhlak :: where('menu', 4)->where('type', 1)->take(5)->latest()->get();
    $post['new_video'] = Berakhlak :: where('menu', 4)->where('type', 2)->latest()->first();
    $post['all_video'] = Berakhlak :: where('menu', 4)->where('type', 2)->take(5)->latest()->get();
    $post['file'] = Berakhlak :: where('menu', 4)->where('type', 3)->latest()->paginate(8);
    $post['link'] = Berakhlak :: where('menu', 4)->where('type', 4)->latest()->paginate(8);

    return view('berakhlak.view_front',['post'=>$post,'menu'=>'Harmonis','menu2'=>'harmonis']);
  }
  public function fotoHarmonis(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',4)->where('type', 1)->latest()->paginate(5);
    $post['menu'] = 'Harmonis';
    return view('berakhlak.view_all_foto', compact('post'));
  }
  public function videoHarmonis(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',4)->where('type', 2)->latest()->paginate(5);
    $post['menu'] = 'Harmonis';
    return view('berakhlak.view_all_video', compact('post'));
  }
  public function loyal(){
    $post['new_image'] = Berakhlak :: where('menu', 5)->where('type', 1)->latest()->first();
    $post['all_image'] = Berakhlak :: where('menu', 5)->where('type', 1)->take(5)->latest()->get();
    $post['new_video'] = Berakhlak :: where('menu', 5)->where('type', 2)->latest()->first();
    $post['all_video'] = Berakhlak :: where('menu', 5)->where('type', 2)->take(5)->latest()->get();
    $post['file'] = Berakhlak :: where('menu', 5)->where('type', 3)->latest()->paginate(8);
    $post['link'] = Berakhlak :: where('menu', 5)->where('type', 4)->latest()->paginate(8);

    return view('berakhlak.view_front',['post'=>$post,'menu'=>'Loyal','menu2'=>'loyal']);
  }
  public function fotoLoyal(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',5)->where('type', 1)->latest()->paginate(5);
    $post['menu'] = 'Loyal';
    return view('berakhlak.view_all_foto', compact('post'));
  }
  public function videoLoyal(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',5)->where('type', 2)->latest()->paginate(5);
    $post['menu'] = 'Loyal';
    return view('berakhlak.view_all_video', compact('post'));
  }
  public function adaptif(){
    $post['new_image'] = Berakhlak :: where('menu', 6)->where('type', 1)->latest()->first();
    $post['all_image'] = Berakhlak :: where('menu', 6)->where('type', 1)->take(5)->latest()->get();
    $post['new_video'] = Berakhlak :: where('menu', 6)->where('type', 2)->latest()->first();
    $post['all_video'] = Berakhlak :: where('menu', 6)->where('type', 2)->take(5)->latest()->get();
    $post['file'] = Berakhlak :: where('menu', 6)->where('type', 3)->latest()->paginate(8);
    $post['link'] = Berakhlak :: where('menu', 6)->where('type', 4)->latest()->paginate(8);

    return view('berakhlak.view_front',['post'=>$post,'menu'=>'Adaptif','menu2'=>'adaptif']);
  }
  public function fotoAdaptif(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',6)->where('type', 1)->latest()->paginate(5);
    $post['menu'] = 'Adaptif';
    return view('berakhlak.view_all_foto', compact('post'));
  }
  public function videoAdaptif(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',6)->where('type', 2)->latest()->paginate(5);
    $post['menu'] = 'Adaptif';
    return view('berakhlak.view_all_video', compact('post'));
  }
  public function kolaboratif(){
    $post['new_image'] = Berakhlak :: where('menu', 7)->where('type', 1)->latest()->first();
    $post['all_image'] = Berakhlak :: where('menu', 7)->where('type', 1)->take(5)->latest()->get();
    $post['new_video'] = Berakhlak :: where('menu', 7)->where('type', 2)->latest()->first();
    $post['all_video'] = Berakhlak :: where('menu', 7)->where('type', 2)->take(5)->latest()->get();
    $post['file'] = Berakhlak :: where('menu', 7)->where('type', 3)->latest()->paginate(8);
    $post['link'] = Berakhlak :: where('menu', 7)->where('type', 4)->latest()->paginate(8);

    return view('berakhlak.view_front',['post'=>$post,'menu'=>'Kolaboratif','menu2'=>'kolaboratif']);
  }
  public function fotoKolaboratif(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',7)->where('type', 1)->latest()->paginate(5);
    $post['menu'] = 'Kolaboratif';
    return view('berakhlak.view_all_foto', compact('post'));
  }
  public function videoKolaboratif(){
    $post['tag'] = Tag :: get();
    $post['category'] = Category :: with('posts')->get(); 
    $post['post'] = Berakhlak :: where('menu',7)->where('type', 2)->latest()->paginate(5);
    $post['menu'] = 'Kolaboratif';
    return view('berakhlak.view_all_video', compact('post'));
  }
}
