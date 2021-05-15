<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class book extends Model
{
    use HasFactory;

    protected $fillable = [
    	'title',
    	'author',
    	'blurb',
    	'img',
    	'ISBN'
    ];

    public function author() {
        return $this->belongsTo(Author::class);
}

public function stock() {
        return $this->hasMany(stock::class);
}

public function addStock($stock) {
        $this->stock()->save($stock);
}

public function isAvailable() {
        $stock = $this->stock;
        $out = false;

        foreach ($stock as $stock) {
            if(!isset($stock->loan)) {
                $out = true;
            }
        }

        return $out;
}

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function addTag(Tag $tag) {
        return $this->tags()->save($tag);
    }

    public function removeTag(Tag $tag) {
        try {
            DB::table('book_tag')
                ->where('book_id', $this->id)
                ->where('tag_id', $tag->id)
                ->delete();
        } catch (\Exception $e) {
            return "Something went wrong in the database";
        }

        return null;
    }
}
