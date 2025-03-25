<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    use Loggable;
    protected $fillable = [
        'username',
        'facebook',
        'twitter' ,
        'youtube',
        'instagram',
        'alamat',
        'domisili',
        'telpon',
        'foto'
    ];

}
