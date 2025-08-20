<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfopomLearKat extends Model
{
    use HasFactory;
    protected $table = 'infopom_learning_kategori';
    use Loggable;
    protected $fillable = [
        'nm_kategori'
    ];
}
