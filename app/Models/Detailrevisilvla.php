<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailrevisilvla extends Model
{
    use HasFactory;
    protected $table = 'sudoku_detail_revisi_a';
    use Loggable;
    protected $fillable = [
        'user_id',
        'judul_id',
        'kategori',
        'judul_id',
        'tgl_terbit',
        'revisi'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function detailManOrg()
    {
        return $this->belongsTo(Manualorgdetail::class,'judul_id');
    }
}


