<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bmnruangan extends Model
{
    use HasFactory;
    protected $table = 'bmn_ruangan';
    use Loggable;
    protected $fillable = [
        'nm_ruangan',
        'pj',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'pj');
    }
}
