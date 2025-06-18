<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'publisher', 'edition', 'published_year', 'value'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
