<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transmikrobiologi extends Model
{
    use HasFactory;
    protected $table = 'trans_mikrobiologi';
    use Loggable;
    protected $fillable = [
        'mikrobiologi_id',
        'jenis',
        'stok'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function mikro()
    {
        return $this->belongsTo(Mikrobiologi::class,'mikrobiologi_id');
    }
}
