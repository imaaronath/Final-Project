<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';

    protected $fillable = [
        "question_id","jawaban","vote","best_answer","upvoted_by"
    ];

    public function question()
    {
        return $this->belongsTo(Pertanyaan::class,'question_id','id');
    }
}
