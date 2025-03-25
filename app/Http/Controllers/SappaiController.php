<?php

namespace App\Http\Controllers;

use App\Models\Kuisioner;
use App\Models\Sappai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class SappaiController extends Controller
{
    public function index(){
        return view('sappai.index');
    }
    public function user(){
        $user = User :: where('isactive','=',0)->get ();
        return view ('sappai/userv',['users'=> $user]);
    }
    public function useri(){
        return view('sappai.useri');
    }
    public function store(Request $request){
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
            'is_permission' =>  13,
            'isactive' => 0,
            'image' =>'/storage/image/7.jpg'
            
              
        ]);
        
        return view ('sappai.user_detail',['email'=> $request -> email, 'password' => $request -> password ]); 

        // $pdf = FacadePdf::loadView('sappai.user_card',['email'=>$request -> username,'password'=>$request -> password]);
        // return $pdf->setPaper('f4', 'portrait')->stream();

        // return view('sappai.user_card',['email'=>$request -> email,'password'=>$request -> password]);
    }
    public function destroy($id){
        $delete = User::where('id',$id)->first();
        $delete -> delete();
        return back();
    }
    public function sample(){
        $sample = Sappai :: get();
        return view ('sappai.samplev',['sample'=> $sample]); 
    }
    public function samplei(){
        $user = User :: where('isactive','=',0)->get ();
        return view ('sappai.samplei',['users'=> $user]);
    }
    public function sample_store(Request $request){
        $request -> validate([
            'kode' => ['required','min:2'],
            'komoditi' => 'required',
            'asal' => 'required',
            'nama' => 'required',
            'billing' => ['required','min:5'],
            'filepdf' => 'mimes:pdf'
        ]);

        $dt = Carbon::now();
        $sappai              = new Sappai ();

        if(date('Y-m-d',strtotime($request->tgl_masuk))!='-0001/11/30'){
        $sappai->tanggal  =  date('Y-m-d',strtotime($request->tgl_masuk));
        }else{
        $sappai->tanggal  = $dt->toDateString();
        }
        $sappai->user_id        = $request->user;
        $sappai->kode           = $request->kode;
        $sappai->nama_sample    = $request->nama;
        $sappai->komoditi       = $request->komoditi;
        $sappai->asal           = $request->asal;
        $sappai->tahap          = $request->tahap;
        $sappai->billing        = $request->billing;
        $sappai->admin          = Auth::user()->username;

       
       
        if($request->filepdf!= ''){        
            $path = public_path().'/storage/sappai/';

             //upload new file
             $file1 = $request->filepdf;
             $filename1 = "/storage/sappai/".time().$file1->getClientOriginalName();
             $file1->move($path, $filename1);
             $sappai->berkas = $filename1;

        }
       
        $sappai->save();
        return back()->with('succes', 'Data berhasil diinput');
    }
    public function sample_edit($id){
        $sample = Sappai :: findOrFail($id);
        return view('sappai.samplee',['sample'=>$sample]);
    }
    public function sample_update(Request $request,$id){
        $request -> validate([
            'kode' => ['required','min:2'],
            'komoditi' => 'required',
            'asal' => 'required',
            'nama' => 'required',
            'billing' => ['required','min:5'],
            'filepdf' => 'mimes:pdf'
        ]);

        $dt = Carbon::now();

        $sappai              = Sappai ::findOrFail($id);

        if(date('Y-m-d',strtotime($request->tgl_masuk))!='-0001/11/30'){
        $sappai->tanggal  =  date('Y-m-d',strtotime($request->tgl_masuk));
        }else{
        $sappai->tanggal  = $dt->toDateString();
        }
        $sappai->kode           = $request->kode;
        $sappai->nama_sample    = $request->nama;
        $sappai->komoditi       = $request->komoditi;
        $sappai->asal           = $request->asal;
        $sappai->tahap          = $request->tahap;
        $sappai->billing        = $request->billing;

        if($request->filepdf!= ''){        
            $path = public_path().'/storage/sappai/';

             //upload new file
             $file1 = $request->filepdf;
             $filename1 = "/storage/sappai/".time().$file1->getClientOriginalName();
             $file1->move($path, $filename1);
             $sappai->berkas = $filename1;

        }
       
        $sappai->save();
        return back()->with('succes', 'Data berhasil diinput');
    }
    public function sample_detail($id){
        $sample = Sappai :: where('user_id', '=', $id)->get();
        return view ('sappai.samplev',['sample'=> $sample]); 
    }
    public function kuisioner(){
        $kuisioner = Kuisioner :: get();
        return view ('sappai/kuisionerv',['kuisioner'=> $kuisioner]);
    }
    public function cetak(){
      
        $pdf = FacadePdf::loadView('sappai.pertanyaan');
        return $pdf->setOptions(['defaultFont' => 'serif'])->setPaper('f4', 'landscape')->stream();

        // return view('adaja.laporan',['adaja'=>$data,'profile'=>$profile]);

    }
    public function cetak_user(Request $request){
         $pdf = FacadePdf::loadView('sappai.user_card',['email'=>$request -> email,'password'=>$request -> password]);
            return $pdf->setPaper('f4', 'portrait')->stream();
        //  return view('sappai.user_card',['email'=>$request -> email,'password'=>$request -> password]);
    }
    public function sample_destroy($id){
    $delete = Sappai::where('id',$id)->first();
    $delete -> delete();
    return back()->with('succes', 'Data berhasil dihapus');
    }
    public function kuisioner_destroy($id){
    $delete = Kuisioner::where('id',$id)->first();
    $delete -> delete();
    return back()->with('succes', 'Data berhasil dihapus');
    }

}
