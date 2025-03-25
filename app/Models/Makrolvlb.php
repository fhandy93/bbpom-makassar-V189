<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makrolvlb extends Model
{
    use HasFactory;
    protected $table = 'sudoku_makro_lvl_b';
    use Loggable;
    protected $fillable = [
        'proses_id',
        'kode_sub_pro',
        'nm_sub_pro',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
