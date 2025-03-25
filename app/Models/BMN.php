<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BMN extends Model
{
    use HasFactory;
    protected $table = 'bmn_bst';
    use Loggable;
    protected $fillable = [
        'jns_bst',
        'no_surat',
        'user_id',
        'user_bmn',
        'user_input'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function userinput()
    {
        return $this->belongsTo(User::class,'user_input');
    }
    public function userbmn()
    {
        return $this->belongsTo(User::class,'user_bmn');
    }
}
