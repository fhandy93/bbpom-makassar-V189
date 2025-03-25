<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seppulotransrujukan extends Model
{
    use HasFactory;
    protected $table = 'trans_seppulo_rujukan';
    use Loggable;
    protected $fillable = [
       
        'desc',
        'tgl_kembali',
        'bidang',
        'tindak',
        'gambar1',
        'gambar2',
        'gambar3',
        'gambar4',
        'gambar5',
        'gambar6'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
