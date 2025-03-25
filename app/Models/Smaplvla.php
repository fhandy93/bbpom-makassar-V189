<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smaplvla extends Model
{
    use HasFactory;
    protected $table = 'sudoku_smap_lvl_a';
    use Loggable;
    protected $fillable = [
        'lvl',
        'klausul',
        'no_dokumen',
        'judul',
        'file',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function smapDet()
    {
        return $this->hasMany(Smaplvlb::class,'smap_id');
    }
}
