<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function getMemberArea($area)
    {
        $getArea = $this->where('area', $area)->get();
        return $getArea;
    }
}
