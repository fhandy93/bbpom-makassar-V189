<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    use HasFactory;
    protected $table = 'aplikasi';
    use Loggable;
    protected $fillable = [
        'name',
        'type',
        'desc',
        'link',
        'image'
    ];
    
}
