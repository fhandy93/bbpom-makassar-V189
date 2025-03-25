<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adaja extends Model
{
    use HasFactory;
    protected $table = 'adaja';
    use Loggable;
    protected $fillable = [
        'lat',
        'lon',
        'foto',
        'jenis',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
