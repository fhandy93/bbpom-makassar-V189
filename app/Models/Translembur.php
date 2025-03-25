<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translembur extends Model
{
    use HasFactory;
    protected $table = 'trans_lembur';
    use Loggable;
    protected $fillable = [
        'lembur_id',
        'user_id',
        'tgl_lembur',
        'jam_mulai',
        'jam_selesai',
        'ket',
        'file1',
        'file2'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
