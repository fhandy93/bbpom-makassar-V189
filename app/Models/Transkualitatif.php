<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transkualitatif extends Model
{
    use HasFactory;
    protected $table = 'trans_kualitatif';
    use Loggable;
    protected $fillable = [
        'kualitatif_id',
        'jenis',
        'stok'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function kual()
    {
        return $this->belongsTo(Kualitatif::class,'kualitatif_id');
    }
}
