<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujisubkat extends Model
{
     use HasFactory;
    protected $table = 'uji_sub_kategory';
    protected $fillable = [
        'kat_id',
        'nm_sub_kategory',
    ];
    
    public function transuji()
    {
        return $this->hasMany(Transuji::class, 'sub_id'); // 'sub_id' adalah foreign key di tabel 'transuji'
    }
    public function uji_kategory()
    {
        return $this->belongsTo(Ujikategory::class, 'kat_id')->select('id', 'nm_kategory');
    }
}
