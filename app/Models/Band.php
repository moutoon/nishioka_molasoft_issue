<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $table = 'bands';

    /**
     * リレーション
     */
    public function staffs()
    {
        return $this->belongsToMany(Staff::class);
    }
}
