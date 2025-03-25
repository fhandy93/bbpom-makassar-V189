<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User :: get ();
        return view ('user/userv',['users'=> $user]);
    }

    public function create(){
        return view('user/useri');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'username' => ['required','unique:users,username','min:5','max:10',],
            'password' => ['required','min:8'],
            'email' => ['required','email','unique:users,email','min:5'],
            'nama' => ['required','min:5'],
        ]);
        


        User :: create ([
            'username' => $request -> username,
            'name' => $request -> nama,
            'password' => Hash :: make($request -> password),
            'email' => $request -> email,
            'is_permission' =>  $request->type,
            'image' =>'/storage/image/7.jpg'
            
              
        ]);
        
        session () ->flash('succes','Input user berhasil !!');
        return back ();
       
    }
    public function destroy($id){
        $delete = User::where('id',$id)->first();
        $delete -> delete();
        return back();
    }
    public function edit($id){
        $data = User :: where('id',$id)->first();
        return view ('user.usere',['user' => $data]);
    }
    public function update(Request $request, $id ){
        $request -> validate([
            'nama' => ['required','min:5'],
        ]);
        User :: find ($id) -> update(['name' => $request-> nama,'email' => $request -> email, 'is_permission' => $request ->type, 'updated_at' => date('Y-m-d H:i:s') ]);
        session () ->flash('succes','Data berhasil diupdate !!');
        return back();
        // return redirect('/userv');   
    }
}
