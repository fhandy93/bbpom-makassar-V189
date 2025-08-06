<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siikmabid extends Model
{
    use HasFactory;
    protected $table = 'siikma_bidang';
    use Loggable;
    protected $fillable = [
        'user_id',
        'bidang',
        'wa',
    ];
}
