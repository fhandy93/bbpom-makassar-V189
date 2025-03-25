<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makrolvld extends Model
{
    use HasFactory;
    protected $table = 'sudoku_makro_lvl_d';
    use Loggable;
    protected $fillable = [
        'peta_id',
        'kode_sop',
        'judul_sop',
        'user_id',
        'file'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function makroDet()
    {
        return $this->hasMany(Makrolvle::class,'sop_id');
    }
}
