<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransBMN extends Model
{
    use HasFactory;
    protected $table = 'trans_bmn_bst';
    use Loggable;
    protected $fillable = [
        'bst_id',
        'barang_id',
        'jumlah',
        'lokasi'
    ];
    public function barang()
    {
        return $this->belongsTo(Bmnbarang::class,'barang_id');
    }
    public function ruang()
    {
        return $this->belongsTo(Bmnruangan::class,'lokasi');
    }
}
