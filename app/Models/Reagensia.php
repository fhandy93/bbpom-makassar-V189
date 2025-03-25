<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reagensia extends Model
{
    use HasFactory;
    protected $table = 'reagensia';
    use Loggable;
    protected $fillable = [
        'nama',
        'kataloq',
        'netto',
        'stok'
    ];
    public function agen()
    {
        return $this->hasMany(Transreagensia::class);
    }
}
