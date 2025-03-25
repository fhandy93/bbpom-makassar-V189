<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transnotif extends Model
{
    use HasFactory;
    protected $table = 'trans_notification';
    protected $fillable = [
        'notif_id',
        'user_id',
        'read' 
    ];
    public function notif()
    {
        return $this->belongsTo(Notification::class);
    }
}
