<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransBMNaula extends Model
{
    use HasFactory;
    protected $table = 'trans_bmn_aula';
    use Loggable;
    protected $fillable = [
        'user_id',
        'user_input',
        'aula_id',
        'bentuk',
        'jumlah',
        'catatan',
        'status',
        'wkt_pinjam'
    ];
   
    public function aula()
    {
        return $this->belongsTo(Bmnaula::class,'aula_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function input()
    {
        return $this->belongsTo(User::class,'user_input');
    }
}
