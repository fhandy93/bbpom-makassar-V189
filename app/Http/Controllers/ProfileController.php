<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $user = User :: where('isactive','=',1)->get(['name','username','email']);
        return view ('user/userl',['users'=> $user]);
    }
    public function show($id){
        $data ['user'] = User :: where('username',$id)->first();
        $data ['profile'] = Profile :: where('username',$id)->first();
        return view ('user/userprof',['data'=> $data]);
    }
    public function showim($id){
        
        $profile = Profile :: where('username',$id)->first();
        if (!$profile){
            $prof = new Profile;
            $prof->username         = $id;
            $prof->facebook         = 'https://facebook.com';
            $prof->twitter          = 'https://twitter.com';
            $prof->youtube          = 'https://youtube.com';
            $prof->instagram        = 'https://instagram.com';
            $prof->alamat           = 'Belum ada data alamat';
            $prof->domisili         = 'Belum ada data domisili';
            $prof->telpon           = '-';
            $prof->nip              = '-';
            $prof->jabatan          = '-';
            $prof->type             = '-';
            $prof->pangkat          = '-';
            $prof->unit             = '-';

            $prof->save();
            
        }
        $data ['user'] = User :: where('username',$id)->first();
        $data ['profile'] = Profile :: where('username',$id)->first();
        return view ('user/userprof',['data'=> $data]);
    }
    public function edit($id){
        $profile = Profile :: where('username',$id)->first();
        if (!$profile){
            Profile :: create ([
                'username' => $id
            ]);
        }
        $data ['user'] = User :: where('username',$id)->first();
        $data ['profile'] = Profile :: where('username',$id)->first();
        return view('user/userprofedit',['data'=> $data]);
    }
    public function updatepass(Request $request, $id){
        $request -> validate([
            'currentpass' => ['required','min:8'],
            'newpass' => ['required','min:8'],
            'confirmpass' => ['required','min:8'],
        ]);
        $user = User :: where('id',$id) -> first();
        if ($user){
        if ( Hash :: check($request-> currentpass, $user -> password)){ 
            User :: find ($id) -> update([
                                            'password'  => Hash :: make($request -> newpass)
                                        ]);
            session () ->flash('succes','Update Password berhasil !!');
        }else{
            session () ->flash('unsucces','Password lama anda berbeda !!');
        }
        }else{
            session () ->flash('unsucces','Anda belum terdaftar !!');
        }
        return back();
    }
    public function updateprof(Request $request, $id){
        $request -> validate([
                                    'nama' => ['required','min:3'],
                                    'foto' => ['mimes:jpeg,jpg,png,gif,max:500']
                                    ]);  
        $data = User::where('id',$id)->first();
                                    
        if($request->foto != ''){        
            $path = 'storage/image/';
   
             //code for remove old file
             if($data->image != ''  && $data->image != null && $data->image != '/storage/image/7.jpg' ){
                $file_old = $data->image;
                  unlink(public_path().$file_old);
             }
   
             //upload new file
             $file = $request->foto;
             $filename = "/storage/image/".time().$file->getClientOriginalName();
             $file->move($path, $filename);
   
            //  //for update in table

            User::find($id)->update(['image' => $filename]);
        }
        User::find($id)->update(['name'=>$request->nama]);
        session () ->flash('succes','Update Profile berhasil !!');
        return back(); 
    }
    public function updatesosmed(Request $request, $id){
        $request -> validate([
                            'facebook' => ['required'],
                            'twitter' => ['required'],
                            'youtube' => ['required'],
                            'instagram' => ['required']
                            ]);
        Profile :: find($id)->update([
                                        'facebook'=>$request->facebook,
                                        'twitter'=>$request->twitter,
                                        'youtube'=>$request->youtube,
                                        'instagram'=>$request->instagram
                                    ]);
        session () ->flash('succes','Update Sosial Media berhasil !!');
        return back(); 
    }
    public function updateaddr(Request $request, $id){
        $request -> validate([
            'alamat' => ['required'],
            'domisili' => ['required'],
            'telpon' => ['required']
            ]);
        Profile :: find($id)->update([
            'alamat'=>$request->alamat,
            'domisili'=>$request->domisili,
            'telpon'=>$request->telpon
        ]);
        session () ->flash('succes','Update Alamat berhasil !!');
        return back(); 
    }
    public function updatepeg(Request $request, $id){
        
         try{
            $prof = Profile::findOrFail($id);
            $prof->nip        = $request->nip;
            $prof->jabatan    = $request->jabatan;
            $prof->type       = $request->type;
            $prof->pangkat    = $request->pangkat;
            $prof->unit       = $request->unit;
            $prof->updated_at   = date('Y-m-d H:i:s');
            $prof->save();

            $prof = Profile:: where('id', '=', $id)->first();
            $user = User :: where('username', '=', $prof->username)->first();        
            $user->type = $request->type_asn;
            $user->save();
    
            session () ->flash('succes','Update Data Pegawai berhasil !!');
            return back(); 
        }catch(\Exception $e){
            session () ->flash('unsucces','Update Data Pegawai gagal !!');
            return back();
        }
    }
}
