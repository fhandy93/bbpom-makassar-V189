<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuantitatif extends Model
{
    use HasFactory;
    protected $table = 'kuantitatif';
    use Loggable;
    protected $fillable = [
        'nama',
        'bmn',
        'merek',
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
    public function kuan()
    {
        return $this->hasMany(Transkuantitatif::class);
    }
}
