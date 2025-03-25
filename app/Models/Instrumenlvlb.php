<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrumenlvlb extends Model
{
    use HasFactory;
    protected $table = 'sudoku_instrumen_lvl_b';
    use Loggable;
    protected $fillable = [
        'instrumen_kode',
        'mutu_kode',
        'judul_sop',
        'file',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function instDet()
    {
        return $this->hasMany(Instrumenlvlc::class,'instrumen_kode');
    }
}
