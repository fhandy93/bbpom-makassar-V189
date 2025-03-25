<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulpk extends Model
{
    use HasFactory;
    protected $table = 'ulpk';
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
        'user_id',
        'petugas',
        'sarana',
        'rujuk',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


