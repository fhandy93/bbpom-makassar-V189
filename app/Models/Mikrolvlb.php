<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mikrolvlb extends Model
{
    use HasFactory;
    protected $table = 'sudoku_mikro_lvl_b';
    use Loggable;
    protected $fillable = [
        'kode_mikro',
        'kode_makro',
        'judul_sop',
        'file',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function mikroDet()
    {
        return $this->hasMany(Mikrolvlc::class,'kode_mikro');
    }
}
