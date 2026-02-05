<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sikama extends Model
{
    use HasFactory;
    protected $table = 'sikama';
    use Loggable;
    protected $fillable = [
     'user_id',
        'bidang',
        'tgl_izin',
        'jam1',
        'jam2',
        'keperluan',
        'status',
        'wktu_kembali',
        'lat',
        'lon',
        'notif',
        'jumlah',
        'ket'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
