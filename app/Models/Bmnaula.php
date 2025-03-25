<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bmnaula extends Model
{
    use HasFactory;
    protected $table = 'bmn_aula';
    use Loggable;
    protected $fillable = [
        'nm_aula',
        'pj_aula',
        'ukuran',
        'kapasitas',
        'petugas',
        'wa_petugas'
    ];
}
