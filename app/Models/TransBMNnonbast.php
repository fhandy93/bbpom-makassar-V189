<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class TransBMNnonbast extends Model
{
    use HasFactory;
    protected $table = 'trans_bmn_non_bast';
    use Loggable;
    protected $fillable = [
       
        'barang_id',
        'nonbast_id'

    ];
   
    public function barang()
    {
        return $this->belongsTo(Bmnbarang::class,'barang_id');
    }
    public function non()
    {
        return $this->belongsTo(Bmnnonbast::class,'nonbast_id');
    }
}
