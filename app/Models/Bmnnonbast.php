<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Bmnnonbast extends Model
{
    use HasFactory;
    protected $table = 'bmn_non_bast';
    use Loggable;
    protected $fillable = [
        'user_id',
        'user_input',
        'tujuan',
        'status',
        'wkt_pinjam'
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function input()
    {
        return $this->belongsTo(User::class,'user_input');
    }
}
