<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sudokustorage extends Model
{
    use HasFactory;
    protected $table = 'sudoku_storage';
    use Loggable;
    protected $fillable = [
        'nama_file',
        'user_id',
        'file',
        'ket'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
