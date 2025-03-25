<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smile extends Model
{
    use HasFactory;
    protected $table = 'lembur';
    use Loggable;
    protected $fillable = [
        'user_id',
        'pangkat',
        'tugas',
        'tgl_lembur',
        'no_surat',
        'file',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
