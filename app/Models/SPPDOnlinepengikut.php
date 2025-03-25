<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPPDOnlinepengikut extends Model
{
    use HasFactory;
    protected $table = 'tb_sppd_online_pengikut';
    use Loggable;
    protected $fillable = [
       
        'sppd_id',
        'nama1',
        'tgl1',
        'ket1',
        'nama2',
        'tgl2',
        'ket2',
        'nama3',
        'tgl3',
        'ket3',
        'nama4',
        'tgl4',
        'ket4',
        'nama5',
        'tgl5',
        'ket5'

    ];
}
