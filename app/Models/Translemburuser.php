<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translemburuser extends Model
{
    use HasFactory;
    protected $table = 'trans_lembur_user';
    use Loggable;
    protected $fillable = [
        'lembur_id',
        'user_id',
        'nip',
        'pangkat',
        'jabatan'
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
