<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notification';
    protected $fillable = [
        'title',
        'desc',
        'received' ,
        'user_id',
        'type'
    ];
    public function transnotif()
    {
        return $this->hasMany(Transnotif::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
