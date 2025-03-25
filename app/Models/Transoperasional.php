<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transoperasional extends Model
{
    use HasFactory;
    protected $table = 'trans_operasional';
    use Loggable;
    protected $fillable = [
        'operasional_id',
        'jenis',
        'stok'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function opera()
    {
        return $this->belongsTo(Operasional::class,'operasional_id');
    }
}
