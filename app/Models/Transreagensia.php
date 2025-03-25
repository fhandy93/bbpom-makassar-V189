<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transreagensia extends Model
{
    use HasFactory;
    protected $table = 'trans_reagensia';
    use Loggable;
    protected $fillable = [
        'reagensia_id',
        'jenis',
        'stok'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function agen()
    {
        return $this->belongsTo(Reagensia::class,'reagensia_id');
    }
}
