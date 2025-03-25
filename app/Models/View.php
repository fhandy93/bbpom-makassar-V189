<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    use Loggable;
    protected $table = 'post_view';
    protected $fillable = [
        'post_id',
        'ip_addres',
        'agent',
        'created_at'
    ];
    public function posts()
    {
        return $this->belongsTo(View::class);
    }
    
}
