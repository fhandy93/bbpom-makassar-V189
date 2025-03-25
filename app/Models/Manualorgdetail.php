<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manualorgdetail extends Model
{
    use HasFactory;
    protected $table = 'sudoku_manual_org_judul';
    use Loggable;
    protected $fillable = [
        'no_dokumen',
        'judul',
        'tgl_terbit',
        'revisi',
        'waktu',
        'user_id',
        'sudoku_manual_org_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function manualorg()
    {
        return $this->belongsTo(Manualorg::class,'sudoku_manual_org_id');
    }
    public function manOrgDet()
    {
        return $this->hasMany(Detailrevisilvla::class,'judul_id');
    }
    public function maxRevisi(){
        return $this->manOrgDet()->max('revisi');
    }
}


