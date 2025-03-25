<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mikrobiologi extends Model
{
    use HasFactory;
    protected $table = 'mikrobiologi';
    use Loggable;
    protected $fillable = [
        'nama',
        'kataloq',
        'netto',
        'exp',
        'stok'
    ];
    public function mikro()
    {
        return $this->hasMany(Transmikrobiologi::class);
    }
}
