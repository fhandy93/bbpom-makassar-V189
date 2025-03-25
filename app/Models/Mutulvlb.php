<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutulvlb extends Model
{
    use HasFactory;
    protected $table = 'sudoku_mutu_lvl_b';
    use Loggable;
    protected $fillable = [
        'mutu_kode',
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
