<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kualitatif extends Model
{
    use HasFactory;
    protected $table = 'kualitatif';
    use Loggable;
    protected $fillable = [
        'nama',
        'bmn',
        'ukuran',
        'kosmetik',
        'pangan',
        'ot',
        'mikro',
        'obat',
        's_kosmetik',
        's_pangan',
        's_ot',
        's_mikro',
        's_obat'
    ];
    public function kual()
    {
        return $this->hasMany(Transkualitatif::class);
    }
}
