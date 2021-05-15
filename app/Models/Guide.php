<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function books() {
        $books = [];
        $tags = $this->tags;

        foreach ($tags as $tag) {
            foreach ($tag->books as $book) {
                array_push($books, $book);
            }
        }
        return $books;
    }

    public function addTag(Tag $tag) {
        $this->tags()->save($tag);
    }
}
