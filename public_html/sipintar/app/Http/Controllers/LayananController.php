<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class LayananController extends Controller
{

    public function info(){
        $title = 'Layanan Informasi';
        return view('layanan.form_layanan',['layanan'=>$title]);
    }
    public function uji(){
        $title = 'Layanan Pengujian';
        return view('layanan.form_layanan',['layanan'=>$title]);
    }
    public function lainnya(){
        $title = 'Layanan Lainnya';
        return view('layanan.form_layanan',['layanan'=>$title]);
    }
    public function laySer(){
        $title = 'Layanan Sertifikasi';
        return view('layanan.form_layanan',['layanan'=>$title]);
    }

    public function store(Request $req){
        $req->validate([
            'nama' => 'required',
            'umur' => 'required',
            'kelamin' => 'required',
            'hp' => 'required',
            'email' => 'required',
            'pekerjaan' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ],
        [
            'nama.required' => 'Kolom Nama harus diisi!',
            'umur.required' => 'Kolom Umur harus dipilih!',
            'kelamin.required' => 'Kolom Kelamin harus dipilih!',
            'hp.required' => 'Kolom Nomor HP harus diisi!',
            'email.required' => 'Kolom Email harus diisi!',
            'pekerjaan.required' => 'Kolom pekerjaan harus dipilih!',
            'g-recaptcha-response.required' => 'Google Captcha harus diisi!'
        ]);
         if(!isset($req->image)){
             return back()->with('unsuccess', 'Anda belum mengambil gambar, Silakan klik tombol Ambil Gambar');
        };
        $dt = Carbon::now();
        // echo  $dt->format('l');
        $folderPath = "public/sipintar/";
        $img = $req->image;    
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        
        $maxLay = Layanan ::whereDate('created_at', '=', date('Y-m-d'))->max('no_antrian');
        $lay                    = new Layanan();
        $lay->no_antrian        = $maxLay + 1;
        $lay->jns_layanan       = $req->layanan;
        $lay->nama              = $req->nama;
        $lay->umur              = $req->umur;
        $lay->kelamin           = $req->kelamin;
        $lay->foto              = $fileName;
        $lay->hp                = $req->hp;
        $lay->email             = $req->email;
        $lay->pekerjaan         = $req->pekerjaan;    
        $lay->jns_sertifikasi   = $req->sertifikasi;     
        $status = $lay->save();   
        if($status){
            $antrian = $maxLay + 1;
            return view('layanan.cetak',['date'=>$dt,'antrian'=>$antrian]);
        }else{
            $message = 'Input Data Unsuccessful !';
            return view('error',['message'=>$message]);
        }
    }
    public function error(){
        $message = 'Input Data Unsuccessful !';
        return view('error',['message'=>$message]);
    }
}
