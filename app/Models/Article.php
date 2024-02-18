<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Day 4-2 manage category model data
    public function category() {
        return $this->belongsTo('\App\Models\Category');
    }

    // Day 4-3 manage comment model data
    public function comments() {
        return $this->hasMany('\App\Models\Comment');
    }

    // Day 5-3 authentication
    public function user() {
        return $this->belongsTo('\App\Models\User');
    }
}
