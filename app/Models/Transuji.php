<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transuji extends Model
{
    use HasFactory;
    protected $table = 'trans_uji';
    protected $fillable = [
        'sub_id',
        'parameter_id',
    ];
   
}
