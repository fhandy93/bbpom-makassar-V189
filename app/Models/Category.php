<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Loggable;
    protected $guarded = [];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
}


