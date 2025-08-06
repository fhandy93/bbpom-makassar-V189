<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\Siikmabid;
use App\Models\Siikmaizin;
use Carbon\CarbonInterval;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SiikmaController extends Controller
{
    public function index(){
          $id = Auth::user()->id;
        for($i=1;$i<=12;$i++){
            ${"data$i"} = Siikmaizin :: where('user_id','=',$id)->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->get('id');
            ${"count$i"} = ${"data$i"}->count();
        }
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;

        $totalByMont = DB::table('siikma_izin')
            ->select(DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(jumlah))) as total_izin"))
            ->where('status', 2)
            ->where('user_id','=',$id)
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->first();

        $byMonth = Siikmaizin :: where('user_id','=',$id)->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get()->count();
        $byYear = Siikmaizin :: where('user_id','=',$id)->whereYear('created_at', $tahun)->get()->count();
        return view('siikma.index',compact('count1',
                                             'count2',
                                             'count3',
                                             'count4',
                                             'count5',
                                             'count6',
                                             'count7',
                                             'count8',
                                             'count9',
                                             'count10',
                                             'count11',
                                             'count12',
                                             'totalByMont',
                                             'byMonth',
                                             'byYear'
                                            ));
    }
    public function siikFom(){
        $user =  Auth::user()->username; 
        $data = Profile :: where('username',$user)->first();
        return view('siikma.formizin',['data'=>$data]);
    }
    public function siiStore(Request $req){
         $req->validate([
            "bidang"        => "required",
            "tgl_terima"    => "required",
            "jam1"          => "required",
            "jam2"          => "required",
            "perlu"          => "required",
            "bidang"          => "required"

          ],[
            "bidang"      => "Harap memilih bidang terlebih dahulu",
            "tgl_terima"    => "Harap mengisi tanggal izin",
            "jam1"          => "Harap mengisi jam mulai izin",
            "jam2"          => "Harap mengisi jam berakhir izin",
            "perlu"          => "Harap mengisi kolom keperluan",
            "bidang"          => "harap memilih bidang terlebih dahulu",
          ]);
        
        $user = Auth::user();
        $userId = $user->id;

        // Format tanggal
        $tglIzin = Carbon::createFromFormat('d/m/Y', $req->tgl_terima)->format('Y-m-d');
        $jam1 = $req->jam1;
        $jam2 = $req->jam2;
        $perlu = $req->perlu;
        $bid = $req->bidang;

        // Cek duplikat izin dengan waktu yang sama persis
        $cekPersis = Siikmaizin::where('user_id', $userId)
            ->where('tgl_izin', $tglIzin)
            ->where('jam1', $jam1)
            ->where('jam2', $jam2)
            ->where('keperluan',$perlu)
            ->where('bidang',$bid)
            ->exists();

        if ($cekPersis) {
            return redirect()->route('siikma.status',['status'=>'success','jam1'=>$req->jam1,'jam2'=>$req->jam2]);
        }
        
        $sikama              = new Siikmaizin ();
        $sikama->user_id     = Auth::user()->id;
        $sikama->bidang      = $req->bidang;
        $sikama->tgl_izin    = $tglIzin; // sudah dalam format 'Y-m-d'
        $sikama->jam1        = $req->jam1;
        $sikama->jam2        = $req->jam2;
        $sikama->keperluan   = $req->perlu;
        $sikama->status      = "1"; 
        $sikama->ket         = "-"; 
        $sts = $sikama->save();

        $pesan = "*Yth. Bapak/Ibu* 🙏, Pegawai BBPOM Makassar atas nama *".$req->nama.
        "* Mengajukan Izin untuk keluar dari kantor BBPOM Makassar pada 📆 tanggal *". $req->tgl_terima.
        "* 🕐 Jam *".$req->jam1."-".$req->jam2."* Dengan Keperluan *".$req->perlu."*";
        
        $data = Siikmabid :: findOrFail($req->bidang);
        sendMessage($pesan,$data->wa);
         
        $user_id     = Auth::user()->id;
        $user  = User::where('id',$user_id)->first();
        $pesansat = "*Yth. Bapak/Ibu*🙏 Izin telah diberikan oleh atasan kepada *".$user->name."* untuk keluar dari Wilayah kantor BBPOM Makassar pada jam *".$req->jam1."-".$req->jam2."*";


        // Satpam Aris
        $aris = '085146111986';
        sendMessage($pesansat,$aris);

       // Satpam Massere
       $massere = '08875626716';
       sendMessage($pesansat,$massere);

        // Satpam Ali
        $ali = '085341782918';
        sendMessage($pesansat,$ali);


        // Satpam Taufiq
        $taufiq = '085242021996';
        sendMessage($pesansat,$taufiq);
        
         // Satpam Syamsul
        $syamsul = '085398358668';
        sendMessage($pesansat,$syamsul);
        
         // Satpam muthalib
        $muthalib = '085696422963';
        sendMessage($pesansat,$muthalib);
        
        if($sts){
            return redirect()->route('siikma.status',['status'=>'success','jam1'=>$req->jam1,'jam2'=>$req->jam2]);
        }else{
            return redirect()->route('siikma.status',['status'=>'erorr']);
        }
         
    }
    public function daftar(){
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;
        $id = Auth::user()->id;
        $data = Siikmaizin :: where('user_id',$id)->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->orderBy('id', 'DESC')->get();
        return view ('siikma.daftar',['izin'=> $data]); 
        
    }
     public function detail($id){
      $data  = Siikmaizin :: findOrFail($id);
      return view ('siikma.detail',['data'=> $data]);
    }
    
    public function akhir(Request $req, $id)
    {
        // Ambil lat/lon dari request atau default dummy jika tidak tersedia
        $lat = floatval($req->lat ?? '-5.1660');
        $lon = floatval($req->lon ?? '119.4110');

        // Validasi apakah di dalam area kantor
        $isInsideArea = (
            $lat >= -5.1666802 && $lat <= -5.1656497 &&
            $lon >= 119.4105676 && $lon <= 119.4119490
        );

        if (!$isInsideArea) {
            return redirect()->route('siikma.dafIzin')
                ->with('unsuccess', 'Izin gagal diakhiri, Anda terdeteksi masih berada di luar wilayah kantor');
        }

        // Ambil data izin dan waktu saat ini
        $dt = Carbon::now();
        $izin = Siikmaizin::findOrFail($id);

        $jamAwal  = Carbon::parse($izin->jam1);
        $jamAkhir = $dt;

        $totalMinutes = 0;

        if ($jamAkhir->gte($jamAwal)) {
            // Jika jam akhir lebih besar atau sama dengan jam awal, hitung selisih waktu
            $totalMinutes = $jamAwal->diffInMinutes($jamAkhir);

            // Koreksi waktu istirahat (12:00 - 13:00)
            $startBreak = $jamAwal->copy()->setTime(12, 0);
            $endBreak   = $jamAwal->copy()->setTime(13, 0);

            if ($jamAkhir->gt($endBreak) && $jamAwal->lt($startBreak)) {
                $totalMinutes -= 60;
            } elseif ($jamAwal->between($startBreak, $endBreak) && $jamAkhir->gt($endBreak)) {
                $totalMinutes -= $jamAwal->diffInMinutes($endBreak);
            } elseif ($jamAkhir->between($startBreak, $endBreak) && $jamAwal->lt($startBreak)) {
                $totalMinutes -= $startBreak->diffInMinutes($jamAkhir);
            } elseif ($jamAwal->between($startBreak, $endBreak) && $jamAkhir->between($startBreak, $endBreak)) {
                $totalMinutes = 0;
            }

            // Pastikan tidak negatif
            $totalMinutes = max($totalMinutes, 0);
        }

        // Konversi menit ke format HH:MM:SS
        $jumlahTime = CarbonInterval::minutes($totalMinutes)->cascade()->format('%H:%I:%S');

        // Update data izin
        $izin->update([
            'status'         => 2,
            'wktu_kembali'   => $jamAkhir,
            'lat'            => $lat,
            'lon'            => $lon,
            'jumlah'         => $jumlahTime,
        ]);

        return redirect()->route('siikma.dafIzin')
        ->with('success', 'Izin berhasil diakhiri');
    }

    public function done(){
        return view('siikma.status');
    }
    public function rekap(){
        $id = Auth::user()->is_permission;
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;
        if($id==1){
            $data = Siikmaizin :: whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->orderBy('id', 'DESC')->get();
        }elseif($id==12){
            $data = Siikmaizin::whereIn('bidang', [12, 30])->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->orderBy('id', 'desc')->get();      
        }else{
            $data = Siikmaizin :: where('bidang','=',$id)->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->orderBy('id', 'desc')->get(); 
        }
        return view ('siikma.rekap',['izin'=> $data]);
    }
    public function daftarFil(Request $req){
        $id = Auth::user()->id;

        $query = Siikmaizin::where('user_id', $id);

        // Apply year filter if it's not the default
        if ($req->tahun !== 'Pilih Tahun') {
            $query->whereYear('created_at', $req->tahun);
        } else {
            $query->whereYear('created_at', date('Y')); // Default to current year
        }

        // Apply month filter if it's not the default
        if ($req->bulan !== 'Pilih Bulan') {
            $query->whereMonth('created_at', $req->bulan);
        }

        $data = $query->orderBy('created_at', 'DESC')->get();

        return view('siikma.daftar', ['izin' => $data]);

    }
    public function rekapFil(Request $req){

        $id = Auth::user()->is_permission;
        $tahun = $req->tahun;
        $bulan = $req->bulan;

        $query = Siikmaizin::query();

        // Filter bidang berdasarkan permission
        if ($id == 1) {
        } elseif ($id == 12) {
            $query->whereIn('bidang', [12, 30]);
        } else {
            $query->where('bidang', $id);
        }

        // Filter tahun
        if ($tahun !== 'Pilih Tahun') {
            $query->whereYear('created_at', $tahun);
        } else {
            $query->whereYear('created_at', date('Y'));
        }

        // Filter bulan
        if ($bulan !== 'Pilih Bulan') {
            $query->whereMonth('created_at', $bulan);
        }

        // Ambil data
        $data = $query->orderBy('created_at', 'DESC')->get();

        return view('siikma.rekap', ['izin' => $data]);
    }
    public function rekapJam(){
         $id = Auth::user()->is_permission;
        $query = Siikmaizin::select('user_id', DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(jumlah))) as total_jam'));

         if ($id == 1) {
        } elseif ($id == 12) {
            $query->whereIn('bidang', [12, 30]);
        } else {
            $query->where('bidang', $id);
        }
         $data = $query
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->groupBy('user_id')
                ->get();
                
        return view ('siikma.rekap-jam',['izin'=> $data]); 
    }
    public function rekapJamFil(Request $req){
        $id = Auth::user()->is_permission;
        $query = Siikmaizin::select('user_id', DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(jumlah))) as total_jam'));

        // Filter bidang
        if ($id == 1) {

        } elseif ($id == 12) {
            $query->whereIn('bidang', [12, 30]);
        } else {
            $query->where('bidang', $id);
        }

        // Filter tahun
        if ($req->tahun !== 'Pilih Tahun') {
            $query->whereYear('created_at', $req->tahun);
        } else {
            $query->whereYear('created_at', date('Y'));
        }

        // Filter bulan
        if ($req->bulan !== 'Pilih Bulan') {
            $query->whereMonth('created_at', $req->bulan);
        }

        $data = $query->orderBy('created_at', 'DESC')
                    ->groupBy('user_id')
                    ->get();

        return view('siikma.rekap-jam', ['izin' => $data]);
    }
    public function qrDownload() {
    // $data = 'https://bbpom-makassar.com/siikma/formulir';

    // // 1. Generate QR PNG dan simpan sementara
    // $qrContent = QrCode::format('png')->size(500)->errorCorrection('H')->generate($data);
    // $tempQRPath = tempnam(sys_get_temp_dir(), 'qr_') . '.png';
    // file_put_contents($tempQRPath, $qrContent);

    // // 2. Buka file logo
    // $logoPath = public_path('logo.png');
    // if (!file_exists($logoPath)) {
    //     unlink($tempQRPath);
    //     abort(404, 'Logo file not found');
    // }

    // $qrImage = imagecreatefrompng($tempQRPath);
    // $logoImage = imagecreatefrompng($logoPath);

    // $qrWidth = imagesx($qrImage);
    // $qrHeight = imagesy($qrImage);
    // $logoWidth = imagesx($logoImage);
    // $logoHeight = imagesy($logoImage);

    // // 3. Resize logo
    // $newLogoWidth = $qrWidth / 7;
    // $newLogoHeight = ($logoHeight / $logoWidth) * $newLogoWidth;

    // $logoResized = imagecreatetruecolor($newLogoWidth, $newLogoHeight);
    // imagealphablending($logoResized, false);
    // imagesavealpha($logoResized, true);
    // imagecopyresampled(
    //     $logoResized,
    //     $logoImage,
    //     0, 0, 0, 0,
    //     $newLogoWidth, $newLogoHeight,
    //     $logoWidth, $logoHeight
    // );

    // // 4. Tempel logo ke tengah QR
    // $x = ($qrWidth - $newLogoWidth) / 2;
    // $y = ($qrHeight - $newLogoHeight) / 2;
    // imagecopy($qrImage, $logoResized, $x, $y, 0, 0, $newLogoWidth, $newLogoHeight);

    // // 5. Simpan ke buffer
    // ob_start();
    // imagepng($qrImage);
    // $finalImage = ob_get_clean();

    // // 6. Bersihkan memory
    // imagedestroy($qrImage);
    // imagedestroy($logoImage);
    // imagedestroy($logoResized);
    // unlink($tempQRPath);

    // // 7. Download response
    // return response($finalImage)
    //     ->header('Content-Type', 'image/png')
    //     ->header('Content-Disposition', 'attachment; filename="qr-with-logo.png"');
     // Ambil nilai jam2 (misalnya formatnya '13:30')
             
    }
     public function cetak($id){
        $data = Siikmaizin::where('id',$id)->first();
        
        $bid = Siikmabid :: where('id',$data->bidang)->first();
        $ata = User::where('id',$bid->user_id)->first();
        $ataprof = Profile::where('username',$ata->username)->first(); 

        $user  = User::where('id',$data->user_id)->first();
        $izin = Profile::where('username',$user->username)->first();
        $pdf = FacadePdf::loadView('siikma.cetak',['data'=>$data,'izin'=>$izin,'atasan'=>$ataprof,'namaatasan' => $ata->name]) ->setOptions([
            'enable_remote' => true,
            'chroot'  => public_path('storage/post-image'),
            'defaultFont' => 'serif',
        ]);;

        return $pdf->setPaper('A4', 'portrait')->stream();
        
        // return view('siikma.cetak',['data'=>$data,'izin'=>$izin,'atasan'=>$ataprof,'namaatasan' => $ata->name]);
    }

}
