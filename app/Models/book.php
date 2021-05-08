<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
