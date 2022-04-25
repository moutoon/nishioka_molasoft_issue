<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // 04 - Step3
    public function searchMemberId()
    {
        $id1 = $this->find(1);
        return $id1;
    }

     // 04 - Step5
    public function ageUnder30()
    {
        $member = $this->where('age', '<=', 30)->get();
        return $member;
    }

    // 04 - Step4
    public function tokyoAreaMember()
    {
        $member = $this->where('area', '東京')->get();
        return $member;
    }

    public function getMemberArea($area)
    {
        $getArea = $this->where('area', $area)->get();
        return $getArea;
    }

    // Laravel課題3 - 発展④
    public function schedule()
    {
        return $this->belongsTo(Schedule::class,'id', 'id');
    }
}
