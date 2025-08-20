<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfopomInfoWeb extends Model
{
    use HasFactory;
    protected $table = 'infopom_info_web';
    use Loggable;
    protected $fillable = [
        'title',
        'desc',
        'url',
    ];
    

}
