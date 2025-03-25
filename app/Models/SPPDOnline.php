<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPPDOnline extends Model
{
    use HasFactory;
    protected $table = 'tb_sppd_online';
    use Loggable;
    protected $fillable = [
       
        'user_id',
        'user_data',
        'level_biaya',
        'maksud',
        'transport',
        'asal',
        'tujuan',
        'asal2',
        'tujuan2',
        'asal3',
        'tujuan3',
        'asal4',
        'tujuan4',
        'tgl_berangkat',
        'tgl_kembali',
        'tgl_berangkat2',
        'tgl_kembali2',
        'tgl_berangkat3',
        'tgl_kembali3',
        'tgl_berangkat4',
        'tgl_kembali4',
        'tgl_st',
        'akun',
        'status',
        'instansi',
        'keterangan',
        'tgl',
        'ppk',
        'mengetahui'


    ];
    protected $dates = [
                        'tgl_berangkat',
                        'tgl_kembali',
                        'tgl_berangkat2',
                        'tgl_kembali2',
                        'tgl_berangkat3',
                        'tgl_kembali3',
                        'tgl_berangkat4',
                        'tgl_kembali4',
                        'tgl_st',
                        'tgl'    
                    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function userdata()
    {
        return $this->belongsTo(User::class,'user_data');
    }
}
