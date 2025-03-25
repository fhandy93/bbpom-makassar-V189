<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujikategory extends Model
{
    use HasFactory;
    protected $table = 'uji_kategory';
    protected $fillable = [
        'type',
        'nm_kategory',
        'descript'
    ];
    public function ujikat()
    {
        return $this->hasMany(Ujisubkat::class, 'kat_id'); // 'sub_id' adalah foreign key di tabel 'transuji'
    }
}
