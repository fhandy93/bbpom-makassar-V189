<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transkuantitatif extends Model
{
    use HasFactory;
    protected $table = 'trans_kuantitatif';
    use Loggable;
    protected $fillable = [
        'kuantitatif_id',
        'jenis',
        'stok'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function kuan()
    {
        return $this->belongsTo(Kuantitatif::class,'kuantitatif_id');
    }
}
