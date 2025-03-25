<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serambi extends Model
{
    use HasFactory;
    protected $table = 'serambi';
    use Loggable;
    protected $fillable = [
        'caption',
        'image',
        'jenis' ,
        'tgl_kirim',
        'status',
    ];
}
