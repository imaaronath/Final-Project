<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    protected $fillable = ["judul", "isi", "tag", "vote", "upvoted_by"];

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class,'question_id');
    }
}
