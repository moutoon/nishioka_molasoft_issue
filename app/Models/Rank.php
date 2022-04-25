<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    // リレーション課題
    public function team()
    {
        return $this->belongsTo(Team::class, 'rank', 'id');
    }
}
