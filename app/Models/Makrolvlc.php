<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makrolvlc extends Model
{
    use HasFactory;
    protected $table = 'sudoku_makro_lvl_c';
    use Loggable;
    protected $fillable = [
        'sub_proses_id',
        'kode_peta',
        'nm_peta',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
