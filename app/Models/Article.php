<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Day 4-2
    public function category() {
        return $this->belongsTo('\App\Models\Category');
    }

    // Day 4-3
    public function comments() {
        return $this->hasMany('\App\Models\Comment');
    }
}
