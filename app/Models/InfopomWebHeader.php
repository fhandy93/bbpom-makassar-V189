<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfopomWebHeader extends Model
{
    use HasFactory;
    protected $table = 'infopom_web_header';
    use Loggable;
    protected $fillable = [
        'header',
        'title',
    ];
}
