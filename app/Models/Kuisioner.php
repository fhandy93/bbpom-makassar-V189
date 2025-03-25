<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    use HasFactory;
    protected $table = 'kuisioner';
    use Loggable;
    protected $fillable = [
        'user_id',
        'nama',
        'usia',
        'jk',
        'hp',
        'p1',
        'p2',
        'instansi',
        'p3',
        'p4',
        'p5',
        'p6',
        'p7',
        'p8',
        'p9',
        'p10',
        'p11',
        'p12',
        'p13',
        'p14',
        'p15',
        'p16',
        'p17',
        'p18',
        'p19',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
