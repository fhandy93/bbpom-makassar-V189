<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berakhlak extends Model
{
    use HasFactory;
    protected $table = 'berakhlak';
    use Loggable;
    protected $fillable = [
        'menu',
        'judul'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
