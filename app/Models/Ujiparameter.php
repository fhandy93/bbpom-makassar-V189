<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujiparameter extends Model
{
    use HasFactory;
    protected $table = 'uji_parameter';
    protected $fillable = [
        'parameter',
        'metode',
        'biaya'
    ];
}
