<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    // Laravel課題3 - 問題①
    public function allSchedule()
    {
        $schedule = $this->all();
        return $schedule;
    }

    // Laravel課題3 - 問題②
    public function pastPracticeList()
    {
        $list = $this->whereDate('date', '<', date(today()))->get();
        return $list;
    }

    public function featurePracticeList()
    {
        $list = $this->whereDate('date', '>=', date(today()))->get();
        return $list;
    }

    // Laravel課題3 - 問題③
    public function team()
    {
        return $this->belongsTo(Team::class, 'id', 'id');
    }

    // Laravel課題3 - 発展④
    public function member()
    {
        return $this->hasMany(Member::class, 'id', 'id');
    }
}
