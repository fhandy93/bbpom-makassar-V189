<?php

namespace App\Http\Controllers;

use App\Models\BMN;
use App\Models\Bmnaula;
use App\Models\Bmnbarang;
use App\Models\Bmncar;
use App\Models\Bmndriver;
use App\Models\Bmnnonbast;
use App\Models\Bmnruangan;
use App\Models\Bmntracking;
use App\Models\Profile;
use App\Models\TransBMN;
use App\Models\TransBMNaula;
use App\Models\TransBMNcar;
use App\Models\TransBMNnonbast;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BMNController extends Controller
{
    public function index(){
        for($i=1;$i<=12;$i++){
            ${"kembali$i"} = BMN :: where('jns_bst',1)->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->get('id');
            ${"count$i"} = ${"kembali$i"}->count();
            ${"pinjam$i"} = BMN :: where('jns_bst',2)->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->get('id');
            ${"countpinjam$i"} = ${"pinjam$i"}->count();
            ${"pinjamkendaraan$i"} = TransBMNcar :: whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->get('id');
            ${"countkend$i"} = ${"pinjamkendaraan$i"}->count();
            ${"pinjamaula$i"} = TransBMNaula :: whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->get('id');
            ${"countaul$i"} = ${"pinjamaula$i"}->count();
        }
        $bastkembali = BMN :: where('jns_bst',1)->whereYear('created_at', '=', date('Y'))->get('id')->count();
        $bastpinjam = BMN :: where('jns_bst',2)->whereYear('created_at', '=', date('Y'))->get('id')->count();
        $kendaraan = TransBMNcar :: whereYear('created_at', '=', date('Y'))->get('id')->count();
        $aula = TransBMNaula :: whereYear('created_at', '=', date('Y'))->get('id')->count();

      
        return view('bmn.index',compact('count1',
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
                                            'countpinjam1',
                                            'countpinjam2',
                                            'countpinjam3',
                                            'countpinjam4',
                                            'countpinjam5',
                                            'countpinjam6',
                                            'countpinjam7',
                                            'countpinjam8',
                                            'countpinjam9',
                                            'countpinjam10',
                                            'countpinjam11',
                                            'countpinjam12',
                                            'countkend1',
                                            'countkend2',
                                            'countkend3',
                                            'countkend4',
                                            'countkend5',
                                            'countkend6',
                                            'countkend7',
                                            'countkend8',
                                            'countkend9',
                                            'countkend10',
                                            'countkend11',
                                            'countkend12',
                                            'countaul1',
                                            'countaul2',
                                            'countaul3',
                                            'countaul4',
                                            'countaul5',
                                            'countaul6',
                                            'countaul7',
                                            'countaul8',
                                            'countaul9',
                                            'countaul10',
                                            'countaul11',
                                            'countaul12',
                                            
                                            'bastkembali',
                                            'bastpinjam',
                                            'kendaraan',
                                            'aula'
                                            ));
    }
    public function bstkembali(){
        $data = BMN :: where('jns_bst',1)->orderBy('id', 'DESC')->get(); 
        return view('bmn.daftar',['data'=>$data,'jns'=>1]);
    }
    public function bstkembaliinput(){
        $data = User :: where('isactive',1)->get(['id','name']); 
        $bmn = User :: where('is_permission',2)->where('isactive',1)->get(['id','name']); 
        $barang = Bmnbarang :: get(['id','kode','nup','nm_barang','merek']);
        return view('bmn.bst_form',['data'=>$data,'bmn'=>$bmn,'jns'=>1,'barang'=>$barang]);
    }
    public function bstkembalistore(Request $req){
        $req->validate([
            "user_id" => "required",
            "nup.*" => "required",
            "nup" => "required",
            "no_surat" => "required",
            "petugas" => "required"
        ],[
            "user_id" => "Nama Pegawai harap dipilih",
            "nup.*" => "Harus berisi minimal 1 barang",
            "nup" => "Harus berisi minimal 1 barang",
            "no_surat" => "Nomor Surat harus diisi",
            "petugas" => "Pilih petugas BMN"
        ]);

        $data = new BMN();
        $data->jns_bst      = 1; 
        $data->user_id      = $req->user_id;
        $data->user_bmn     = $req->petugas;
        $data->no_surat     = $req->no_surat;
        $data->user_input   = Auth::user()->id;
        $sts = $data->save();
        $new_id = $data->id;
        if($sts){
           $jml = count($req->nup);
            for($a=0;$a<$jml;$a++){
                $trns = new TransBMN();
                $trns->bst_id       = $new_id;         
                $trns->barang_id    = $req->nup[$a];
                if(isset($req->kondisi[$a])){
                    $trns->kondisi       = $req->kondisi[$a];
                }
                $trns->save();
            }
            
        $user = user :: where('id',$data->user_id)->first(['name']);
        
        $pesan = "*Yth. Bapak/Ibu,* Sebuah laporan BAST Pengembalian dari *".$user->name."* Masuk ke akun BALLA POKJA anda untuk dikonfirmasi atau melalui link https://bbpom-makassar.com/bmn/bast-pengembalian  ";
       
        // pesan untuk pak Agus
        $agus = '6285299665356';
        sendMessage($pesan,$agus);
        
        // pesan untuk Ibu Arsy
        $arsy = '6285255955734';
        sendMessage($pesan,$arsy);
        
         // Pesan Untuk Nenenk
        // $nenenk = '6281234675172';
        // sendMessage($pesan,$nenenk);
        
        // pesan untuk Miska
        $miska = '6285333314410';
        sendMessage($pesan,$miska);
        
        // Pesan Untuk Ruslan
        $ruslan = '6285299890021';
        sendMessage($pesan,$ruslan);
        
        // pesan untuk Onde
        $onde = '6281952899549';
        sendMessage($pesan,$onde);
        
        
        }
        // session () ->flash('success','Data berhasil diinput');
        // return $this->bstkembali();
         return redirect()->route('bmn.view-kembali')->with('success', 'Data berhasil diinput'); 
    }
    public function bstkembalidetail($id){
        $bmn = BMN :: where('id',$id)->first();
        $user = User :: where('id','=',$bmn->user_id)->first('username');
        $user_bmn = User :: where('id','=',$bmn->user_bmn)->first('name');
        $prof = Profile :: where('username','=',$user->username)->first(['nip','pangkat','jabatan']);
        $data = TransBMN :: where('bst_id',$id)->get();
        return view('bmn.detail',['bmn'=>$bmn,'prof'=>$prof,'data'=>$data,'user_bmn'=>$user_bmn]);
    }
    public function bstkembaliedit($id){
        $bmn = BMN :: where('id',$id)->first();
        $data = TransBMN :: where('bst_id',$id)->get();
        $pet = User :: where('is_permission',2)->where('isactive',1)->get(['id','name']); 
        $barang = Bmnbarang :: get(['id','kode','nup','nm_barang']);
        return view('bmn.bst_form_edit',['bmn'=>$bmn,'data'=>$data,'jns'=>1,'pet'=>$pet,'barang'=>$barang]);
    }
    public function bstkembaliupdate(Request $req, $id){
        $req->validate([
            "nup.*" => "required",
            "nup" => "required",
            "no_surat" => "required",
        ],[
            "nup.*" => "Harus berisi minimal 1 barang",
            "nup" => "Harus berisi minimal 1 barang",
            "no_surat" => "Nomor Surat harus diisi",
        ]);

        $update  = BMN::findOrFail($id);
        $update->user_bmn       = $req->petugas;
        $update->no_surat       = $req->no_surat;
        $sts = $update->save();

        // $jml = count($req->id_barang)+1;
        // for($a=1;$a<$jml;$a++){
        //     echo $req->id_barang[$a];
        // }
        
        if($sts){
            $jml = count($req->id);
            for($a=0;$a<$jml;$a++){
                $trns  = TransBMN::findOrFail($req->id[$a]);      
                $trns->barang_id    = $req->nup[$a];
                if(isset($req->kondisi[$a])){
                    $trns->kondisi       = $req->kondisi[$a];
                }
                $trns->save();
            }
        }
        // session () ->flash('success','Data berhasil diupdate');
        // return $this->bstkembali();
        return redirect()->route('bmn.view-kembali')->with('success', 'Data berhasil diupdate');
    }
    public function bstpinjamupdate(Request $req, $id){
        $req->validate([
            "nup.*" => "required",
            "nup" => "required",
        ],[
            "nup.*" => "Harus berisi minimal 1 barang",
            "nup" => "Harus berisi minimal 1 barang",
        ]);

        $update  = BMN::findOrFail($id);
        $update->user_bmn       = $req->petugas;
        $sts = $update->save();

        // $jml = count($req->id_barang)+1;
        // for($a=1;$a<$jml;$a++){
        //     echo $req->id_barang[$a];
        // }
        
        if($sts){
            $jml = count($req->id);
            for($a=0;$a<$jml;$a++){
                $trns  = TransBMN::findOrFail($req->id[$a]);      
                $trns->barang_id    = $req->nup[$a];
                $trns->lokasi       = $req->lokasi[$a];
                if(isset($req->kondisi[$a])){
                    $trns->kondisi       = $req->kondisi[$a];
                }
                $trns->save();
            }
        }
        // session () ->flash('success','Data berhasil diupdate');
        // return $this->bstpinjam();
        return redirect()->route('bmn.view-pinjam')->with('success', 'Data berhasil diupdate');
    }
    public function bstpinjamedit($id){
        $bmn = BMN :: where('id',$id)->first();
        $data = TransBMN :: where('bst_id',$id)->get();
        $pet = User :: where('is_permission',2)->where('isactive',1)->get(['id','name']); 
        $barang = Bmnbarang :: get(['id','kode','nup','nm_barang']);
        $ruang = Bmnruangan :: get();
        return view('bmn.bst_form_edit',['bmn'=>$bmn,'data'=>$data,'jns'=>2,'pet'=>$pet,'barang'=>$barang,'ruang'=>$ruang]);
    }
    public function bstkembalidelete($id){
        $data = BMN::find($id);
        $sts = BMN::find($id)->delete();
        if($sts){
            TransBMN::where('bst_id', $id)->delete();
        }
        // session () ->flash('success','Data berhasil dihapus');
        
        if($data->jns_bst == 1 ){
            // return $this->bstkembali();
            return redirect()->route('bmn.view-kembali')->with('success', 'Data berhasil dihapus');
        }else{
            // return $this->bstpinjam();
            return redirect()->route('bmn.view-pinjam')->with('success', 'Data berhasil dihapus');
        }
    } 
    public function approvkembali($id){
        $update  = BMN::findOrFail($id);
        $update->status      = 1;
        $update->save();

        $jns = BMN :: where('id',$id)->first('jns_bst');
        $barang  = TransBMN :: where('bst_id',$id)->get();
        foreach($barang as $item){
            $updt = Bmnbarang :: findOrFail($item->barang_id);
            if(isset($item->kondisi)){
                $updt ->kondisi = $item->kondisi;
            }
            if($jns->jns_bst == 1){
                $updt ->lokasi  = 101;
            }else{
                $updt ->lokasi  = $item->lokasi;
            }
            $updt ->save();
        }  

        $getuser = BMN :: where('id',$id)->first(['user_id']);
        $user = user :: where('id',$getuser->user_id)->first(['username','name']);
        $profile = Profile :: where('username',$user->username)->first('telpon');

        $pesan1 = '*Yth. Bapak/Ibu* Berita Acara Serah Terima (BAST) Pengembalian barang milik negara atas nama *'.$user->name.'* telah dikonfirmasi oleh Admin BMN';
        sendMessage($pesan1,$profile->telpon);

        // session () ->flash('success','Data Terkonfirmasi');
        // return $this->bstkembali();
        return redirect()->route('bmn.view-kembali')->with('success', 'Data Terkonfirmasi');
    }
    public function approvpinjam($id){
        $update  = BMN::findOrFail($id);
        $update->status      = 1;
        $update->save();

        $jns = BMN :: where('id',$id)->first('jns_bst');
        $barang  = TransBMN :: where('bst_id',$id)->get();
        foreach($barang as $item){
            $updt = Bmnbarang :: findOrFail($item->barang_id);
            if(isset($item->kondisi)){
                $updt ->kondisi = $item->kondisi;
            }
            if($jns->jns_bst == 1){
                $updt ->lokasi  = 101;
            }else{
                $updt ->lokasi  = $item->lokasi;
            }
            $updt ->save();
        }  

        $getuser = BMN :: where('id',$id)->first(['user_id']);
        $user = user :: where('id',$getuser->user_id)->first(['username','name']);
        $profile = Profile :: where('username',$user->username)->first('telpon');

        $pesan1 = '*Yth. Bapak/Ibu* Berita Acara Serah Terima (BAST) Peminjaman barang milik negara atas nama *'.$user->name.'* telah dikonfirmasi oleh Admin BMN';
        sendMessage($pesan1,$profile->telpon);

        // session () ->flash('success','Data Terkonfirmasi');
        // return $this->bstpinjam();
        return redirect()->route('bmn.view-pinjam')->with('success', 'Data Terkonfirmasi');
    }
    public function add($id){
        return view('bmn.nomor_bast',['id'=>$id]);
    }
    public function numberadd(Request $req, $id){
        $update  = BMN::findOrFail($id);
        $update->no_surat      = $req->no_surat;
        $update->save();
        // session () ->flash('success','Data berhasil diinput');
        if($update->jns_bst ==1){
            // return $this->bstkembali();
            return redirect()->route('bmn.view-kembali')->with('success', 'Data berhasil diinput');
        }else{
            // return $this->bstpinjam();
            return redirect()->route('bmn.view-pinjam')->with('success', 'Data berhasil diinput');
        }

    }
    public function numberedit($id){
        $data = BMN:: where('id',$id)->first('no_surat');
        return view('bmn.nomor_surat_edit',['data'=>$data,'id'=>$id]);
    }
    public function numberupdate(Request $req, $id){
        $update  = BMN::findOrFail($id);
        $update->no_surat      = $req->no_surat;
        $update->save();
        // session () ->flash('success','Data berhasil diupdate');
        if($update->jns_bst ==1){
            // return $this->bstkembali();
            return redirect()->route('bmn.view-kembali')->with('success', 'Data berhasil diupdate');
        }else{
            // return $this->bstpinjam();
            return redirect()->route('bmn.view-pinjam')->with('success', 'Data berhasil diupdate');
        }
    }
    public function cetak($id){
        $bmn = BMN :: where('id',$id)->first();
        $user = User :: where('id','=',$bmn->user_bmn)->first(['username','name']);
        $userbmn = User :: where('id','=',$bmn->user_bmn)->first(['username','name']);
        $prof = Profile :: where('username','=',$user->username)->first(['nip','pangkat','jabatan','unit']);
        $nipbmn = Profile :: where('username','=',$userbmn->username)->first(['nip']);
        $data = TransBMN :: where('bst_id',$id)->get();
        // return view('bmn.cetak',['bmn'=>$bmn,'prof'=>$prof,'data'=>$data,'user'=>$user]);

        $pdf = FacadePdf::loadView('bmn.cetak',['bmn'=>$bmn,'prof'=>$prof,'data'=>$data,'user'=>$user,'nipbmn'=>$nipbmn]) ->setOptions([
            'enable_remote' => true,
      
            'defaultFont' => 'serif',
        ]);;
        return $pdf->setPaper('f4', 'portrait')->stream();
    }
    public function cetakpinjam($id){
        $bmn = BMN :: where('id',$id)->first();
        $userid = User :: where('id','=',$bmn->user_id)->first(['username','name']);
        $userbmn = User :: where('id','=',$bmn->user_bmn)->first(['username','name']);
        $prof = Profile :: where('username','=',$userid->username)->first(['nip','pangkat','jabatan','unit']);
        $nipbmn = Profile :: where('username','=',$userbmn->username)->first(['nip']);
        $data = TransBMN :: where('bst_id',$id)->get();
        // return view('bmn.cetakpinjam',['bmn'=>$bmn,'prof'=>$prof,'data'=>$data,'user'=>$userid,'nipbmn'=>$nipbmn]);

         $pdf = FacadePdf::loadView('bmn.cetakpinjam',['bmn'=>$bmn,'prof'=>$prof,'data'=>$data,'user'=>$userid,'nipbmn'=>$nipbmn]) ->setOptions([
            'enable_remote' => true,
      
            'defaultFont' => 'serif',
        ]);;
        return $pdf->setPaper('f4', 'portrait')->stream();
    }
    public function bstpinjam(){
        $data = BMN :: where('jns_bst',2)->orderBy('id', 'DESC')->get(); 
        return view('bmn.daftar',['data'=>$data,'jns'=>2]);
    }
    public function bstpinjaminput(){

        $data = User :: where('isactive',1)->get(['id','name']); 
        $bmn = User :: where('is_permission',2)->where('isactive',1)->get(['id','name']); 
        $barang = Bmnbarang :: get(['id','kode','nup','nm_barang']);
        $ruang = Bmnruangan :: get();
        return view('bmn.bst_form',['data'=>$data,'bmn'=>$bmn,'jns'=>2,'barang'=>$barang,'ruang'=>$ruang]);
    }
    public function bstpinjamstore(Request $req){

        $req->validate([
            "user_id" => "required",
            "nup.*" => "required",
            "nup" => "required",
            "petugas" => "required"
        ],[
            "user_id" => "Nama Pegawai harap dipilih",
            "nup.*" => "Harus berisi minimal 1 barang",
            "nup" => "Harus berisi minimal 1 barang",
            "petugas" => "Pilih petugas BMN"
        ]);

        $data = new BMN();
        $data->jns_bst      = 2; 
        $data->user_id      = $req->user_id;
        $data->user_bmn     = $req->petugas;
        $data->no_surat     = "-";
        $data->user_input   = Auth::user()->id;
        $sts = $data->save();
        $new_id = $data->id;
        if($sts){
           $jml = count($req->nup);
            for($a=0;$a<$jml;$a++){
                if (empty($req->lokasi[$a])) {
                    // Menyimpan pesan error ke dalam session
                    session()->flash('unsuccess', "Semua lokasi barang harus memiliki lokasi tujuan peminjaman, Error lokasi barang ke-" . ($a + 1));
                    return redirect()->back()->withInput();
                }
                $trns = new TransBMN();
                $trns->bst_id       = $new_id;         
                $trns->barang_id    = $req->nup[$a];
                $trns->lokasi       = $req->lokasi[$a];
                if(isset($req->kondisi[$a])){
                    $trns->kondisi       = $req->kondisi[$a];
                }
                $trns->save();
            }
             
            $user = user :: where('id',$data->user_id)->first(['name']);
        
            $pesan = "*Yth. Bapak/Ibu,* Sebuah laporan BAST Peminjaman dari *".$user->name."* Masuk ke akun BALLA POKJA anda untuk dikonfirmasi atau melalui link https://bbpom-makassar.com/bmn/bast-peminjaman  ";
        
            // pesan untuk pak Agus
            $agus = '6285299665356';
            sendMessage($pesan,$agus);
            
            // pesan untuk Ibu Arsy
            $arsy = '6285255955734';
            sendMessage($pesan,$arsy);
            
             // Pesan Untuk Nenenk
            // $nenenk = '6281234675172';
            // sendMessage($pesan,$nenenk);
            
            // pesan untuk Miska
            $miska = '6285333314410';
            sendMessage($pesan,$miska);
            
            // Pesan Untuk Ruslan
            $ruslan = '6285299890021';
            sendMessage($pesan,$ruslan);
            
            // pesan untuk Onde
            $onde = '6281952899549';
            sendMessage($pesan,$onde);
        }

        // session () ->flash('success','Data berhasil diinput');
        // return $this->bstpinjam();

        return redirect()->route('bmn.view-pinjam')->with('success', 'Data berhasil diinput');
    }
    public function show($id)
    {
        $barang = Bmnbarang :: where('id',$id)->first(['nm_barang','kondisi','merek','lokasi','tgl_perolehan']);
        return response()->json([$barang]);
    }
    public function showruang($id){
        $ruang = Bmnruangan :: where('id',$id)->first('nm_ruangan');
        return response()->json([$ruang]);
    }
    public function pinjamKendaraan(){
        $date = date('Y-m-d');
        $drv = Bmndriver :: where('id','<',100)->get();
        $car = Bmncar :: get();
        $trans = TransBMNcar :: whereDate('wkt_pinjam','=',$date)->get();
        return view('bmn.kendaraan.index',['car'=>$car,'driver'=>$drv,'trans'=>$trans]);
    }
    public function pinjamKendFil(Request $req){
        $req->validate([
            "tgl" => "required",
        ],[
            "tgl" => "Pilih tanggal terlebih dahulu",
        ]);
        $drv = Bmndriver :: where('id','<',100)->get();
        $car = Bmncar :: get();
        $date = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
        $trans = TransBMNcar :: whereDate('wkt_pinjam','=',$date)->get();
        return view('bmn.kendaraan.index',['car'=>$car,'driver'=>$drv,'trans'=>$trans,'tgl'=>$req->tgl]);
    }
    public function pinjamMobil($id){
        $car = Bmncar :: where('id',$id)->first();
        $user = User :: where('isactive',1)->get(['id','name']); 
        $driver = Bmndriver :: get();
        return view('bmn.kendaraan.pinjam-kendaraan',['car'=>$car,'user'=>$user,'driver'=>$driver]);
    }
    public function pinjamMobilStore(Request $req, $id){
        $req->validate([
            "user_id" => "required",
            "driver"  =>  "required"
        ],[
            "user_id" => "Pilih Nama Pegawai(Peminjam) terlebih dahulu",
            "driver" => "Pilih Nama driver terlebih dahulu"
        ]);
        $wktu = date('Y-m-d', strtotime(str_replace('/', '-', $req->tgl))).' '.$req -> jam.':00'; 
        $pinjam = new TransBMNcar();
        $pinjam-> user_id       = $req->user_id;
        $pinjam-> user_input    = Auth::user()->id;
        $pinjam-> car_id        = $id;
        $pinjam-> driver_id     = $req->driver;
        $pinjam-> tujuan        = $req->perlu;
        $pinjam-> wkt_pinjam    = $wktu;
        $sts = $pinjam-> save();

        $username = User::where('id','=',Auth::user()->id)->first();
        $telp = Profile :: where('username','=',$username->username)->first('telpon');        
        $pesan = "*Yth Bapak/Ibu,* Pengajuan peminjaman kendaraan anda telah terkirim, silakan menunggu konfirmasi selanjutnya. Terima kasih"; 
        sendMessage($pesan,$telp->telpon);
        
        $pesan2 = "*Yth. Bapak/Ibu,* Sebuah permintaan peminjaman kendaraan masuk diakun anda untuk dikonfirmasi melalui link https://bbpom-makassar.com/bmn/admin/peminjaman-kendaraan";
       
        // pesan untuk pak Agus
        $agus = '6285299665356';
        sendMessage($pesan2,$agus);
        
        // pesan untuk Miska
        // $miska = '6285333314410';
        // sendMessage($pesan2,$miska);
        
        // Pesan Untuk Ruslan
        // $ruslan = '6285299890021';
        // sendMessage($pesan2,$ruslan);
        
        // pesan untuk Onde
        $onde = '6281952899549';
        sendMessage($pesan2,$onde);
        

        if($sts){
            return redirect()->route('bmn.view-pinjam-kendaraan')->with('success', 'Data berhasil diinput');
            // session () ->flash('success','Data berhasil diinput');
            // return $this->pinjamKendaraan();
        }
    }
    public function adminPinKen(){
        $data = TransBMNcar :: whereMonth('created_at','=',date('m'))->orderBy('id', 'DESC')->get();
        return view('bmn.kendaraan.daftar-pinjam',['data'=>$data]);
    }
    public function pinjamMobilaprov(Request $req, $id){
    
        if($req->status == 1){
            $data = TransBMNcar :: findOrFail($id);
            $data->status       = 1;
            $sts = $data->save();

            $car = Bmncar :: findOrFail($data->car_id);
            $car->status       = 3;
            $car->save();

            if($data->driver_id != 100){
                $car = Bmndriver :: findOrFail($data->driver_id);
                $car->status       = 2;
                $car->save();   
            }
            
            $pesan = "*Yth Bapak/Ibu,* Pengajuan peminjaman kendaraan anda telah diterima ✅ dan data peminjaman telah disampaikan kepada *Driver* yang telah dipilih";
            $nama = $data->user->name;
            if(isset($data->wkt_pinjam)) 
            { 
                $tgl = \Carbon\Carbon::parse($data->wkt_pinjam)->format('d-m-Y');
            }else{
                $tgl ='-';
            } 
            if(isset($data->wkt_pinjam)){ $jam = \Carbon\Carbon::parse($data->wkt_pinjam)->format('H:i');}else{$jam ='-';}
            if(isset($data->car)){ $mobil = $data->car->merek.' '.$data->car->type.' - '.$data->car->nopol ;}else{$mobil ='-';}
    
            $driver = Bmndriver :: where('id','=',$data->driver_id)->first('wa');
            $pesanDrv = "Laporan peminjaman kendaraan dari *$nama* Telah dikonfirmasi oleh admin BMN untuk dilakukan pengantaran pada tanggal *$tgl*, jam *$jam* dengan tujuan *$data->tujuan* dengan menggunakan mobil *$mobil* Demikian notifikasi ini untuk dilakukan sesuai yang telah disebutkan";
            if(isset($driver)){
                sendMessage($pesanDrv,$driver->wa);
            }
            $username = User::where('id','=',$data->user_input)->first();
            $telp = Profile :: where('username','=',$username->username)->first('telpon');        
            sendMessage($pesan,$telp->telpon);
    
          
            if($sts){
                return redirect()->route('bmn.view-admin-pinjam-kendaraan')->with('success', 'Data Terkonfirmasi');
                // session () ->flash('success','Data Terkonfirmasi');
                // return $this->adminPinKen();
            }
        }else{
            return view('bmn.kendaraan.form_tolak',['id'=>$id]);
            // $pesan = "*Yth Bapak/Ibu,* Pengajuan peminjaman kendaraan anda telah ditolak ❌, Untuk info lebih lanjut silakan menghubungi admin BMN Moments";
        }
        
    }
    public function pinjamMobilReject(Request $req, $id){
        $data = TransBMNcar :: findOrFail($id);
        $data->status       = 2;
        $data->alasan_tolak = $req->ket;
        $sts = $data->save();

        $pesan = "*Yth Bapak/Ibu,* Pengajuan peminjaman kendaraan anda telah ditolak ❌, Dengan alasan : *$req->ket* Untuk info lebih lanjut silakan menghubungi admin BMN Moments";
        $username = User::where('id','=',$data->user_input)->first();
        $telp = Profile :: where('username','=',$username->username)->first('telpon');        
        sendMessage($pesan,$telp->telpon);

        if($sts){
            session () ->flash('success','Data Terkonfirmasi');
            return $this->adminPinKen();
        }
    }
    
    public function pinjamMobilFil(Request $req){
        if($req->tahun == 'Pilih Tahun' && $req->bulan=='Pilih Bulan'){
            $data = TransBMNcar :: whereYear('created_at', '=', date('Y'))
            ->orderBy('id', 'DESC')
            ->get();
            return view('bmn.kendaraan.daftar-pinjam',['data'=>$data]);
        }else if($req->tahun == 'Pilih Tahun'){
            $data = TransBMNcar :: whereMonth('created_at', '=', $req->bulan)
            ->orderBy('id', 'DESC')
            ->get();
            return view('bmn.kendaraan.daftar-pinjam',['data'=>$data]);
        }else if($req->bulan=='Pilih Bulan'){               
            $data = TransBMNcar :: whereYear('created_at', '=', $req->tahun)
            ->orderBy('id', 'DESC')
            ->get();
            return view('bmn.kendaraan.daftar-pinjam',['data'=>$data]);
        }else{
            $data = TransBMNcar :: whereYear('created_at', '=', $req->tahun)
            ->whereMonth('created_at', '=', $req->bulan)
            ->orderBy('id', 'DESC')
            ->get();
            return view('bmn.kendaraan.daftar-pinjam',['data'=>$data]);
        }
    } 
    public function pinjamMobilDel($id){
        $data = TransBMNcar :: where('id',$id)->first();
        $sts = $data -> delete();
        if($sts){
            return redirect()->route('bmn.view-admin-pinjam-kendaraan')->with('success', 'Data barhasil dihapus');
            // session () ->flash('success','Data berhasil dihapus');
            // return back();
        }
    }
    public function daftarDriv(){
        $data = Bmndriver :: orderBy('id', 'DESC')->get();
        return view('bmn.kendaraan.daftar-driver',['data'=>$data]);
    }
    public function inputDriv(){
        return view('bmn.kendaraan.input-driver');
    }
    public function inputDrivStore(Request $req){
        $req->validate([
            "nama" => "required",
            "wa"  =>  "required"
        ],[
            "nama" => "Kolom Nama harus diisi",
            "wa" => "Kolom nomor WhatsApp harus diisi"
        ]);

        $data = new Bmndriver();
        $data->nama         = $req->nama;
        $data->wa           = $req->wa;
        $data->status       = 1;
        $sts = $data->save();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-driver')->with('success', 'Data barhasil diinput');
            // session () ->flash('success','Data berhasil diinput');
            // return $this->daftarDriv();
        }
    }
    public function drivUpdtSts(Request $req, $id){
        $data = Bmndriver :: findOrFail($id);
        $data->status       = $req->status;
        $sts = $data->save();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-driver')->with('success', 'Data barhasil diupdate');
            // session () ->flash('success','Status berhasil diupdate');
            // return $this->daftarDriv();
        }
    }
    public function drivDel($id){
        $data = Bmndriver :: where('id',$id)->first();
        $sts = $data -> delete();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-driver')->with('success', 'Data barhasil dihapus');
            // session () ->flash('success','Data berhasil dihapus');
            // return back();
        }
    }
    public function daftarKend(){
        $data = Bmncar :: orderBy('id', 'DESC')->get();
        return view('bmn.kendaraan.daftar-kendaraan',['data'=>$data]);
    } 
    public function inputCar(){
        return view('bmn.kendaraan.input-kendaraan');
    }
    public function inputCarStore(Request $req){
        $req->validate([
            "file" => ['required','mimes:jpg,png,jpeg'],
            
        ]);
        $data = new Bmncar();
        $data->nopol        = $req->nopol;
        $data->merek        = $req->merek;
        $data->type         = $req->type;
        $data->status       = 1;
        if($req->file!= ''){  
            $path = public_path().'/storage/car/';
            
            $file1 = $req->file;
            $filename1 = "/storage/car/".time().$file1->getClientOriginalName();
            $file1->move($path, $filename1);
            $data->foto = $filename1;
            
        }else{
            return redirect()->route('bmn.view-admin-daftar-kendaraan')->with('unsuccess', 'File foto tidak ditemukan');
            // session () ->flash('unsuccess','File foto tidak ditemukan');
            // return $this->daftarKend();
        }
        $sts = $data->save();

        if($sts){
            return redirect()->route('bmn.view-admin-daftar-kendaraan')->with('success', 'Data berhasil diinput');
            // session () ->flash('success','Data berhasil diinput');
            // return $this->daftarKend();
        }
    }
    public function carUpdtSts(Request $req, $id){
        $data = Bmncar :: findOrFail($id);
        $data->status       = $req->status;
        $sts = $data->save();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-kendaraan')->with('success', 'Data berhasil diupdate');
            // session () ->flash('success','Status berhasil diupdate');
            // return $this->daftarKend();
        }  
    }
    public function carDel($id){
        $data = Bmncar :: where('id',$id)->first();
        $sts = $data -> delete();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-kendaraan')->with('success', 'Data berhasil dihapus');
            // session () ->flash('success','Data berhasil dihapus');
            // return back();
        }
    }
    public function drivEdit($id){
        $data = Bmndriver :: findOrFail($id);
        return view('bmn.kendaraan.edit-driver',['data' => $data]);
    }
    public function drivUpdate(Request $req, $id){
        $req->validate([
            "wa"  =>  "required"
        ],[
            "wa" => "Kolom nomor WhatsApp harus diisi"
        ]);

        $data = Bmndriver :: findOrFail($id);
        $data->wa       = $req->wa;
        $sts = $data->save();
        
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-driver')->with('success', 'Data barhasil diupdate');
            // session () ->flash('success','Status berhasil diupdate');
            // return $this->daftarDriv();
        }  
    }
    public function carEdit($id){
        $data = Bmncar :: findOrFail($id);
        return view('bmn.kendaraan.edit-kendaraan',['data' => $data]);
    }
    public function carUpdate(Request $req, $id){

        $data = Bmncar :: findOrFail($id);
        $data->nopol       = $req->nopol;

        if($req->file!= ''){        
            $path = public_path().'/storage/car/';
                $car = Bmncar :: where('id', '=', $id)->first();
                if($car->foto && file_exists(public_path().$car->foto)){
                    unlink(public_path().$car->foto);
                }
                
                $file1 = $req->file;
                $filename1 = "/storage/car/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $data->foto = $filename1;

        }
        $sts = $data->save();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-kendaraan')->with('success', 'Data berhasil diupdate');
            // session () ->flash('success','Status berhasil diupdate');
            // return $this->daftarKend();
        }  
    }
    public function daftarRuang(){
        $data = Bmnruangan :: orderBy('id', 'DESC')->get();
        return view('bmn.daftar-ruangan',['data'=>$data]);
    }
    public function inputRuang(){
        return view('bmn.input-ruangan');
    }
    public function inputRuangStore(Request $req){
        $req->validate([
            "nama" => "required",
            "pj"  =>  "required"
        ],[
            "nama" => "Kolom Nama Ruangan harus diisi",
            "pj" => "Kolom Penanggung jawab ruangan harus diisi"
        ]);
        $data = new Bmnruangan();
        $data->nm_ruangan       = $req->nama;
        $data->pj               = $req->pj;
        $sts = $data->save();
        if($sts){
            
            return redirect()->route('bmn.view-admin-daftar-ruang')->with('success', 'Data berhasil diinput');
            // session () ->flash('success','Data berhasil tersimpan');
            // return $this->daftarRuang();
        }  
    }
    public function ruangEdit($id){
        $data = Bmnruangan :: findOrFail($id);
        return view('bmn.edit-ruangan',['data'=>$data]);
    }
    public function ruangUpdate(Request $req, $id){
        $req->validate([
            "nama" => "required",
            "pj"  =>  "required"
        ],[
            "nama" => "Kolom Nama Ruangan harus diisi",
            "pj" => "Kolom Penanggung jawab ruangan harus diisi"
        ]);
        $data = Bmnruangan :: findOrFail($id);
        $data->nm_ruangan       = $req->nama;
        $data->pj               = $req->pj;
        $sts = $data->save();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-ruang')->with('success', 'Data berhasil diupdate');
            // session () ->flash('success','Data berhasil terupdate');
            // return $this->daftarRuang();
        }  
    }
    public function ruangDel($id){
        $data = Bmnruangan :: where('id',$id)->first();
        $sts = $data -> delete();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-ruang')->with('success', 'Data berhasil dihapus');
            // session () ->flash('success','Data berhasil dihapus');
            // return back();
        }
    }
    public function daftarBarang(){
        $data = Bmnbarang::paginate(10); // 10 data per halaman
        return view('bmn.daftar-barang', compact('data'));

        // $data = Bmnbarang :: orderBy('id', 'DESC')->get(['kode','nup','nm_barang','kondisi','lokasi']);
        // return view('c',['data'=>$data]);
    }
    public function barangFil(Request $req){
        
        // Ambil data berdasarkan filter jika ada
        $data = Bmnbarang::when($req->fil, function ($query) use ($req) {
            return $query->where('kode', 'LIKE', "%{$req->fil}%")
            ->orWhere('nm_barang', 'LIKE', "%{$req->fil}%");
        })->paginate(10);

        // Menambahkan parameter filter ke pagination links
        $data->appends(['fil' => $req->fil]);

        return view('bmn.daftar-barang', compact('data'));
    }
    public function detailBarang($id){
        $data = Bmnbarang :: findOrFail($id);
        $track = Bmntracking :: where('barang_id',$id)->orderBy('id', 'DESC')->get();
        return view('bmn.detail-barang',['data'=>$data,'track'=>$track]);
    }
    public function inputBarang(){
        $ruang = Bmnruangan :: get(['id','nm_ruangan']);
        return view('bmn.input-barang',['ruang'=>$ruang]);
    }
    public function inputBarangStore(Request $req){
        $req->validate([
            "kondisi" => "required",
            "lokasi"  =>  "required"
        ],[
            "kondisi" => "Pilih Kondisi Barang terlebih dahulu",
            "lokasi" => "Pilih Lokasi Barang terlebih dahulu"
        ]);
        
        $data = new Bmnbarang();
        $data->kd_satker        = $req->satker;
        $data->kode             = $req->kode;
        $data->nm_barang        = $req->nama;
        $data->nup              = $req->nup;
        $data->kondisi          = $req->kondisi;
        $data->merek            = $req->merek;
        $data->tgl_perolehan    = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
        $data->nilai            = $req->nilai;
        $data->lokasi           = $req->lokasi;
        $data->barcode          = $req->satker.'*'.$req->kode.'*'.$req->nup;
        $sts = $data->save();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-barang')->with('success', 'Data berhasil diinput');
            // session () ->flash('success','Data berhasil tersimpan');
            // return $this->daftarBarang();
        }  
    }
    public function barangEdit($id){
        $data = Bmnbarang :: findOrFail($id);
        $ruang = Bmnruangan :: get(['id','nm_ruangan']);
        return view('bmn.edit-barang',['data'=>$data,'ruang'=>$ruang]);
    }
    public function barangUpdate(Request $req, $id){
        $req->validate([
            "kondisi" => "required",
            "lokasi"  =>  "required"
        ],[
            "kondisi" => "Pilih Kondisi Barang terlebih dahulu",
            "lokasi" => "Pilih Lokasi Barang terlebih dahulu"
        ]);
        
        $data = Bmnbarang :: findOrFail($id);
        $data->nm_barang        = $req->nama;
        $data->kondisi          = $req->kondisi;
        $data->merek            = $req->merek;
        $data->tgl_perolehan    = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
        $data->nilai            = $req->nilai;
        $data->lokasi           = $req->lokasi;
        $sts = $data->save();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-barang')->with('success', 'Data berhasil diupdate');
            // session () ->flash('success','Data berhasil terupdate');
            // return $this->daftarBarang();
        }  
    }
    public function barangDel($id){
        $data = Bmnbarang :: where('id',$id)->first();
        $sts = $data -> delete();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-barang')->with('success', 'Data berhasil dihapus');
            // session () ->flash('success','Data berhasil dihapus');
            // return $this->daftarBarang();
        }
    }
    public function pinjamAula(){
        $aula = Bmnaula :: get();
        $date = date('Y-m-d');
        $trans = TransBMNaula :: whereDate('wkt_pinjam','=',$date)->get();
        return view('bmn.aula.index',['aula'=>$aula,'trans'=>$trans]);
    }
    public function peminjamAula($id){
        $aula = Bmnaula :: where('id',$id)->first();
        $user = User :: where('isactive',1)->get(['id','name']); 
        return view('bmn.aula.pinjam-aula',['aula'=>$aula,'user'=>$user]);
    }
    public function pinjamAulaStore(Request $req, $id){
        $req->validate([
            "tgl" => "required",
            "bentuk" => "required"
        ],[
            "tgl" => "Tanggal Peminjaman harus dipilih",
            "bentuk" => "Bentuk ruangan harus dipilih"
        ]);
        $wktu = date('Y-m-d', strtotime(str_replace('/', '-', $req->tgl))).' '.$req -> jam.':00'; 
        $data = new TransBMNaula();
        $data->user_id      = $req->user_id;
        $data->user_input   = Auth::user()->id;
        $data->aula_id      = $id;
        $data->wkt_pinjam   = $wktu;
        $data->bentuk       = $req->bentuk;
        $data->jumlah       = $req->jumlah;
        $data->catatan      = $req->note;
        $sts = $data->save();
        
        $username = User::where('id','=',Auth::user()->id)->first();
        $telp = Profile :: where('username','=',$username->username)->first('telpon');        
        $pesan = "*Yth Bapak/Ibu,* Pengajuan peminjaman AULA anda telah terkirim, silakan menunggu konfirmasi selanjutnya. Terima kasih"; 
        sendMessage($pesan,$telp->telpon);
        
        $pesan2 = "*Yth. Bapak/Ibu,* Sebuah permintaan peminjaman AULA masuk diakun anda untuk dikonfirmasi melalui link https://bbpom-makassar.com/bmn/admin/peminjaman-aula";
       
        // pesan untuk pak Agus
        $agus = '6285299665356';
        sendMessage($pesan2,$agus);
        
        // pesan untuk Miska
        // $miska = '6285333314410';
        // sendMessage($pesan2,$miska);
        
        // Pesan Untuk Ruslan
        // $ruslan = '6285299890021';
        // sendMessage($pesan2,$ruslan);
        
        // pesan untuk Onde
        $onde = '6281952899549';
        sendMessage($pesan2,$onde);
        
        if($sts){
            return redirect()->route('bmn.view-pinjam-aula')->with('success', 'Data berhasil terinput');
            // session () ->flash('success','Data berhasil terinput');
            // return $this->pinjamAula();
        } 
    }
    public function pinjamAuladFil(Request $req){
        $req->validate([
            "tgl" => "required",
        ],[
            "tgl" => "Pilih tanggal terlebih dahulu",
        ]);
        $aula = Bmnaula :: get();
        $date = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
        $trans = TransBMNaula :: whereDate('wkt_pinjam','=',$date)->get();
        return view('bmn.aula.index',['aula'=>$aula,'trans'=>$trans,'tgl'=>$req->tgl]);
    }
    public function daftarAula(){
        $data = Bmnaula :: get();
        return view('bmn.aula.daftar-aula',['data'=>$data]);
    }
    public function inputAula(){
        return view('bmn.aula.input-aula');
    }
    public function inputAulaStore(Request $req){
        $req->validate([
            "file" => ['required','mimes:jpg,png,jpeg'],
            
        ]);
        $data = new Bmnaula();
        $data->nm_aula          = $req->nama;
        $data->pj_aula          = $req->pj;
        $data->ukuran           = $req->ukuran;
        $data->kapasitas        = $req->kapasitas;
        $data->petugas          = $req->petugas;
        $data->wa_petugas       = $req->wa;
        $data->status           = 1;
        if($req->file!= ''){  
            $path = public_path().'/storage/aula/';
            
            $file1 = $req->file;
            $filename1 = "/storage/aula/".time().$file1->getClientOriginalName();
            $file1->move($path, $filename1);
            $data->foto = $filename1;
            
        }else{
            return redirect()->route('bmn.view-admin-daftar-aula')->with('success', 'File Foto tidak ditemukan');
            // session () ->flash('unsuccess','File foto tidak ditemukan');
            // return $this->daftarAula();
        }
        $sts = $data->save();

        if($sts){
            return redirect()->route('bmn.view-admin-daftar-aula')->with('success', 'Data berhasil diinput');
            // session () ->flash('success','Data berhasil diinput');
            // return $this->daftarAula();
        }
    }
    public function aulaEdit($id){
        $data = Bmnaula :: findOrFail($id);
        return view('bmn.aula.edit-aula',['data' => $data]);
    }
    public function aulaUpdate(Request $req, $id){
        $data = Bmnaula :: findOrFail($id);
        $data->nm_aula          = $req->nama;
        $data->pj_aula          = $req->pj;
        $data->ukuran           = $req->ukuran;
        $data->kapasitas        = $req->kapasitas;
        $data->petugas          = $req->petugas;
        $data->wa_petugas       = $req->wa;
        if($req->file!= ''){        
            $path = public_path().'/storage/aula/';
                $aula = Bmnaula :: where('id', '=', $id)->first();
                if($aula->foto && file_exists(public_path().$aula->foto)){
                    unlink(public_path().$aula->foto);
                }
                
                $file1 = $req->file;
                $filename1 = "/storage/aula/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $data->foto = $filename1;

        }
        $sts = $data->save();
        if($sts){
             return redirect()->route('bmn.view-admin-daftar-aula')->with('success', 'Data berhasil diupdate');
            // session () ->flash('success','Status berhasil diupdate');
            // return $this->daftarAula();
        }  
    }
    public function aulaUpdtSts(Request $req, $id){
        $data = Bmnaula :: findOrFail($id);
        $data->status       = $req->status;
        $sts = $data->save();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-aula')->with('success', 'Data berhasil diupdate');
            // session () ->flash('success','Status berhasil diupdate');
            // return $this->daftarAula();
        }  
    }
    public function aulaDel($id){
        $data = Bmnaula :: where('id',$id)->first();
        $sts = $data -> delete();
        if($sts){
            return redirect()->route('bmn.view-admin-daftar-aula')->with('success', 'Data berhasil dihapus');
            // session () ->flash('success','Data berhasil dihapus');
            // return back();
        }
    }
    public function adminPinAula(){
        $data = TransBMNaula :: whereMonth('created_at','=',date('m'))->orderBy('id', 'DESC')->get();
        return view('bmn.aula.daftar-pinjam',['data'=>$data]);
    }
    public function pinjamAulaApprov(Request $req, $id){
        $data = TransBMNaula :: findOrFail($id);
        $data->status       = $req->status;
        $sts = $data->save();
        
        if($req->status == 1){
            $pesan = "*Yth Bapak/Ibu,* Pengajuan peminjaman AULA anda telah diterima ✅ ";

            echo $wa = Bmnaula :: where('id',$data->aula_id)->first('wa_petugas');  

            $nama = $data->user->name;
            $pesanPetugas = "Laporan peminjaman AULA dari *$nama* Telah dikonfirmasi oleh admin BMN untuk dilakukan pengaturan AULA sesuai dengan ketentuan peminjaman, Untuk informasi lebih lanjut silakan untuk menghubungi pihak BMN";
            sendMessage($pesanPetugas,$wa->wa_petugas);

        }else{
            $pesan = "*Yth Bapak/Ibu,* Pengajuan peminjaman AULA anda telah ditolak ❌, Untuk info lebih lanjut silakan menghubungi admin BMN Moments";
           
        }
            $username = User::where('id','=',$data->user_input)->first();
            $telp = Profile :: where('username','=',$username->username)->first('telpon');        
            sendMessage($pesan,$telp->telpon);
        if($sts){
            return redirect()->route('bmn.view-admin-pinjam-aula')->with('success', 'Data Terkonfirmasi');
            // session () ->flash('success','Data Terkonfirmasi');
            // return $this->adminPinAula();
        }
    }
    public function pinjamAulaDel($id){
        $data = TransBMNaula :: where('id',$id)->first();
        $sts = $data -> delete();
        if($sts){
            return redirect()->route('bmn.view-admin-pinjam-aula')->with('success', 'Data berhasil dihapus');
            // session () ->flash('success','Data berhasil dihapus');
            // return back();
        }
    }
    public function pinjamAulaFil(Request $req){
        if($req->tahun == 'Pilih Tahun' && $req->bulan=='Pilih Bulan'){
            $data = TransBMNaula :: whereYear('created_at', '=', date('Y'))
            ->orderBy('id', 'DESC')
            ->get();
            return view('bmn.aula.daftar-pinjam',['data'=>$data]);
        }else if($req->tahun == 'Pilih Tahun'){
            $data = TransBMNaula :: whereMonth('created_at', '=', $req->bulan)
            ->orderBy('id', 'DESC')
            ->get();
            return view('bmn.aula.daftar-pinjam',['data'=>$data]);
        }else if($req->bulan=='Pilih Bulan'){               
            $data = TransBMNaula :: whereYear('created_at', '=', $req->tahun)
            ->orderBy('id', 'DESC')
            ->get();
            return view('bmn.aula.daftar-pinjam',['data'=>$data]);
        }else{
            $data = TransBMNaula :: whereYear('created_at', '=', $req->tahun)
            ->whereMonth('created_at', '=', $req->bulan)
            ->orderBy('id', 'DESC')
            ->get();
            return view('bmn.aula.daftar-pinjam',['data'=>$data]);
        }
    } 
    public function nonBast(){
        $id =Auth::user()->id;
        $data = Bmnnonbast :: where('user_id',$id)
                ->orWhere('user_input',$id)
                ->orderBy('id', 'DESC')
                ->get();
        return view('bmn.nonbast.daftar',['data'=>$data]);
    }
    public function nonBastInput(){
        $data = User :: get(['id','name']); 
        $barang = Bmnbarang :: get(['id','kode','nup','nm_barang','merek']);
        return view('bmn.nonbast.bst_form',['data'=>$data,'barang'=>$barang]);
    }
    public function nonBastStore(Request $req){
        $req->validate([
            "user_id" => "required",
            "nup.*" => "required",
            "nup" => "required"
        ],[
            "user_id" => "Nama Pegawai harap dipilih",
            "nup.*" => "Harus berisi minimal 1 barang",
            "nup" => "Harus berisi minimal 1 barang"
        ]);
        $wktu = date('Y-m-d', strtotime(str_replace('/', '-', $req->tgl))).' '.$req -> jam.':00'; 
        $data = new Bmnnonbast();
        $data->user_id      = $req->user_id;
        $data->user_input   = Auth::user()->id;
        $data->tujuan       = $req->perlu;
        $data->wkt_pinjam   = $wktu;
        $data->status       = 0;
        $sts = $data->save();
        $new_id = $data->id;
        if($sts){
            $jml = count($req->nup);
            for($a=0;$a<$jml;$a++){
                $trns = new TransBMNnonbast();
                $trns->nonbast_id   = $new_id;         
                $trns->barang_id    = $req->nup[$a];
                $trns->save();
            }
        }
        
         $pesan2 = "*Yth. Bapak/Ibu,* Sebuah permintaan peminjaman barang masuk diakun anda untuk dikonfirmasi melalui link https://bbpom-makassar.com/bmn/admin/pinjam-non-bast";
       
        // pesan untuk pak Agus
        // $agus = '6285299665356';
        // sendMessage($pesan2,$agus);
        
        // pesan untuk Miska
        // $miska = '6285333314410';
        // sendMessage($pesan2,$miska);
        
        // Pesan Untuk Ruslan
        // $ruslan = '6285299890021';
        // sendMessage($pesan2,$ruslan);
        
        // pesan untuk Onde
        $onde = '6281952899549';
        sendMessage($pesan2,$onde);
        
        return redirect()->route('bmn.non-bast')->with('success', 'Data berhasil diinput');
        
    }
    public function nonBastDetail($id){
        $bmn = Bmnnonbast :: where('id',$id)->first();
        $data = TransBMNnonbast :: where('nonbast_id',$id)->get();
        return view('bmn.nonbast.detail',['bmn'=>$bmn,'data'=>$data]);
    }
     public function nonBastAppr(Request $req, $id){
        // Cek apakah id_barang valid
        if (!isset($req->id_barang) || !is_array($req->id_barang) || count($req->id_barang) === 0) {
            return response()->json(['error' => 'ID Barang tidak valid atau kosong'], 400);
        }

        $jml = count($req->id_barang);
        $barang1 = [];
        $barang2 = [];

        $update  = Bmnnonbast::findOrFail($id);
        $update->status      = 1;
        $update->save();
            
        for ($a = 0; $a < $jml; $a++) {

           

            // Ambil data berdasarkan barang_id
            $data = TransBMNnonbast::where('nonbast_id',$id)->where('barang_id', $req->id_barang[$a])->first();
            
            // Jika data tidak ditemukan, lanjut ke iterasi berikutnya
            if (!$data) {
                continue;
            }

            // Update status dengan pengecekan isset()
            $data->status = isset($req->sts[$a]) ? $req->sts[$a] : null;
            $data->save();

            // Pisahkan barang berdasarkan status persetujuan
            if (isset($req->sts[$a]) && $req->sts[$a] == 1) {
                $barang1[] = $req->nm_barang[$a] ?? 'Barang Tidak Diketahui';
            } else {
                $barang2[] = $req->nm_barang[$a] ?? 'Barang Tidak Diketahui';
            }
        }

        // Menggabungkan item menjadi string
        $text1 = implode(", ", $barang1);
        $text2 = implode(", ", $barang2);

        // Menentukan pesan berdasarkan kondisi
        if (!empty($text1) && !empty($text2)) {
            $pesan = "*Yth. Bapak/Ibu*,\n\n"
                . "Peminjaman barang Non BAST untuk barang *$text1* telah disetujui.\n\n"
                . "Sedangkan peminjaman barang Non BAST untuk barang *$text2* telah ditolak oleh admin BMN.\n"
                . "Untuk info lebih lanjut silahkan menghubungi pihak BMN.";
        } elseif (!empty($text1)) {
            $pesan = "*Yth. Bapak/Ibu*,\n\n"
                . "Peminjaman barang Non BAST untuk barang *$text1* telah disetujui.";
        } elseif (!empty($text2)) {
            $pesan = "*Yth. Bapak/Ibu*,\n\n"
                . "Peminjaman barang Non BAST untuk barang *$text2* telah ditolak oleh admin BMN.\n"
                . "Untuk info lebih lanjut silahkan menghubungi pihak BMN.";
        } else {
            $pesan = "*Yth. Bapak/Ibu*,\n\n"
                . "Peminjaman barang Non BAST telah ditolak oleh admin BMN.\n"
                . "Untuk info lebih lanjut silahkan menghubungi pihak BMN.";
        }

        // Kirim pesan
        $username = User::where('id','=',$update->user_input)->first();
        $telp = Profile :: where('username','=',$username->username)->first('telpon');        
        sendMessage($pesan,$telp->telpon);

        return redirect()->route('bmn.non-bast-admin')->with('success', 'Data Terkonfirmasi');
    }
    public function nonBastAdmin(){
        $data = Bmnnonbast :: whereMonth('created_at','=',date('m'))->orderBy('id', 'DESC')->get();
        return view('bmn.nonbast.daftar-admin',['data'=>$data]);
    }
    public function nonBastFil(Request $req){
        if($req->tahun == 'Pilih Tahun' && $req->bulan=='Pilih Bulan'){
            $data = Bmnnonbast :: whereYear('created_at', '=', date('Y'))
            ->orderBy('id', 'DESC')
            ->get();
            return view('bmn.nonbast.daftar-admin',['data'=>$data]);
        }else if($req->tahun == 'Pilih Tahun'){
            $data = Bmnnonbast :: whereMonth('created_at', '=', $req->bulan)
            ->orderBy('id', 'DESC')
            ->get();
            return view('bmn.nonbast.daftar-admin',['data'=>$data]);
        }else if($req->bulan=='Pilih Bulan'){               
            $data = Bmnnonbast :: whereYear('created_at', '=', $req->tahun)
            ->orderBy('id', 'DESC')
            ->get();
            return view('bmn.nonbast.daftar-admin',['data'=>$data]);
        }else{
            $data = Bmnnonbast :: whereYear('created_at', '=', $req->tahun)
            ->whereMonth('created_at', '=', $req->bulan)
            ->orderBy('id', 'DESC')
            ->get();
            return view('bmn.nonbast.daftar-admin',['data'=>$data]);
        }
    }
    public function nonBastDel($id){
        Bmnnonbast :: where('id',$id)->delete();
        TransBMNnonbast :: where('nonbast_id',$id)->delete();
        
        return redirect()->route('bmn.non-bast')->with('success', 'Data berhasil dihapus');
        
    }
    public function adminNonBastDel($id){
        Bmnnonbast :: where('id',$id)->delete();
        TransBMNnonbast :: where('nonbast_id',$id)->delete();
        
        return redirect()->route('bmn.non-bast-admin')->with('success', 'Data berhasil dihapus');
    }
}
