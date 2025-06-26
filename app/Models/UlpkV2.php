<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlpkV2 extends Model
{
    use HasFactory;
    protected $table = 'ulpk_v2';
    use Loggable;
    protected $fillable = [
        'nama',
        'umur',
        'kelamin',
        'alamat',
        'hp',
        'email',
        'perusahaan',
        'pekerjaan',
        'jenis',
        'layanan',
        'jawaban',
        'komoditi',
        'petugas1_id',
        'petugas2_id',
        'sarana',
        'rujuk',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'petugas1_id');
    }
    public function petugas()
    {
        return $this->belongsTo(User::class,'petugas2_id');
    }
}
