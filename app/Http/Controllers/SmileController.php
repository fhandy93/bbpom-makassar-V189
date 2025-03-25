<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Smile;
use App\Models\Translembur;
use App\Models\Translemburuser;
use App\Models\User;
use Carbon\Carbon;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class SmileController extends Controller
{
    public function index(){
        $id = Auth::user()-> id;
        $lembur = Smile :: where('user_id','=',$id)->whereMonth('created_at', date('m'))->latest()->get();
        return view('smile.index',['lembur'=> $lembur]);
        // senImage();
    }
    public function form(){
        $username = Auth::user()-> username;
        $id = Auth::user()-> id;
        $type = Auth::user()-> type;
        $lembur = Profile :: where('username','=',$username)->first();
        $users  = User :: where('isactive','=',1)->where('id','!=',$id)->where('type','=',$type)->get();
        return view('smile.smilei',['lembur'=> $lembur,'users'=>$users]);
    }
    public function storeLembur(Request $request){
        $request -> validate([
            'nama' => ['required','min:2'],
            'nip' => ['required'],
            'pangkat' => ['required'],
            'jabatan' => ['required'],
            'tugas' => ['required','min:4'],
            'tgl_mulai' => ['required'],
        ]);
      
        try{
            
            
            $lembur                 = new Smile();
            $lembur->user_id        = Auth::user()-> id;
            $lembur->tugas          = $request->tugas;
            if(isset($request->tgl_selesai)){
                $lembur->tgl_lembur = $request->tgl_mulai.' s.d '.$request->tgl_selesai; 
            }else{
                $lembur->tgl_lembur = $request->tgl_mulai;
            }
            $status = $lembur->save();

            if($request->user){
                foreach($request->user as $user){

                    $user = User :: where('id','=',$user)->first();
                    $profil = Profile :: where('username','=',$user->username)->first();
                    
                    $userlem                 = new Translemburuser();
                    $userlem->lembur_id      = $lembur->id;
                    $userlem->user_id        = $user->id;
                    if(isset($profil)){
                        $userlem->nip            = $profil->nip;
                        $userlem->pangkat        = $profil->pangkat;
                        $userlem->jabatan        = $profil->jabatan;
                    }else{
                        $userlem->nip            = '-';
                        $userlem->pangkat        = '-';
                        $userlem->jabatan        = '-';
                    }
                    
                    $userlem->save();
                }
            }


            if($status){
                // $user_id        = Auth::user()-> id;
                // Pesan ke pegawai
                // $no_telp = Profile :: where('id','=',$user_id)->first();
                // $pesan = '*Yth. Bapak/Ibu*🙏, Pengajuan lembur anda telah terinput kedalam system dan akan di riview oleh atasan/KTU secepatnya';
                // sendMessage($pesan,$no_telp->telpon);

                // Pesan ke KTU
                $no_telp2 = '081355957120';
                $pesan2 = '*Yth. Bapak/Ibu*🙏, Pengajuan lembur baru masuk ke akun anda untuk segera di review, Silakan login menggunakan akun anda atau dengan melalui link: https://bbpom-makassar.com/data-lembur-masuk ';
                sendMessage($pesan2,$no_telp2);
            }
            return back()->with('success', 'Data berhasil diinput');
        }catch (\Exception $e){
            return back()->with('unsuccess', $e->getMessage());
        }
    }
    public function deleteLembur($id){
        try{
            $delete = Smile :: where('id',$id)->first();
            $delete -> delete();
            session () ->flash('success','Data berhasil dihapus');
            return back();
        }catch(\Exception $e){
            session () ->flash('unsuccess', $e->getMessage());
            return back();
        }
    }
    public function lemburIncome(){
        $lembur = Smile :: where('status','=',0)->orderBy('id', 'DESC')->get();
       
        return view('smile.smile_incomev',['lembur'=> $lembur,'status'=>'Masuk']);
    }
    public function lemburDetail($id){
        $lembur = Smile :: where('id','=',$id)->first();
        $user = User :: where('id','=',$lembur->user->id)->first();
        $profil = Profile :: where('username','=',$user->username)->first();
        $user_lembur = Translemburuser :: where('lembur_id','=',$id)->get();
        $trans = Translembur ::where('lembur_id','=', $lembur->id)->get();
        return view('smile.detail_lembur',['lembur'=>$lembur,'profil'=>$profil, 'trans'=>$trans, 'user'=>$user_lembur ]);
    }
    public function lemburApprove($id){
        try{
            $lembur = Smile::findOrFail($id);
            $lembur->status = 1;
            $lembur->save();
            
            $lembur = Smile :: where('id','=',$id)->first();
            $tugas = $lembur->tgl_lembur;

             // Pesan User Smile
             $get_id        = Smile :: where('id','=',$id)->first();
             $username = User::where('id','=',$get_id->user_id)->first();
             $no_telp1 = Profile :: where('username','=',$username->username)->first();
             $pesan1 = '*Yth. Bapak/Ibu*🙏, Permintaan lembur anda pada tanggal:'.$tugas.' Telah ✅ disetujui oleh atasan, Silakan melaksanakan lembur sesuai dengan tanggal yang telah diajukan ';
             sendMessage($pesan1,$no_telp1->telpon);

             // Pesan ke Kepegawaian  kak ica
             $no_telp2 = '0895386153638';
             $pesan2 = '*Yth. Bapak/Ibu*🙏, Sebuah permintaan lembur telah disetujui oleh atasan anda, silakan login ke aplikasi BALLA POKJA atau login melalui link  https://bbpom-makassar.com/data-lembur-terima untuk melakukan input No. Surat dan Pembuatan Surat Perintah Lembur';
             sendMessage($pesan2,$no_telp2);

            $lembur = Smile :: where('status','=',0)->get();
            session () ->flash('success','Data terupprove');
            return view('smile.smile_incomev',['lembur'=> $lembur,'status'=>'Diterima']);
            
        }catch(\Exception $e){
            $lembur = Smile :: where('status','=',0)->get();
            session () ->flash('unsuccess',$e->getMessage());
            return view('smile.smile_incomev',['lembur'=> $lembur,'status'=>'Diterima']);
        }
    }
    public function lemburTolak($id){
        return view('smile.form_tolak',['id'=>$id]);
    }
    public function alasanTolak(Request $request, $id){
        $request -> validate([
            'ket' => ['required'],
            
        ]);
        try{
            $lembur = Smile::findOrFail($id);
            $lembur->status = 2;
            $lembur->alasan_tolak = $request->ket;
            $lembur->save();

             // Pesan User Smile
             $get_id        = Smile :: where('id','=',$id)->first();
             $username = User::where('id','=',$get_id->user_id)->first();
             $no_telp1 = Profile :: where('username','=',$username->username)->first();
             $pesan1 = '*Yth. Bapak/Ibu*🙏, Permintaan lembur anda pada tanggal:'.$get_id->tgl_lembur.' Ditolak oleh atasan/KTU dengan alasan:*'.$request->ket.'*';
             sendMessage($pesan1,$no_telp1->telpon);

            $lembur = Smile :: where('status','=',0)->get();
            return view('smile.smile_incomev',['lembur'=> $lembur,'status'=>'Masuk']);
            
        }catch(\Exception $e){
            session () ->flash('unsuccess',$e->getMessage());
            return view('smile.smile_incomev',['lembur'=> $lembur]);
        }
    }
    public function lemburTerima(){
        $lembur = Smile :: where('status','=', 1)->orderBy('id', 'DESC')->get();
        return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Diterima','status'=>'Diterima']);
    }
    public function lemburInNomor($id){
        return view('smile.form_nomor',['id'=>$id]);
    }
    public function lemburNomorSpml(Request $request,$id){
        $request -> validate([
            'no_surat' => 'required|unique:lembur,no_surat,' . $id,
        ]);
        try {
        $lembur = Smile::findOrFail($id);
        $lembur->no_surat = $request->no_surat;
        $status = $lembur->save();
        if($status){
            $lembur = Smile :: where('status','=', 1)->get();
            session () ->flash('success','No Surat telah diinput');
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Diterima']);
        }
        
        }catch(\Exception $e){
            $lembur = Smile :: where('status','=', 1)->get();
            session () ->flash('unsuccess',$e->getMessage());
            return view('smile.smile_incomev',['lembur'=>$lembur]);
        }
    }
    public function inputSpml($id){
        return view('smile.form_spml',['id'=>$id]);
    }
    public function inputStoreSpml(Request $request,$id){
        $request -> validate([
            'spml' => ['required','mimes:pdf'],
        ]);
        try {
            
                $lembur = Smile::findOrFail($id);
                if($request->spml != ''){        
                    $path = public_path().'/storage/smile/';
        
                    //upload new file
                    $file = $request->spml;
                    $filename1 = "/storage/smile/".time().$file->getClientOriginalName();
                    $file->move($path, $filename1);
                    $lembur->file = $filename1;
                    $lembur->status = 3;
                }
                $status = $lembur->save();
                 // Pesan ke Kepegawaian  kak zul
                $no_telp2 = '081355481823';
                $pesan2 = '*Yth. Bapak/Ibu*🙏, Sebuah permintaan lembur telah disetujui oleh atasan anda, silakan login ke aplikasi BALLA POKJA atau login melalui link  https://bbpom-makassar.com/lembur-terbit-spml untuk melakukan input verifikasi absen lembur yang telah dilakukan';
                sendMessage($pesan2,$no_telp2);

                if($status){
                    $lembur = Smile :: where('status','=', 1)->get();
                    session () ->flash('success','SPML telah diinput');
                    return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Diterima']);
                }
            }catch(\Exception $e){
                $lembur = Smile :: where('status','=', 1)->get();
                session () ->flash('unsuccess',$e->getMessage());
                return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Diterima']);
            }
    }
    public function view_file($id){
        $data = Smile::where('id',$id)->first('file');
        return view('smile.priview_file',['data'=>$data]);
    }
    public function lemburTolakIncome(){
        $lembur = Smile :: where('status','=',2)->get();
        return view('smile.smile_incomev',['lembur'=> $lembur,'status'=>'Ditolak']);
    }
    public function lemburSpml(){
        $lembur = Smile :: where('status','=',3)->orWhere('status','=',4)->get();
        return view('smile.smile_incomev',['lembur'=> $lembur,'status'=>'Terbit SPML']);
    }
    public function inputAbsen($id,$lembur_id){
        return view('smile.form_absen',['id'=>$id,'lembur_id'=>$lembur_id]);
    }
    public function inputStoreAbsen(Request $request,$id,$lembur_id){
        
        $request -> validate([
            'absen' => ['required','mimes:pdf,xlsx,xls'],
            'tgl_lembur' => ['required'],
            
        ]);

        $path = public_path().'/storage/smile/';
        try{
            $lembur         = new Translembur();
            $lembur->lembur_id      = $id;
            $lembur->user_id        = $lembur_id;
            $lembur->tgl_lembur     = Carbon::createFromFormat('d/m/Y',$request->tgl_lembur)->format('Y-m-d');
            $lembur->jam_mulai      = $request->jam1.':'.$request->menit1.':'.$request->detik1;
            $lembur->jam_selesai    = $request->jam2.':'.$request->menit2.':'.$request->detik2;

            //upload new file
            $file = $request->absen;
            $filename1 = "/storage/smile/".time().$file->getClientOriginalName();
            $file->move($path, $filename1);
            $lembur->file1 = $filename1;
            $status = $lembur->save();

            $lembur2 = Smile::findOrFail($id);
            if($lembur2->status == 3){
                $lembur2->status = 4;
            }else if($lembur2->status == 10){
                $lembur2->status = 10;
            }else {
                $lembur2->status = 8;
            }
            
            $lembur2->save();

            if($status){
                return $this->lemburDetail($id);
            }
        }catch(\Exception $e){
            $lembur = Smile :: where('status','=',3)->orWhere('status','=',4)->get();
            session () ->flash('unsuccess',$e->getMessage());
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Terbit SPML']);
        }
    }
    public function view_absen($id){
        $data = Translembur::where('id',$id)->first('file1');
        return view('smile.priview_file',['data'=>$data]);
    }
    public function detailAbsen($id,$lembur_id){

        $trans = Translembur ::where('lembur_id','=', $id)
                                ->where('user_id','=', $lembur_id)
                                ->get();
        $lembur = Smile :: where('id','=', $id)->first('status');
        return view('smile.detail_absen',['trans'=>$trans, 'lembur_id'=>$id, 'status'=>$lembur ]);
    }

    public function smileKonfir($id){
        
        try{
            $lembur2 = Smile::findOrFail($id);
            $lembur2->status = 5;
            $lembur2->save();

             // Pesan User Smile
             $get_id        = Smile :: where('id','=',$id)->first();
             $username = User::where('id','=',$get_id->user_id)->first();
             $no_telp1 = Profile :: where('username','=',$username->username)->first();
             $pesan1 = '*Yth. Bapak/Ibu*🙏, Permintaan lembur anda pada tanggal:'.$get_id->tgl_lembur.' Telah ✅Diverifikasi Absen, Silkan login ke akun anda atau melalui link https://bbpom-makassar.com/smile-verify/'.$id.' untuk mengupload Data Dukung lembur dan keterangan lembur anda';
             sendMessage($pesan1,$no_telp1->telpon);

            $lembur = Smile :: where('status','=',3)->orWhere('status','=',4)->get();
            session () ->flash('success','Verifikasi absen telah diinput');
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Terbit SPML']);
        }catch(\Exception $e){
            $lembur = Smile :: where('status','=',3)->orWhere('status','=',4)->get();
            session () ->flash('unsuccess',$e->getMessage());
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Terbit SPML']);
        }
        
    }
    
    public function lemburKonfir(){
        $lembur = Smile :: where('status','=',7)->latest()->get();
        return view('smile.smile_incomev',['lembur'=> $lembur,'status'=>'Terkonfirmasi']);
    }
    public function lemburHistory(){

        $id = Auth::user()-> id;
        $lembur = Smile :: where('user_id','=',$id)->whereMonth('created_at', '!=', date('m'))->get();
        return view('smile.smile_incomev',['lembur'=> $lembur,'status'=>'(History)']);
    }
    public function lemburVerify($id){
        return view('smile.form_verify',['id'=>$id]);
    }
    public function lemburVerified(Request $request, $id){
        $request -> validate([
            'file' => ['required','mimes:pdf,jpeg,png,jpg,gif'],
            'ket' => ['required'],
        ]);
        try {
            
            $lembur = Smile::findOrFail($id);
            if($request->file != ''){        
                $path = public_path().'/storage/smile/';
    
                //upload new file
                $file = $request->file;
                $filename1 = "/storage/smile/".time().$file->getClientOriginalName();
                $file->move($path, $filename1);
                $lembur->file2 = $filename1;
                $lembur->ket = $request->ket;
                $lembur->status = 6;
            }
            $status = $lembur->save();

            // Pesan User Smile
            // $get_id        = Smile :: where('id','=',$id)->first();
            // $username = User::where('id','=',$get_id->user_id)->first();
            // $no_telp1 = Profile :: where('username','=',$username->username)->first();
            // $pesan1 = '*Yth. Bapak/Ibu*🙏, Permintaan lembur anda pada tanggal:'.$get_id->tgl_lembur.' Telah disampaikan kepihak Keuangan/PE untuk dikonfirmasi';
            // sendMessage($pesan1,$no_telp1->telpon);

            // Pesan ke Keuangan KTU
            $no_telp2 = '081355957120';
            $pesan2 = '*Yth. Bapak/Ibu*🙏, Laporan lembur yang telah ✅Diverifikasi oleh pihak KEPEGAWAIAN masuk ke akun anda untuk direview dan ditanda tangani, silakan login ke aplikasi BALLA POKJA atau login melalui link  https://bbpom-makassar.com/data-lembur-menunggu-konfirmasi';
            sendMessage($pesan2,$no_telp2);
            
            if($status){
                
                session () ->flash('success','Lembur telah terverifikasi');
                return $this->index();
            }
        }catch(\Exception $e){
            
            session () ->flash('unsuccess',$e->getMessage());
            return $this->index();
        }
    }
    public function lemburGetKonfir(){
        $lembur = Smile :: where('status','=',6)->get();
        return view('smile.smile_incomev',['lembur'=> $lembur,'status'=>'Menunggu Konfirmasi']);
    }
    public function lemburTtd($id){
        try{
            $lembur2 = Smile::findOrFail($id);
            $lembur2->status = 7;
            $lembur2->ttd_date = date('Y-m-d');
            $lembur2->save();

            // Pesan ke Keuangan Rasyka
            $no_telp2 = '082291811381';
            $pesan2 = '*Yth. Bapak/Ibu*🙏, Laporan lembur baru yang telah ✅Dikonfirmasi/Ditanda Tangani oleh pihak KTU masuk ke akun anda untuk ditindak lanjuti, silakan login ke aplikasi BALLA POKJA atau login melalui link  https://bbpom-makassar.com/lembur-konfirmed';
            sendMessage($pesan2,$no_telp2);

            $lembur = Smile :: where('status','=',6)->get();
            session () ->flash('success','Lembur telah ditanda tangani');
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Menunggu Konfirmasi']);

        }catch(\Exception $e){
            $lembur = Smile :: where('status','=',6)->get();
            session () ->flash('unsuccess',$e->getMessage());
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Menunggu Konfirmasi']);
        }
    }
    public function downSpml($id){
        $lembur = Smile :: where('id','=',$id)->first();
        $user = User :: where('id','=',$lembur->user_id)->first();
        $profil = Profile ::where('username','=',$user->username)->first();

        $trans = Translemburuser :: where('lembur_id','=',$id)->get();
        
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

       
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $fontStyle->setUnderline('single');
        
        $fontStyle2 = new \PhpOffice\PhpWord\Style\Font();    
        $fontStyle2->setSize(13);

        $fontStyle3 = new \PhpOffice\PhpWord\Style\Font();    
        $fontStyle3->setSize(12);
    

        $section = $phpWord->addSection();

        $title = "SURAT PERINTAH LEMBUR";
        $no_surat = "NOMOR:".$lembur->no_surat;
        $description = "Yang bertanda tangan dibawah ini, Plt. Kepala Balai Besar POM di Makassar, memerintahkan kerja lembur kepada:";
        $end = "Demikian surat perintah kerja lembur ini dibuat untuk diketahui.";
        $tgl = "Makassar, ". Carbon::now()->translatedFormat('j F Y');
        $an = "Kepala Balai Besar POM di Makassar";
        $ttd = '${ttd_pengirim}';
        $nama = "Dra. Hariani, Apt.";
        $nip = "19661220 199303 2 001";

        $table = array('borderColor'=>'black', 'borderSize'=> 1, 'cellMargin'=>50, 'valign'=>'center');
        $phpWord->addTableStyle('table', $table);

        $table2 = array( 'cellMargin'=>50, 'valign'=>'center');
        $phpWord->addTableStyle('table2', $table2);
        
       

        // $section->addImage("http://itsolutionstuff.com/frontTheme/images/logo.png");
        $myTextElement = $section->addText($title);
        $myTextElement->setFontStyle($fontStyle, array('align'=>'center', 'bold' => true,'underline' => 'double'));


        $myTextElement2 = $section->addText($no_surat, null, array('align'=>'center'));
        $section->addText();
        $myTextElement2 ->setFontStyle($fontStyle2, array('align'=>'center'));

        $section->addText($description);
        

        $table = $section->addTable('table');
        $table->addRow();
        $table->addCell()->addText(htmlspecialchars("No"));
        $table->addCell()->addText(htmlspecialchars("Nama"));
        $table->addCell()->addText(htmlspecialchars("Nip"));
        $table->addCell()->addText(htmlspecialchars("Pangkat/Gol."));
        $table->addCell()->addText(htmlspecialchars("Jabatan"));



        $table->addRow();
        $table->addCell()->addText(htmlspecialchars("1"));
        $table->addCell()->addText(htmlspecialchars($user->name));
        $table->addCell()->addText(htmlspecialchars($profil->nip));
        $table->addCell()->addText(htmlspecialchars($profil->pangkat));
        $table->addCell()->addText(htmlspecialchars($profil->jabatan));

        foreach($trans as $index=>$item){
            $table->addRow();
            $table->addCell()->addText(htmlspecialchars($index+2));
            $table->addCell()->addText(htmlspecialchars($item->user->name));
            $table->addCell()->addText(htmlspecialchars($item->nip));
            $table->addCell()->addText(htmlspecialchars($item->pangkat));
            $table->addCell()->addText(htmlspecialchars($item->jabatan));
        }

        $section->addText();

        $table2 = $section->addTable('table2');
        $table2->addRow();
        $table2->addCell()->addText(htmlspecialchars("Tugas Diberikan"));
        $table2->addCell()->addText(htmlspecialchars(":".$lembur->tugas));
        $table2->addRow();
        $table2->addCell()->addText(htmlspecialchars("Waktu"));
        $table2->addCell()->addText(htmlspecialchars(":".$lembur->tgl_lembur));
        $table2->addRow();
        $table2->addCell()->addText(htmlspecialchars("Biaya"));
        $table2->addCell()->addText(htmlspecialchars(":DIPA Balai Besar POM di Makassar T.A 2023"));
        $table2->addRow();
        $table2->addCell()->addText(htmlspecialchars("MAK"));
        $table2->addCell()->addText(htmlspecialchars(":6384.EBA.994.001.A.5122111"));

        $section->addText($end);
        $section->addText();

        $section->addText($tgl);
        $section->addText();
        $section->addText($an);
        $section->addText($ttd);
        $section->addText($nama);
        $section->addText($nip);
        
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        // PHPWord_Settings::setZipClass(PHPWord_Settings::PCLZIP);
        try {
            $objWriter->save(storage_path('SPML Lembur.docx'));
        } catch (\Exception $e) {
        }


        return response()->download(storage_path('SPML Lembur.docx'));
    }
    public function lemburDown(){
        return view('smile.form_download');
    }
    public function lemburDownProses(Request $request){
        $select = $request -> tahun.'-'.$request -> bulan;

        $data = Translembur :: join('lembur', 'trans_lembur.lembur_id', '=', 'lembur.id' )
                                -> where('trans_lembur.tgl_lembur', 'like', '%' . $select . '%')
                                -> where('lembur.status','=',9)
                                ->select('lembur.no_surat','trans_lembur.user_id','trans_lembur.tgl_lembur','trans_lembur.jam_mulai','trans_lembur.jam_selesai')
                                ->get();


        $profile = Profile :: get();
        $pdf = FacadePdf::loadView('smile.laporan',['smile'=>$data,'profile'=>$profile, 'bulan'=>$select]);
        return $pdf->setOptions([
                                 'defaultFont' => 'serif',
                                 'enable_remote' => true,
                                 'chroot'  => public_path(),
                                 ])->setPaper('f4', 'landscape')->stream();

        // return view('smile.laporan',['smile'=>$data,'profile'=>$profile, 'bulan'=>$select]);
    }
    public function lemburDownDetail($id){
        $data = Smile :: where('id', '=', $id)->first();
        $trans = Translembur :: where('lembur_id', '=', $id)->get();
        $profile = Profile :: get();

        $pdf = FacadePdf::loadView('smile.laporan_detail',['smile'=>$data,'profile'=>$profile, 'trans'=>$trans]);
        return $pdf->setOptions([
                                'defaultFont' => 'serif',
                                'enable_remote' => true,
                                'chroot'  => public_path(),
                                ])->setPaper('f4', 'landscape')->stream();

        // return view('smile.laporan_detail',['smile'=>$data,'profile'=>$profile, 'trans'=>$trans]);
    }
    public function aboutSmile(){
        return view('smile.about');
    }
    public function lemburSelesai(){
        $lembur = Smile :: where('status','=',9)->latest()->get();
        return view('smile.smile_incomev',['lembur'=> $lembur,'status'=>'Selesai']);
    }
    public function edit_absen($id){
        $data = Translembur::where('id',$id)->first();
        return view('smile.form_absen_e',['data'=>$data]);
    }
    public function editStoreAbsen(Request $request, $id, $lembur_id, $user_id){
        $request -> validate([
            'absen' => ['mimes:pdf,xlsx,xls'],
            'tgl_lembur' => ['required'],
            
        ]);
        $path = public_path().'/storage/smile/';
        try{
            $lembur         = Translembur::findOrFail($id);
            $lembur->tgl_lembur     = Carbon::createFromFormat('d/m/Y',$request->tgl_lembur)->format('Y-m-d');
            $lembur->jam_mulai      = $request->jam1.':'.$request->menit1.':'.$request->detik1;
            $lembur->jam_selesai    = $request->jam2.':'.$request->menit2.':'.$request->detik2;

            if($request->absen){
                
                $file = Translembur :: where('id',$id)->first('file1');
                if($file && file_exists(public_path().$file->file1)){
                    unlink(public_path().$file->file1);
                }

                //upload new file
                $file = $request->absen;
                $filename1 = "/storage/smile/".time().$file->getClientOriginalName();
                $file->move($path, $filename1);
                $lembur->file1 = $filename1;
            }

            $status = $lembur->save();

            if($status){
                return $this->detailAbsen($lembur_id,$user_id);
            }
        }catch(\Exception $e){
            $lembur = Smile :: where('status','=',3)->orWhere('status','=',4)->get();
            session () ->flash('unsuccess',$e->getMessage());
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Terbit SPML']);
        }
    }
    public function deleteAbsen($id, $lembur_id, $user_id){
        try{
        $delete = Translembur :: where('id',$id)->first();
        $status = $delete -> delete();
        if($status){
            return $this->detailAbsen($lembur_id,$user_id);
        }
        }catch(\Exception $e){
            $lembur = Smile :: where('status','=',3)->orWhere('status','=',4)->get();
            session () ->flash('unsuccess',$e->getMessage());
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Terbit SPML']);
        }
    }
    public function lemburRevisi($id){
        return view('smile.form_revisi',['id'=>$id]);
    }
    public function alasanRevisi(Request $request, $id){
        $request -> validate([
            'ket' => ['required'],
            
        ]);
        try{
            $lembur = Smile::findOrFail($id);
            if(Auth::user()->is_permission == 12 || Auth::user()->is_permission == 1){
                $lembur->status = 10;
            }else{
                $lembur->status = 8;
            }
            $lembur->alasan_kembali = $request->ket;
            $lembur->save();

            if(Auth::user()->is_permission == 12 || Auth::user()->is_permission == 1){
               // Pesan ke Kepegawaian  kak zul
              $no_telp2 = '081355481823';
              $pesan2 = '*Yth. Bapak/Ibu*🙏, Sebuah permintaan lembur telah dikembalikan oleh pihak KTU dengan alasan *'.$request->ket.'*, silakan login ke aplikasi BALLA POKJA atau login melalui link  https://bbpom-makassar.com/data-lembur-dikembalikan untuk melakukan revisi laporan';
              sendMessage($pesan2,$no_telp2);
            }else{
              // Pesan ke Kepegawaian  kak zul
              $no_telp2 = '081355481823';
              $pesan2 = '*Yth. Bapak/Ibu*🙏, Sebuah permintaan lembur telah dikembalikan oleh pihak KEUANGAN dengan alasan *'.$request->ket.'*, silakan login ke aplikasi BALLA POKJA atau login melalui link  https://bbpom-makassar.com/data-lembur-dikembalikan untuk melakukan revisi laporan';
              sendMessage($pesan2,$no_telp2);
            }

            $lembur = Smile :: where('status','=',7)->get();
            return view('smile.smile_incomev',['lembur'=> $lembur,'status'=>'Terkonfirmasi']);
            
        }catch(\Exception $e){
            session () ->flash('unsuccess',$e->getMessage());
            return view('smile.smile_incomev',['lembur'=> $lembur]);
        }
    }
    public function lemburKembali(){
        $lembur = Smile :: where('status','=',8)->Orwhere('status','=',10)->get();
        return view('smile.smile_incomev',['lembur'=> $lembur,'status'=>'Dikembalikan']);
    }
    public function smileKonfirRevisi($id){
        try{
            $lembur2 = Smile::findOrFail($id);
            $lembur2->status = 7;
            $lembur2->alasan_kembali = null;
            $lembur2->save();

            // Pesan ke Keuangan Rasyka
            $no_telp2 = '082291811381';
            $pesan2 = '*Yth. Bapak/Ibu*🙏, Laporan lembur baru yang telah ✅Direvisi oleh pihak KEPEGAWAIAN masuk ke akun anda untuk dikonfirmasi ulang, silakan login ke aplikasi BALLA POKJA atau login melalui link  https://bbpom-makassar.com/lembur-konfirmed';
            sendMessage($pesan2,$no_telp2);

            $lembur = Smile :: where('status','=',8)->OrWhere('status','=',10)->get();
            session () ->flash('success','Revisi absen telah dikirim');
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Dikembalikan']);
        }catch(\Exception $e){
            $lembur = Smile :: where('status','=',8)->OrWhere('status','=',10)->get();
            session () ->flash('unsuccess',$e->getMessage());
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Dikembalikan']);
        }
    }
    public function smileKonfirRevisiKtu($id){
        try{
            $lembur2 = Smile::findOrFail($id);
            $lembur2->status = 6;
            $lembur2->alasan_kembali = null;
            $lembur2->save();

            // Pesan ke KTU Amira
            $no_telp2 = '081355957120';
            $pesan2 = '*Yth. Bapak/Ibu*🙏, Laporan lembur yang telah ✅Direvisi oleh pihak KEPEGAWAIAN masuk ke akun anda untuk dikonfirmasi ulang, silakan login ke aplikasi BALLA POKJA atau login melalui link  https://bbpom-makassar.com/data-lembur-menunggu-konfirmasi';
            sendMessage($pesan2,$no_telp2);

            $lembur = Smile :: where('status','=',8)->OrWhere('status','=',10)->get();
            session () ->flash('success','Revisi absen telah dikirim');
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Dikembalikan']);
        }catch(\Exception $e){
            $lembur = Smile :: where('status','=',8)->OrWhere('status','=',10)->get();
            session () ->flash('unsuccess',$e->getMessage());
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Dikembalikan']);
        }
    }
    public function smileApproved($id){
        try{
            $lembur2 = Smile::findOrFail($id);
            $lembur2->status = 9;
            $lembur2->save();

            $lembur = Smile :: where('id','=',$id)->first();
            $tugas = $lembur->tgl_lembur;
             // Pesan User Smile
             $get_id        = Smile :: where('id','=',$id)->first();
             $username = User::where('id','=',$get_id->user_id)->first();
             $no_telp1 = Profile :: where('username','=',$username->username)->first();
             $pesan1 = '*Yth. Bapak/Ibu*🙏, Permintaan lembur anda pada tanggal:'.$tugas.' Telah ✅Diproses oleh pihak KEUANGAN';
             sendMessage($pesan1,$no_telp1->telpon);

            $lembur = Smile :: where('status','=',7)->get();
            session () ->flash('success','Notifikasi telah terkirim kepegawai bersangkutan');
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Terkonfirmasi']);
        }catch(\Exception $e){
            $lembur = Smile :: where('status','=', 7)->get();
            session () ->flash('unsuccess',$e->getMessage());
            return view('smile.smile_incomev',['lembur'=>$lembur,'status'=>'Terkonfirmasi']);
        }
    }
}