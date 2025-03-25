<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\LoginFailed;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class FailedLoginListener
{
    public function __construct()
    {
        //
    }

    public function handle(Failed $event)
    {
        $admin = User::where('email', 'arman.afandi24@gmail.com')->first();
        
        if ($admin) {
            Notification::send($admin, new LoginFailed($event->credentials['email'], now()));
            
              $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://pati.wablas.com/api/send-message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => (['phone' => '081363177720','message' => 'Warning !!!!! Login Attempt Failed, If this was not you, please take appropriate action. Cek email !']),
            CURLOPT_HTTPHEADER => array(
                'Authorization: a4q0sqdPyCqFTpcuOxJz01p8esMPo8I9anLeiq3W4LlIdBoZygmHVDhr1P64QRix'
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        }
    }
}
