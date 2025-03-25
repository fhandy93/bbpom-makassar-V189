<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rujukan extends Model
{
    use HasFactory;
    protected $table = 'rujukan';
    use Loggable;
    protected $fillable = [
        'nama',
        'ttl',
        'umur',
        'tgl_terima',
        'kelamin',
        'agama',
        'pekerjaan',
        'alamat',
        'hp',
        'fax',
        'email',
        'pengaduan',
        'produk',
        'regis',
        'batch',
        'pabrik',
        'alm_pab',
        'nama_kor',
        'alm_kor',
        'kelamin_kor',
        'desc',
        'hal',
        'ket',
        'tujuan',
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

