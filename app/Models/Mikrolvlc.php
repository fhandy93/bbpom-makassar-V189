<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mikrolvlc extends Model
{
    use HasFactory;
    protected $table = 'sudoku_mikro_lvl_c';
    use Loggable;
    protected $fillable = [
        'kode_mikro',
        'tgl_terbit',
        'revisi',
        'user_id',
        'waktu'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
