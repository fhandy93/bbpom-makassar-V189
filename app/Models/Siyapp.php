<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siyapp extends Model
{
    use HasFactory;
    protected $table = 'siyapp';
    use Loggable;
    protected $fillable = [
        'user_id',
        'nama_barang',
        'tanggal' ,
        'merek',
        'type',
        'nup',
        'tahun',
        'bidang',
        'pemeliharaan',
        'j_barang',
        'sifat',
        'jenis',
        'tindak_awal',
        'tindak_lanjut',
        'uji',
        'tanggal_selesai',
        'ket',
        'image',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
