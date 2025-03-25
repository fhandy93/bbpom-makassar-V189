<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutulvla extends Model
{
    use HasFactory;
    protected $table = 'sudoku_mutu_lvl_a';
    use Loggable;
    protected $fillable = [
        'mutu_kode',
        'judul',
        'file',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function mutuDet()
    {
        return $this->hasMany(Mutulvlb::class,'mutu_kode');
    }
}
