<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sappai extends Model
{
    use HasFactory;
    protected $table = 'sample';
    use Loggable;
    protected $fillable = [
        'user_id',
        'kode',
        'tanggal' ,
        'nama_sample',
        'komoditi',
        'asal',
        'tahap',
        'berkas',
        'billing',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
