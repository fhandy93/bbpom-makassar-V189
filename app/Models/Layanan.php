<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'tb_layanan';
    protected $fillable = [
        'no_antrian',
        'jns_layanan',
        'nama',
        'umur',
        'kelamin',
        'hp',
        'email',
        'pekerjaan',
        'status',
        'jns_sertifikasi',
    ];
    public function layanan()
    {
        return $this->belongsTo(Survey::class,'layanan_id');
    }
}
