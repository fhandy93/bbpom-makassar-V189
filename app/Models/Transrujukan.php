<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transrujukan extends Model
{
    use HasFactory;
    protected $table = 'trans_rujukan';
    use Loggable;
    protected $fillable = [
       
        'desc',
        'tgl_kembali',
        'bidang',
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

