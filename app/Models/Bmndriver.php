<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bmndriver extends Model
{
    use HasFactory;
    protected $table = 'bmn_driver';
    use Loggable;
    protected $fillable = [
        'nama',
        'wa',
        'foto',
        'status',
    ];
}
