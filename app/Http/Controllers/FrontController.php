<?php

namespace App\Http\Controllers;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\{Aplikasi, Category, Comment, Extension, Tag, Post, View};
use Carbon\Carbon;

class FrontController extends Controller
{
    public function index()
    {
        $dateS = Carbon::now()->startOfMonth()->subMonth(6);
        $dateE = Carbon::now()->endOfMonth();
        $posts['post'] = Post::latest()
                                ->take(8)
                                ->get();
        $posts['exten'] = Extension::get();
        $posts['tag'] = Tag :: get();
        $posts['populer'] = Post::join('post_view', 'posts.id', '=', 'post_view.post_id')
                                ->whereBetween('posts.created_at',[$dateS,$dateE])
                                ->selectRaw('posts.*, count(post_view.id) as viewCount')
                                ->groupBy('posts.id')
                                ->orderBy('viewCount','DESC')
                                ->take(5)
                                ->get();
        $posts['top'] = Post::join('post_view', 'posts.id', '=', 'post_view.post_id')
                                ->whereBetween('posts.created_at',[$dateS,$dateE])
                                ->selectRaw('posts.*, count(post_view.id) as viewCount')
                                ->groupBy('posts.id')
                                ->orderBy('viewCount','DESC')
                                ->first();
                                
        
        return view('welcome', compact('posts'));
    }

    public function show($slug)
    {
        $post['post'] = Post::where('slug', $slug)->first();
        $post['post1'] = Post::where('id', $post['post']->id-1)->first();
        $post['post2'] = Post::where('id', $post['post']->id+1)->first();
        $post['post3'] = Comment::where('post_id', $post['post']->id)->get();
        
        $post['tag'] = Tag :: get();
        $post['category'] = Category :: with('posts')->get(); 
        
        $dt = Carbon::now()->toDateString();
        $ip = request()->ip();
        $view = View :: where([
                                ['post_id','=',$post['post']->id],
                                ['ip_addres','=',$ip]
                                ])
                                ->whereDate('created_at','=',$dt)
                                ->first();
        if(!$view){
            View::create([
                'post_id' => $post['post']->id,
                'ip_addres' => $ip,
                'agent' => request()->userAgent()
            ]);
        }
        
        return view('posts/post_detail', compact('post'));
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->latest()->get();
        return view ('welcome',compact('category','posts'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->latest()->get();
        return view ('welcome',compact('tag','posts'));
    }
    
    public function store(Request $request){
      $validator = Validator::make($request->all(), [
        "nama"     => "required",
        "email"     => "required",
        "comment"      => "required",
        'g-recaptcha-response' => 'required|captcha'
      
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    }
    $comm               = new Comment ();
    $comm->nama         = $request->nama;
    $comm->post_id      = $request->id;
    $comm->email        = $request->email;
    $comm->comment      = $request->comment;
    $comm->save();
    return back();

    }
    public function allnew(){
      $post['post'] = Post::latest()
                            ->paginate(8);
      $post['tag'] = Tag :: get();
      $post['category'] = Category :: with('posts')->get(); 
     
    
      return view('posts/post_all', compact('post'));
    }
    public function populer(){
      $dateS = Carbon::now()->startOfMonth()->subMonth(6);
      $dateE = Carbon::now()->endOfMonth();
      $post['post'] = Post::join('post_view', 'posts.id', '=', 'post_view.post_id')
                        ->whereBetween('posts.created_at',[$dateS,$dateE])
                        ->selectRaw('posts.*, count(post_view.id) as viewCount')
                        ->groupBy('posts.id')
                        ->orderBy('viewCount','DESC')
                        ->take(20)
                        ->paginate(8);
      $post['tag'] = Tag :: get();
      $post['category'] = Category :: with('posts')->get(); 
     
    
      return view('posts/post_all', compact('post'));
    }
    public function vc($id){
      $post['post'] = Post::where('category_id',$id)
                            ->latest()
                            ->paginate(8);
      $post['cat-title'] = Category::where('id',$id)
                            -> pluck('keywords')
                            -> first();
      $post['tag'] = Tag :: get();
      $post['category'] = Category :: with('posts')->get(); 
     
    
      return view('posts/post_category', compact('post'));
    }
    public function vt($id){
      $post['post'] = Post::whereHas('tags', function ($q) use($id) {
        $q->where('keywords', $id);
      })->paginate(8);;
      $post['tag-title'] = Tag::where('keywords',$id)
                            -> pluck('name')
                            -> first();
      $post['tag'] = Tag :: get();
      $post['category'] = Category :: with('posts')->get(); 
     
    
      return view('posts/post_tag', compact('post'));
    }
    public function search(Request $request){
      $data = $request['search'];
      if(!isset($data)){
        return back();
      }else{
          $post['post'] = Post::where('title', 'like', "%{$data}%")
          ->orWhere('desc', 'like', "%{$data}%")
          ->paginate(8);
          $post['data'] = $data;
          $post['tag'] = Tag :: get();
          $post['category'] = Category :: with('posts')->get(); 
          return view('posts/post_search', compact('post'));
      }
      
    }
    public function aplikasi(){
      $data = Aplikasi :: get();
      return view('app',['data'=>$data]);
    }
}