<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manualorg extends Model
{
    use HasFactory;
    protected $table = 'sudoku_manual_orgs';
    use Loggable;
    protected $fillable = [
        'klausul',
        'judul',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function detailorg()
    {
        return $this->hasMany(Manualorgdetail::class);
    }
}


