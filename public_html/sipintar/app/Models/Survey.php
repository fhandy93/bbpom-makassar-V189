<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'tb_survey';
    protected $fillable = [
        'layanan_id',
        'petugas_id',
        'skala_survey'
    ];

    public function lay()
    {
        return $this->belongsTo(Layanan::class,'nama');
    }
    public function pet()
    {
        return $this->belongsTo(Petugas::class,'nama');
    }
}
