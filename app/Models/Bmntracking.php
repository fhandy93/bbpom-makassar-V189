<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bmntracking extends Model
{
    use HasFactory;
    protected $table = 'bmn_tracking';
    use Loggable;
    protected $fillable = [
        'user_id',
        'barang_id',
        'lokasi',
        'kondisi',
        'update_by'
    ];
    public function ruang()
    {
        return $this->belongsTo(Bmnruangan::class,'lokasi', 'id');
    }
    public function barang()
    {
        return $this->belongsTo(Bmnbarang::class,'barang_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
