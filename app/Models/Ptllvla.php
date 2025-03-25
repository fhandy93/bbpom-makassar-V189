<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptllvla extends Model
{
    use HasFactory;
    protected $table = 'sudoku_ptl_lvl_a';
    use Loggable;
    protected $fillable = [
        'ptl_kode',
        'judul',
        'file',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ptlDet()
    {
        return $this->hasMany(Ptllvlb::class,'ptl_kode');
    }
}
