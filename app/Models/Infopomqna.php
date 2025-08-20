<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infopomqna extends Model
{
    use HasFactory;
    protected $table = 'infopom_faq_qna';
    use Loggable;
    protected $fillable = [
        'kategori_id',
        'tanya',
        'jawab'
    ];
    public function kat()
    {
        return $this->belongsTo(Infopomkat::class,'kategori_id');
    }
}
