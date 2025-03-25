<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transsuku extends Model
{
    use HasFactory;
    protected $table = 'trans_suku';
    use Loggable;
    protected $fillable = [
        'suku_id',
        'jenis',
        'stok'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function suk()
    {
        return $this->belongsTo(Suku::class,'suku_id');
    }
}
