<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfopomLearQuest extends Model
{
    use HasFactory;
    protected $table = 'infopom_learning_question';
    use Loggable;
    protected $fillable = [
        'kategori_id',
        'questions',
        'detail',
        'parent_answers_id'
    ];
    
    public function answer()
    {
        return $this->hasMany(InfopomLearAnsw::class,'questions_id');
    }
}
