<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smaplvlb extends Model
{
    use HasFactory;
    protected $table = 'sudoku_smap_lvl_b';
    use Loggable;
    protected $fillable = [
        'smap_id',
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
