<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Day 5-3 authentication
    public function user() {
        return $this->belongsTo('\App\Models\User');
    }

    // Day 5-4 authorization logic
    public function article() {
        return $this->belongsTo('\App\Models\Article');
    }
}
