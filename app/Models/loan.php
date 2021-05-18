<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stock_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function stock() {
        return $this->belongsTo(stock::class);
    }

    public function book() {
        return $this->stock->book();
}

public function dueDate() {
    $due = $this->created_at;
    date_add($due,date_interval_create_from_date_string("14 days"));

    return $due;
}
}
