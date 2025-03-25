<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bmncar extends Model
{
    use HasFactory;
    protected $table = 'bmn_car';
    use Loggable;
    protected $fillable = [
        'nopol',
        'merek',
        'type',
        'foto',
        'status'
    ];
    public function trans()
    {
        return $this->hasMany(TransBMNcar::class,'car_id');
    }
   
}