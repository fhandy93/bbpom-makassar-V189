<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfopomVisitor extends Model
{
    use HasFactory;
    protected $table = 'infopom_visitor_counter';
    protected $fillable = [
        'ip_addres',
        'agent'
    ];
}
