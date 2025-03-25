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
        'jam',
        'keperluan',
        'pemberi'
     
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
