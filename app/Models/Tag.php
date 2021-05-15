<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function books() {
        return $this->belongsToMany(book::class);
    }

    public function guides() {
        return $this->belongsToMany(Guide::class);
    }
}
