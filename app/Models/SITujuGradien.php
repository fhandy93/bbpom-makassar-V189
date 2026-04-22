<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SITujuGradien extends Model
{
     use HasFactory;
    protected $table = 'sipatuju_gradien';
    use Loggable;
    protected $fillable = [
        'pustaka_id',
        'waktu',
        'a',
        'b',
        'c'
    ];
    public function pustaka()
    {
        return $this->belongsTo(SITujuPustaka::class,'pustaka_id');
    }
}

      