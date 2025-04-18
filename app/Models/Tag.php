<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use Loggable;
    protected $guarded = [];
    public function Posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
