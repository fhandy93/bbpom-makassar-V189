<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SITujuAlat extends Model
{
    use HasFactory;
    protected $table = 'sipatuju_alat_lab';
    use Loggable;
    protected $fillable = [
        'merek',
        'tipe_seri',
        'detektor'
    ];
}
