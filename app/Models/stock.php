<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\book;

class stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id'
    ];

    public function book() {
        return $this->belongsTo(book::class);
    }

    public function loan() {
        return $this->hasOne(loan::class);
    }
}
