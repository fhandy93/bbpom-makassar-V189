<?php

namespace App\Http\Controllers;

use App\Models\Seppulorujukan;
use App\Models\Seppulotransrujukan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class SeppuloRujukanController extends Controller
{
    public function rujukan(){
        return view('seppulo-rujukan.index');
    }
    public function formrujuk(){
        return view('seppulo-rujukan.form_rujukan');
    }   
    public function store(Request $request){
        try {
            $request->validate([
                'tgl_terima'    => "required",
                'nama'          => "required",
                'ttl'           => "required", 
                'umur'          => "required", 
                'kelamin'       => "required", 
                'agama'         => "required", 
                'pekerjaan'     => "required", 
                'alamat'        => "required", 
                'hp'            => "required", 
                'fax'           => "required", 
                'kadaluarsa'    => "required",
                'email'         => "required", 
                'pengaduan'     => "required", 
                'produk'        => "required", 
                'regis'         => "required", 
                'batch'         => "required", 
                'pabrik'        => "required", 
                'alm_pab'       => "required", 
                'nama_kor'      => "required", 
                'alm_kor'       => "required", 
                'kelamin_kor'   => "required", 
                'desc'          => "required",
                'hal'           => "required",
                'ket'           => "required",
                'tujuan'        => "required",
                'gambar1'       => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048', // max 2MB                
                'gambar2'       => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048', // max 2MB
                'gambar3'       => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048', // max 2MB
                'gambar4'       => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048', // max 2MB
                'gambar5'       => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048', // max 2MB
                'gambar6'       => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048', // max 2MB
            ]);
            $dt = Carbon::now();
            $max_id = Seppulorujukan :: max('id');
            $rujuk              = new Seppulorujukan ();
            $rujuk->id          = $max_id + 1;
            if($request->tgl_terima!='00/00/0000'){
            $rujuk->tgl_terima  =  $request->tgl_terima;
            }else{
            $rujuk->tgl_terima  = $dt->format('d/m/Y');
            }
            $rujuk->kadaluarsa  = $request->kadaluarsa;
            $rujuk->nama        = $request->nama;
            $rujuk->ttl         = $request->ttl;
            $rujuk->umur        = $request->umur;
            $rujuk->kelamin     = $request->kelamin;
            $rujuk->agama       = $request->agama;
            $rujuk->pekerjaan   = $request->pekerjaan;
            $rujuk->alamat      = $request->alamat;
            $rujuk->hp          = $request->hp;
            $rujuk->fax         = $request->fax;
            $rujuk->email       = $request->email;
            $rujuk->pengaduan   = $request->pengaduan;
            $rujuk->produk      = $request->produk;
            $rujuk->regis       = $request->regis;
            $rujuk->batch       = $request->batch;
            $rujuk->pabrik      = $request->pabrik;
            $rujuk->alm_pab     = $request->alm_pab;
            $rujuk->nama_kor    = $request->nama_kor;
            $rujuk->alm_kor     = $request->alm_kor;
            $rujuk->kelamin_kor = $request->kelamin_kor;
            $rujuk->desc        = $request->desc;
            $rujuk->user_id     = Auth::user()->id;
            $rujuk->tujuan      = $request->tujuan;
            $rujuk->hal         = $request->hal;
            $rujuk->ket         = $request->ket;
        
            foreach (range(1,6) as $i) {
            $field = "gambar{$i}";
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $hashName = md5_file($file->getRealPath()) . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('rujukan', $hashName, 'local');
                    $rujuk->$field = $path;
                }
            }
        
            $sts = $rujuk->save();
            if($sts){
                // pesan untuk Pak lalo
                $pesan = "*Yth. Bapak/Ibu*, Laporan Rujukan baru telah *Sukses* diinput masuk kedalam sistem !";
                $lalo = '6281243782726';
                sendMessage($pesan,$lalo);
            }
            
            return redirect()->route('seppulov3.view')->with('success', 'Data berhasil diinput');
        }catch (\Throwable $e) {
            return redirect()->route('seppulov3')->with('error', $e->getMessage());
        } 
    }

    public function view()
    {
        try {
            $permission = Auth::user()->is_permission;

            $query = Seppulorujukan::query()->orderBy('seppulo_rujukan.id', 'DESC');

            switch ($permission) {
                case 5:
                case 17:
                    $query->whereIn('status', [0,1,2,3,7,8,9]);
                    break;

                case 16:
                    $query->whereIn('status', [1,3,7,8,9]);
                    break;

                case 7:
                case 21:
                    $query->join('trans_seppulo_rujukan','trans_seppulo_rujukan.rujukan_id','=','seppulo_rujukan.id')
                        ->whereIn('seppulo_rujukan.status',[3,7,8,9])
                        ->where('trans_seppulo_rujukan.tindak', 4)
                        ->select('seppulo_rujukan.*');
                    break;

                case 8:
                case 18:
                case 28:
                case 29:
                    $query->join('trans_seppulo_rujukan','trans_seppulo_rujukan.rujukan_id','=','seppulo_rujukan.id')
                        ->whereIn('seppulo_rujukan.status',[3,7,8,9])
                        ->whereIn('trans_seppulo_rujukan.tindak',[5,6,8])
                        ->select('seppulo_rujukan.*')
                        ->distinct();
                    break;

                case 9:
                case 20:
                case 25:
                    $query->join('trans_seppulo_rujukan','trans_seppulo_rujukan.rujukan_id','=','seppulo_rujukan.id')
                        ->whereIn('seppulo_rujukan.status',[3,7,8,9])
                        ->where('trans_seppulo_rujukan.tindak', 7)
                        ->select('seppulo_rujukan.*');
                    break;

                case 1:
                    break;

                default:
                    $query->whereRaw('1=0'); 
                    break;
            }
            $data = $query->get();
            return view('seppulo-rujukan.rujukanv', ['rujuk' => $data]);
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show($id){
        try{
            $data = Seppulorujukan::where('id',$id)->first();
            $hasil = Seppulotransrujukan :: where('rujukan_id',$id)->get();
            return view('seppulo-rujukan.detail',['rujuk'=>$data,'hasil'=>$hasil]);
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function delete($id)
    {
        try{
            $trans = Seppulotransrujukan::where('rujukan_id', $id)->first();
            if ($trans) {
                foreach (range(1, 6) as $i) {
                    $field = "gambar{$i}";
                    if (!empty($trans->$field) && Storage::disk('local')->exists($trans->$field)) {
                        Storage::disk('local')->delete($trans->$field);
                    }
                }
            }

            $rujuk = Seppulorujukan::findOrFail($id);

            foreach (range(1, 6) as $i) {
                $field = "gambar{$i}";
                if (!empty($rujuk->$field) && Storage::disk('local')->exists($rujuk->$field)) {
                    Storage::disk('local')->delete($rujuk->$field);
                }
            }
            $rujuk->delete();

            return redirect()->route('seppulov3.view')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function edit($id){
        try{
            $rujuk = Seppulorujukan::findOrFail($id);
            return view('seppulo-rujukan.edit',['rujuk'=> $rujuk]);
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function update(Request $request,$id){
        try {
            // ✅ Validasi input
            $validated = $request->validate([
                'tgl_terima'   => "required",
                'nama'         => "required|string|max:255",
                'ttl'          => "required|string|max:255", 
                'umur'         => "required", 
                'kelamin'      => "required|string",
                'agama'        => "required|string|max:100",
                'pekerjaan'    => "required|string|max:255",
                'alamat'       => "required|string",
                'hp'           => "required|string|max:20",
                'fax'          => "nullable|string|max:20", 
                'email'        => "required|max:255", 
                'pengaduan'    => "required|string",
                'produk'       => "required|string",
                'regis'        => "required|string",
                'batch'        => "required|string",
                'pabrik'       => "required|string",
                'alm_pab'      => "required|string",
                'nama_kor'     => "required|string",
                'alm_kor'      => "required|string",
                'kelamin_kor'  => "required|string",
                'desc'         => "required|string",
                'hal'          => "required|string",
                'ket'          => "required|string",
                'tujuan'       => "required|string",
                'gambar1'      => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048', 
                'gambar2'      => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048', 
                'gambar3'      => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048',
                'gambar4'      => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048',
                'gambar5'      => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048',
                'gambar6'      => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);

            // ✅ Ambil data lama
            $rujuk = Seppulorujukan::findOrFail($id);

            // ✅ Atur tanggal terima
            if ($request->tgl_terima !== '00/00/0000') {
                $rujuk->tgl_terima = $request->tgl_terima;
            } else {
                $rujuk->tgl_terima = now()->format('Y-m-d'); // simpan dalam format standar DB
            }

            // ✅ Update data selain gambar
            $rujuk->fill($request->except(['gambar1','gambar2','gambar3','gambar4','gambar5','gambar6']));

            // ✅ Handle upload gambar secara dinamis
            foreach (range(1, 6) as $i) {
                $field = "gambar{$i}";
                if ($request->hasFile($field)) {
                    // hapus file lama kalau ada
                    if ($rujuk->$field && Storage::disk('local')->exists($rujuk->$field)) {
                        Storage::disk('local')->delete($rujuk->$field);
                    }

                    $file = $request->file($field);
                    $hashName = md5_file($file->getRealPath()) . '.' . $file->getClientOriginalExtension();

                    if (!Storage::disk('local')->exists("rujukan/{$hashName}")) {
                        $file->storeAs('rujukan', $hashName, 'local');
                    }

                    $rujuk->$field = "rujukan/{$hashName}";
                }
            }

            // ✅ Simpan perubahan
            $rujuk->save();

            return redirect()->route('seppulov3.view')->with('success', 'Data berhasil diupdate');

        } catch (\Throwable $e) {
            return redirect()->route('seppulov3')->with('error', $e->getMessage());
        }
            
    }
    public function kirim(Request $req){     
        try{   
            $update  = Seppulorujukan::findOrFail($req->rujukan_id);
            $update->status      = 1;
            $update->kembali     = null;
            $update->save();

            // Pesan untuk ibu Kabalai
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan dengan No. Form: ".$req->rujukan_id." masuk ke akun anda untuk dikonfirmasi, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
            $kabalai = '6281343000011-';
            sendMessage($pesan,$kabalai);

            return redirect()->route('seppulov3.view')->with('success', 'Data berhasil dikirim');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function tindak(Request $req, $id){
        try{
            foreach($req->tindak as $item){
                $rujuk              = new Seppulotransrujukan ();
                $rujuk->rujukan_id  = $id;
                $rujuk->user_id     = Auth::user()->id;
                $rujuk->desc        = "-";
                $rujuk->tgl_kembali = "1111-11-11";
                $rujuk->tindak      = $item;
                $rujuk->status      = 3;
                $rujuk->save();  

                if($item == 3){
                    // pesan ke Infokom
                    $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Infokom* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                    $lalo = '6281243782726';
                    sendMessage($pesan,$lalo);
                }else if($item == 4){
                    // pesan ke Penindakan
                    $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Substansi Penindakan* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                    $sri = '6281355733866';
                    sendMessage($pesan,$sri);
                }else if($item == 5){
                    // pesan ke Pemeriksaan
                    $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Pemeriksaan* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                    $norma = '6281342720161';
                    sendMessage($pesan,$norma);
                }else if($item == 6){
                    // pesan ke Pemeriksaan
                    $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Pemeriksaan* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                    $ilham = '6285396907906';
                    sendMessage($pesan,$ilham);
                }else if($item == 7){
                    // pesan ke Pengujian
                    $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Substansi Pengujian* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                    $nurhamida = '6285241560800';
                    sendMessage($pesan,$nurhamida);
                }
                else if($item == 8){
                    // pesan ke pemeriksaan
                    $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Pemeriksaan* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                    $rahman = '6281355497097';
                    sendMessage($pesan,$rahman);
                }
            }

            $update  = Seppulorujukan::findOrFail($id);
            $update->status       = 3;
            $update->desc_tl      = $req->desc_tl;
            $update->updated_at   = date('Y-m-d H:i:s');
            $update->save();
            
            return redirect()->route('seppulov3.view')->with('success', 'Data Tindak Lanjut telah dikirim');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function kembali($id){
        return view('seppulo-rujukan.form_kembali',['rujuk'=>$id]);
    }
    public function kembalis(Request $request,$id){
        try{
            $update  = Seppulorujukan::findOrFail($id);
            $update->kembali      = $request->desc;
            $update->status       = 2;
            $update->updated_at   = date('Y-m-d H:i:s');
            $update->save();
            
            // pesan ke infoko,
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
            $lalo = '6281243782726';
            sendMessage($pesan,$lalo);  
            return redirect()->route('seppulov3.view')->with('success', 'Data telah dikembalikan');
        } catch (\Throwable $e) {
            return redirect()->route('seppulov3')->with('error', $e->getMessage());
        }
    }
    public function rujukha($id){
        try{
            $rujuk = Seppulotransrujukan :: where('id',$id)->first();
            return view('seppulo-rujukan.form_hasil',['rujuk'=>$rujuk]);
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function rujukh(Request $request,$id){
        try{
            $validator = Validator::make($request->all(), [
                'gambar1'      => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048', 
                'gambar2'      => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048', 
                'gambar3'      => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048',
                'gambar4'      => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048',
                'gambar5'      => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048',
                'gambar6'      => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);
            
            $rujuk  = Seppulotransrujukan::findOrFail($id);
            $rujuk->desc        = $request->desc;

            // ✅ Handle upload gambar secara dinamis
            foreach (range(1, 6) as $i) {
                $field = "gambar{$i}";
                if ($request->hasFile($field)) {
                    // hapus file lama kalau ada
                    if ($rujuk->$field && Storage::disk('local')->exists($rujuk->$field)) {
                        Storage::disk('local')->delete($rujuk->$field);
                    }

                    $file = $request->file($field);
                    $hashName = md5_file($file->getRealPath()) . '.' . $file->getClientOriginalExtension();

                    if (!Storage::disk('local')->exists("rujukan/{$hashName}")) {
                        $file->storeAs('rujukan', $hashName, 'local');
                    }

                    $rujuk->$field = "rujukan/{$hashName}";
                }
            }
            $rujuk->save();
            return redirect()->route('seppulov3.view')->with('success', 'Data hasil telah disimpan kedalam Database');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function kirimhasil(Request $req){
        // echo $req->rujukan_id;
        try{
            $dt = Carbon::now();
            $sts1 = Seppulotransrujukan :: where('id',$req->id)-> update(['user_id' => Auth::user()->id,'status' => 7,'tgl_kembali' => $dt->toDateString() ]);
            if($sts1){
                $cekData = Seppulotransrujukan::where('rujukan_id', $req->rujukan_id)
                            ->whereIn('status', [8, 3])
                            ->exists();

                if ($cekData) {
                    return redirect()->route('seppulov3.view')->with('success', 'Data akan segera diproses ke KABALAI');
                }else{
                    Seppulorujukan :: where('id',$req->rujukan_id)-> update(['status' => 7]);
                    
                    // pesan untuk ibu kabalai
                    $pesan = "*Yth. Bapak/Ibu*, Hasil Rujukan dengan No. Form: ".$req->rujukan_id." Telah *Selesai diolah* dan telah dikirim kembali ke akun anda untuk dikonfirmasi, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                    $kabalai = '6281343000011';
                    sendMessage($pesan,$kabalai);
                    
                    return redirect()->route('seppulov3.view')->with('success', 'Data akan segera diproses ke KABALAI');
                }
            }
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function kembalihasil($id){
        return view('seppulo-rujukan.form_kembali_hasil',['rujuk'=>$id]);
    }
    public function kembalihasils(Request $request, $id)
    {
        $request->validate([
            'desc' => 'required|string',
        ]);

        try {
            // Update data transaksi
            $trans = Seppulotransrujukan::findOrFail($id);
            $trans->kembali    = $request->desc;
            $trans->status     = 8;
            $trans->updated_at = now();
            $trans->save();

            // Update status di tabel rujukan
            $rujukan = Seppulorujukan::findOrFail($trans->rujukan_id);
            $rujukan->status = 8;
            $rujukan->save();

            // Mapping tindak ke nomor WA
            $nomorTujuan = [
                3 => '6281243782726', // Infokom
                4 => '6281355733866', // Penindakan
                5 => '6281342720161', // Norma
                6 => '6281363177720', // Ilham
                7 => '6285241560800', // Pengujian
                8 => '6281355497097', // Rahman
            ];

            // Jika ada nomor tujuan sesuai tindak, kirim pesan
            if (isset($nomorTujuan[$trans->tindak])) {
                $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan *Hasil Rujukan* telah *Dikembalikan oleh KABALAI* untuk ditinjau kembali. Silakan masuk ke aplikasi Balla Pokja atau klik link berikut: https://bbpom-makassar.com/v3-rujukan-view";

                try {
                    sendMessage($pesan, $nomorTujuan[$trans->tindak]);
                } catch (\Exception $e) {
                    \Log::error("Gagal kirim pesan WA: " . $e->getMessage());
                }
            }

            return redirect()->route('seppulov3.view')->with('success', 'Data telah dikembalikan');
         } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function selesai(Request $req){
        try{
            $update  = Seppulorujukan::findOrFail($req->id);
            $update->status      = 9;
            $update->save();

            $updttrans  = Seppulotransrujukan::where('rujukan_id','=', $req->id)->get();
            foreach($updttrans as $item){
                $item->status = 9;
                $item->save();
            }

            // pesan untuk pak lalo
            $pesan = "*Yth. Bapak/Ibu*, Laporan Rujukan dengan No. Form: ".$req->id." Telah *Selesai dan dikonfirmasi oleh KABALAI*";
            $lalo = '6281243782726';
            sendMessage($pesan,$lalo);

            return redirect()->route('seppulov3.view')->with('success', 'Data Selesai Diolah !');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function cetak($id,$idhasil){
        try{
            $data = Seppulorujukan::where('id',$id)->first();
            $rujuk = Seppulotransrujukan ::where('id',$idhasil)->first();
            $pdf = FacadePdf::loadView('seppulo-rujukan.cetak',['rujuk'=>$data,'trans'=>$rujuk]) ->setOptions([
                'enable_remote' => true,
                'chroot'  => public_path('storage/post-image'),
                'defaultFont' => 'serif',
            ]);;
            return $pdf->setPaper('f4', 'portrait')->stream();
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function info(){
        return view('seppulo-rujukan.info');
    }
    public function download($id){
        try{
            if (!Storage::disk('local')->exists('rujukan/'.$id)) {
                return back()->with('error', 'File tidak ditemukan: '.$id);
            }
        return Storage::disk('local')->download('rujukan/'.$id);
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
