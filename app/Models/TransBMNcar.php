<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransBMNcar extends Model
{
    use HasFactory;
    protected $table = 'trans_bmn_car';
    use Loggable;
    protected $fillable = [
        'user_id',
        'user_input',
        'car_id',
        'driver_id',
        'wkt_pinjam'
    ];
    public function driver()
    {
        return $this->belongsTo(Bmndriver::class,'driver_id');
    }
    public function car()
    {
        return $this->belongsTo(Bmncar::class,'car_id');
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