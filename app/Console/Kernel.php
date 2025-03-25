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
        
        
        
        
        
        $schedule->call(function(){
     
        $exp = Sikama :: where([['created_at', '<=', Carbon::yesterday()->setTime(23, 00, 00)->toDateTimeString()],['status', '=', '1']])->get(['status','id']);
        foreach($exp as $item){
        $izin  = Sikama::findOrFail($item->id);
        $izin -> status = 4;
        $izin ->save();
        }
        
        $notconfirm = Sikama :: where('bidang', '!=', 12)->where('status','=', 1)->get(['user_id','id','created_at']);
        foreach($notconfirm as $data){
            $time = $data->created_at->addMinutes(6)->format('H:i');
            $dt = Carbon::now()->format('H:i');
            if($dt==$time){
                  $user  = User::where('id',$data->user_id)->first();
                  $phone = Profile::where('username',$user->username)->first();
                  $pesan = "*Yth. Bapak/Ibu*🙏 Waktu konfirmasi izin terakhir anda telah lewat dari 5 Menit, untuk mengubah izin anda menjadi izin khusus yang ditujukan kepada *Kepala Bagian Tata Usaha pada Balai Besar POM di Makassar*, silakan mengklik link berikut https://bbpom-makassar.com/daftarizin ";
                  // pesan untuk user
                  sendMessage($pesan,$phone->telpon);
              }
            }
        })->cron('* * * * *')->timezone('Asia/Makassar');
        
        
        
        
        
        
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
