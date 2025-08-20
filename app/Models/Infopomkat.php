<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infopomkat extends Model
{
    use HasFactory;
    protected $table = 'infopom_faq_kategori';
    use Loggable;
    protected $fillable = [
        'title',
        'nm_kategori'
    ];
    
    public function qnas()
    {
        return $this->hasMany(Infopomqna::class,'kategori_id');
    }
}
