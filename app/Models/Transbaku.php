<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transbaku extends Model
{
    use HasFactory;
    protected $table = 'trans_baku';
    use Loggable;
    protected $fillable = [
        'baku_id',
        'jenis',
        'stok'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function bak()
    {
        return $this->belongsTo(Baku::class,'baku_id');
    }
}
