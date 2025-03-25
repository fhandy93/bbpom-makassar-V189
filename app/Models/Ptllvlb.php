<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptllvlb extends Model
{
    use HasFactory;
    protected $table = 'sudoku_ptl_lvl_b';
    use Loggable;
    protected $fillable = [
        'ptl_kode',
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
