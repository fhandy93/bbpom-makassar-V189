<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Siyapp;
use App\Models\Sikama;
use App\Models\Serambi;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Profile;
use App\Models\Siikmaizin;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Auth;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function(){
            // $pesan = 'jam 09.45';
            // $arman = '6282292157117';
            // sendMessage($pesan,$arman);
            
            function callPerson($pesan){
                // pesan untuk Arman Afandi
                $arman = '6282292157117';
                sendMessage($pesan,$arman);
            };
            $data1 = Siyapp::where('status',0)->get()->count();
            $data2 = Siyapp::where('status',1)->get()->count();
            
            if( $data1 != 0 || $data2 != 0 ){
                if($data1 != 0 && $data2 == 0){
                    // echo 'Ada Belum terkonfir';
                    
                    $pesan = 'Yth. Bapak/Ibu 🙏, Terdapat *'.$data1.'* Laporan SIYAPP yang *BELUM TERKONFIRMASI*, Harap Bapak/Ibu segera memproses semua Laporan yang masuk';
                    
                    // pesan untuk pak Agus
                    $agus = '6285299665356';
                    sendMessage($pesan,$agus);
                    
                     // pesan untuk Miska
                    $miska = '6285333314410';
                    sendMessage($pesan,$miska);
                    
                     // Pesan Untuk yayu
                    $yayu = '62811406364';
                    sendMessage($pesan,$yayu);
                    
                    // Pesan Untuk Mury
                    $mury = '6281241465487';
                    sendMessage($pesan,$mury);
                    
                    // Pesan Untuk Wiwi
                    $wiwi = '6285280134882';
                    sendMessage($pesan,$wiwi);
                    
                    // Pesan Untuk Nenenk
                    $nenenk = '6281234675172';
                    sendMessage($pesan,$nenenk);
                    
                    callPerson($pesan);
                    
                }else if($data1 == 0 && $data2 != 0){
                    // 'Ada Belum selesai';
                    
                    $pesan = 'Yth. Bapak/Ibu 🙏, Terdapat *'.$data2.'* Laporan SIYAPP yang *BELUM SELESAI* diproses, Harap Bapak/Ibu segera memproses semua Laporan yang masuk';
                    
                    // pesan untuk pak Agus
                    $agus = '6285299665356';
                    sendMessage($pesan,$agus);
                    
                    // pesan untuk Miska
                    $miska = '6285333314410';
                    sendMessage($pesan,$miska);
                    
                    // Pesan Untuk yayu
                    $yayu = '62811406364';
                    sendMessage($pesan,$yayu);
                    
                    // Pesan Untuk Mury
                    $mury = '6281241465487';
                    sendMessage($pesan,$mury);
                    
                    // Pesan Untuk Wiwi
                    $wiwi = '6285280134882';
                    sendMessage($pesan,$wiwi);
                    
                    // Pesan Untuk Nenenk
                    $nenenk = '6281234675172';
                    sendMessage($pesan,$nenenk);
                    
                    callPerson($pesan);
                    
                }else if($data1 != 0 && $data2 != 0){
                   
                   $pesan = 'Yth. Bapak/Ibu 🙏, Terdapat *'.$data1.'* Laporan SIYAPP yang *BELUM TERKONFIRMASI* dan *'.$data2.'* yang *BELUM SELESAI* diproses, Harap Bapak/Ibu segera memproses semua Laporan yang masuk';
                    
                    // pesan untuk pak Agus
                    $agus = '6285299665356';
                    sendMessage($pesan,$agus);
                    
                    // pesan untuk Miska
                    $miska = '6285333314410';
                    sendMessage($pesan,$miska);
                    
                    // Pesan Untuk yayu
                    $yayu = '62811406364';
                    sendMessage($pesan,$yayu);
                    
                       // Pesan Untuk Mury
                    $mury = '6281241465487';
                    sendMessage($pesan,$mury);
                    
                    // Pesan Untuk Wiwi
                    $wiwi = '6285280134882';
                    sendMessage($pesan,$wiwi);
                    
                    // Pesan Untuk Nenenk
                    $nenenk = '6281234675172';
                    sendMessage($pesan,$nenenk);
                    
                    callPerson($pesan);
                }
            }
        })->dailyAt('9:30')->timezone('Asia/Makassar');
        
        
        
        
        
        
        $schedule->call(function(){
            $date = Carbon::now();
            $day = $date->format('l');
                
            if($day == 'Monday'){

                
                $data = Serambi :: where('jenis','=','1')->where('status','=','0')->first();
                $image = 'https://bbpom-makassar.com'.$data->image;
                
                try{
                    $phone = Profile::get(['id','telpon']);
                    foreach($phone as $item){
                          sendImage($item->telpon,$image,$data->caption);
                    }
                }catch(\Exception $e){
                     $arman = '6281363177720';
                    sendMessage($e,$arman);
                }
                
                $data = Serambi :: findorFail($data->id);
                $data->status  = 1;
                $status = $data->save();
              
                
            }
            
            if($day == 'Thursday'){
                    
                $data = Serambi :: where('jenis','=','2')->where('status','=','0')->first();
                $image = 'https://bbpom-makassar.com'.$data->image;
                
                try{
                    $phone = Profile::get(['id','telpon']);
                    foreach($phone as $item){
                          sendImage($item->telpon,$image,$data->caption);
                    }
                }catch(\Exception $e){
                     $arman = '6281363177720';
                    sendMessage($e,$arman);
                }
            
                $data = Serambi :: findorFail($data->id);
                $data->status  = 1;
                $data->save();
            }
        })->dailyAt('10:00')->timezone('Asia/Makassar');
        
        
        
        $schedule->call(function () {









            // Change
            $notconfirm = Sikama :: where('bidang', '!=', 12)->where('status', 1)->where('created_at', '<=', now()->subMinutes(6))->get();
            foreach($notconfirm as $data){
                $izin  = Sikama::findOrFail($data->id);
                if ($izin->bidang == 12) continue; // double check
                $izin -> bidang = 12;
                $izin ->save();
                $pesan = "*Yth. Bapak/Ibu* 🙏, Terdapat izin melalui aplikasi *SIIKMA*  Namun *TIDAK DIKONFIRMASI* lebih dari 5 Menit oleh Ketua TIM nya, Silakan Login ke aplikasi BALLA POKJA atau dengan mengklik link https://bbpom-makassar.com/rekapizin untuk Menkonfirmasi izin";
                //Kepala TU BBPOM 
                $ktu = '081242033987';
                sendMessage($pesan,$ktu);

                $user  = User::where('id',$data->user_id)->first();
                $phone = Profile::where('username',$user->username)->first();
                $pesan = "*Yth. Bapak/Ibu*🙏 Waktu konfirmasi izin terakhir anda telah lewat dari 5 Menit,  izin anda akan otomatis menjadi izin khusus yang ditujukan kepada *Kepala Bagian Tata Usaha* pada *Balai Besar POM di Makassar*";
                // pesan untuk user
                sendMessage($pesan,$phone->telpon);
            }

            $notconfirmktu = Sikama :: where('bidang', '=', 12)->where('status', 1)->where('created_at', '<=', now()->subMinutes(6))->get();
            foreach($notconfirmktu as $data){
                $izin  = Sikama::findOrFail($data->id);
                $izin -> status = 2;
                $izin -> pemberi = "Approve By System";
                $izin -> ket = "-";
                $izin ->save();

                $user  = User::where('id',$data->user_id)->first();
                $phone = Profile::where('username',$user->username)->first();
                $pesan = "*Yth. Bapak/Ibu*🙏 izin anda telah ter *Approve* ✅ *by system*";
                
                // pesan untuk user
                sendMessage($pesan,$phone->telpon);

                $pesansat = "*Yth. Bapak/Ibu*🙏 Izin telah diberikan oleh atasan kepada *".$user->name."* untuk keluar dari Wilayah kantor BBPOM Makassar";
          
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
            }
            
            
             // Closed Change




            
            $now = now('Asia/Makassar');

            $dataIzin = Sikama::whereDate('tgl_izin', $now->toDateString())
            ->whereNull('wktu_kembali')
            ->where('status', 1)
            ->where('notif', 0)
            ->get();

            foreach ($dataIzin as $izin) {
           
                    // Format jam2 sekarang adalah 'H:i:s' (contoh: '13:45:00')
                    $jamAkhirCarbon = \Carbon\Carbon::createFromFormat(
                        'Y-m-d H:i:s',
                        $izin->tgl_izin . ' ' . $izin->jam2,
                        'Asia/Makassar'
                    );

                    if ($now->greaterThan($jamAkhirCarbon)) {
                        $user  = User::find($izin->user_id);
                        $phone = Profile::where('username', $user->username)->first();

                        $pesan = "*Yth Bapak/Ibu*,\nWaktu izin anda telah berakhir. Harap segera menyelesaikan izin anda di wilayah kantor *BBPOM Di Makassar* melalui link:\nhttps://bbpom-makassar.com/siikma/detail-izin/{$izin->id}";

                        sendMessage($pesan, $phone->telpon);

                        $izin->notif = 1;
                        $izin->save();
                    }
            
            }       
        })->cron('* * * * *')->timezone('Asia/Makassar');
        
        
        
        $schedule->call(function(){
            $now = now('Asia/Makassar');

            $dataIzin = Siikmaizin::whereDate('tgl_izin', $now->toDateString())
            ->whereNull('wktu_kembali')
            ->where('status', 1)
            ->get();
        
            foreach ($dataIzin as $izin) {
           
                    $user  = User::where('id',$izin->user_id)->first();
                    $phone = Profile::where('username',$user->username)->first();
                    $pesan = "*Yth Bapak/Ibu* Waktu izin anda telah berakhir, Harap segera menyelesaikan izin anda di wilayah kantor *BBPOM Di Makassar* melalu link https://bbpom-makassar.com/detail-izin-sikama/".$izin ->id;
                    // pesan untuk user
                    sendMessage($pesan,$phone->telpon);
            }
        })->cron('0 16 * * 1-4')->timezone('Asia/Makassar');
        
      // Senin - Kamis jam 16:00
        $schedule->call(function () {
            $dt = Carbon::now('Asia/Makassar');
            $data = Siikmaizin::where('status', 2)->get();

            foreach ($data as $item) {
                $jamAwal = Carbon::parse($item->jam1);
                $jamAkhir = $dt;

                // Lewati jika jamAwal lebih dari jam sekarang
                if ($jamAkhir->lt($jamAwal)) {
                    continue;
                }

                $startBreak = Carbon::parse($jamAwal->toDateString() . ' 12:00:00');
                $endBreak   = Carbon::parse($jamAwal->toDateString() . ' 13:00:00');

                $totalMinutes = $jamAwal->diffInMinutes($jamAkhir);

                // Koreksi waktu istirahat
                if ($jamAwal->lt($startBreak) && $jamAkhir->gt($endBreak)) {
                    $totalMinutes -= 60;
                } elseif ($jamAwal->between($startBreak, $endBreak) && $jamAkhir->gt($endBreak)) {
                    $totalMinutes -= $jamAwal->diffInMinutes($endBreak);
                } elseif ($jamAwal->lt($startBreak) && $jamAkhir->between($startBreak, $endBreak)) {
                    $totalMinutes -= $startBreak->diffInMinutes($jamAkhir);
                } elseif ($jamAwal->between($startBreak, $endBreak) && $jamAkhir->between($startBreak, $endBreak)) {
                    $totalMinutes = 0;
                }

                // Pastikan tidak negatif
                $interval = CarbonInterval::minutes(max(0, $totalMinutes))->cascade();
                $jumlahTime = $interval->format('%H:%I:%S');

                $item->status = 5;
                $item->wktu_kembali = $jamAkhir;
                $item->lat = '-';
                $item->lon = '-'; 
                $item->jumlah = $jumlahTime;
                $item->save();
            }
        })->cron('0 16 * * 1-4')->timezone('Asia/Makassar');

       // Jumat jam 16:00
        $schedule->call(function () {
            $dt = Carbon::now('Asia/Makassar');
            $data = Siikmaizin::where('status', 2)->get();
        
            foreach ($data as $item) {
                $jamAwal = Carbon::parse($item->jam1);
                $jamAkhir = $dt;
        
                if ($jamAkhir->lt($jamAwal)) {
                    continue;
                }
        
                $startBreak = Carbon::parse($jamAwal->toDateString() . ' 12:00:00');
                $endBreak   = Carbon::parse($jamAwal->toDateString() . ' 13:00:00');
        
                $totalMinutes = $jamAwal->diffInMinutes($jamAkhir);
        
                // Koreksi waktu istirahat
                if ($jamAwal->lt($startBreak) && $jamAkhir->gt($endBreak)) {
                    $totalMinutes -= 60;
                } elseif ($jamAwal->between($startBreak, $endBreak) && $jamAkhir->gt($endBreak)) {
                    $totalMinutes -= $jamAwal->diffInMinutes($endBreak);
                } elseif ($jamAwal->lt($startBreak) && $jamAkhir->between($startBreak, $endBreak)) {
                    $totalMinutes -= $startBreak->diffInMinutes($jamAkhir);
                } elseif ($jamAwal->between($startBreak, $endBreak) && $jamAkhir->between($startBreak, $endBreak)) {
                    $totalMinutes = 0;
                }
        
                $interval = CarbonInterval::minutes(max(0, $totalMinutes))->cascade();
                $jumlahTime = $interval->format('%H:%I:%S');
        
                $item->status = 5;
                $item->wktu_kembali = $jamAkhir;
                $item->lat = '-';
                $item->lon = '-';
                $item->jumlah = $jumlahTime;
                try {
                    $item->save();
                } catch (\Exception $e) {
                    \Log::error("Gagal simpan data ID " . $item->id . ": " . $e->getMessage());
                }
            }
        })->cron('30 16 * * 5')->timezone('Asia/Makassar');

    
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
