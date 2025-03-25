<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitorcounter extends Model
{
    use HasFactory;
    protected $table = 'visitor_counter';
    protected $fillable = [
        'ip_addres',
        'agent'
    ];
}
