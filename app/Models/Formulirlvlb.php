<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulirlvlb extends Model
{
    use HasFactory;
    protected $table = 'sudoku_formulir_lvl_b';
    use Loggable;
    protected $fillable = [
        'formulir_kode',
        'induk_kode',
        'judul_sop',
        'file',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function formDet()
    {
        return $this->hasMany(Formulirlvlc::class,'formulir_kode');
    }
}
