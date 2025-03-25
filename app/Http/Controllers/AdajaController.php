<?php

namespace App\Http\Controllers;

use App\Models\Adaja;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class AdajaController extends Controller
{
    public function index(){
        return view('adaja.index');
        // $phone = "081363177720";
        // $image = "https://bbpom-makassar.com/storage/serambi/173578369319%20(1).png";
        // $capt = "test";
        // sendImage($phone,$image,$capt);
        // sendMessage($capt,$phone);
    }
    public function store(Request $request){
        if(!isset($request->lat)){
             return back()->with('unsuccess', 'Anda belum memilih lokasi, Silakan klik menu Cek Lokasi');
        };
        if(!isset($request->image)){
             return back()->with('unsuccess', 'Anda belum mengambil gambar, Silakan klik menu Ambil Gambar');
        };

        $lat          = $request->lat;
        $lon          = $request->lan;
        $img = $request->image;
        $folderPath = "adaja/";
        $lat1  = substr($lat, 1, 4);
        $lon1  = substr($lon, 0, 7);
        $lat2  = (float)$lat1;
        $lon2  = (float)$lon1;
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        $waktuSekarang = date("H:i");
        
        if($request->jenis==1){
            $awal = "10:30";
            $akhir = "11:30";
            // if ($waktuSekarang >= $awal && $waktuSekarang <= $akhir) {
                if(( $lat2 > 5.34 ) || ( $lat2 < 4.88 ) || ( $lon2 < 119.37 ) || ( $lon2 > 119.72 )){
                    return back()->with('unsuccess', 'Lokasi absen berangkat harus berada di radius Makassar, Gowa dan Maros');
                }else{
                   
                    $ada               = new Adaja();
                    $ada->user_id      = Auth::user()-> id;
                    $ada->lat          = $request->lat;
                    $ada->lon          = $request->lan;
                    $ada->foto         = $fileName;
                    $ada->jenis        = $request->jenis;
                    $ada->save();
                    return back()->with('success', 'Absensi berhasil');
                 
                }
            // }else{
            //     return back()->with('unsuccess', 'check In hanya dapat dilakukan pada pukul 10.30 - 11.30 !');
            // }
        }

        if($request->jenis==2){
            $awal = "13:30";
            $akhir = "14:30";
            if ($waktuSekarang >= $awal && $waktuSekarang <= $akhir) {
                if(( $lat2 > 5.34 ) || ( $lat2 < 4.88 ) || ( $lon2 < 119.37 ) || ( $lon2 > 119.72 )){
                    return back()->with('unsuccess', 'Lokasi absen berangkat harus berada di radius Makassar, Gowa dan Maros');
                }else{
                    $berangkat = Adaja::where([['user_id','=',Auth::user()-> id],['jenis','=',1],['status','=',0]])->first();
                    if(isset($berangkat)){
                    $ada               = new Adaja();
                    $ada->user_id      = Auth::user()-> id;
                    $ada->lat          = $request->lat;
                    $ada->lon          = $request->lan;
                    $ada->foto         = $fileName;
                    $ada->jenis        = $request->jenis;
                    $ada->status       = 1;
                    $ada->save();
                    
                    Adaja::where([['user_id','=',Auth::user()-> id],['jenis','=',1],['status','=',0]])->update(['status'=>1]);
                    return back()->with('success', 'Absensi berhasil');
                    }else{
                        return back()->with('unsuccess', 'Anda belum perna melakukan absen Check In');
                    }
                }
            }else{
                 return back()->with('unsuccess', 'check Out hanya dapat dilakukan pada pukul 13.30 - 14.30 !');
            }
        }
        

    }
    public function adajav(){
        $adaja = Adaja::whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->orderBy('id', 'DESC')->take(500)->orderBy('id', 'DESC')->get();
        return view('adaja.adajav',['adaja'=> $adaja]);
    }
    public function show($id){
        $adaja = Adaja :: where('id',$id)->first();
        return view('adaja.adajadet',['adaja'=> $adaja]);
    }
    public function cetak(){
        return view('adaja.formcetak');
    }
    public function download(Request $request){
         $select = $request -> tahun.'-'.$request -> bulan;

        $data = Adaja::where('created_at', 'like', '%' . $select . '%')->get();
        $profile = Profile :: get();
        $pdf = FacadePdf::loadView('adaja.laporan',['adaja'=>$data,'profile'=>$profile, 'bulan'=>$select]);
        return $pdf->setOptions(['defaultFont' => 'serif'])->setPaper('f4', 'landscape')->stream();

        // return view('adaja.laporan',['adaja'=>$data,'profile'=>$profile]);

    }
    public function log(){
        $id = Auth::user()-> id;
        $adaja = Adaja::where('user_id',$id)->whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->orderBy('id', 'DESC')->get();
        return view('adaja.log',['adaja'=> $adaja]);
    }

}
