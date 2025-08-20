<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfopomLearAnsw extends Model
{
    use HasFactory;
    protected $table = 'infopom_learning_answer';
    use Loggable;
    protected $fillable = [
        'questions_id',
        'answers',
        'detail',
        'status'
    ];
    

}
