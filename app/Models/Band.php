<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Band extends Model
{
    use HasFactory;

    protected $table = 'bands';

    /**
     * リレーション
     */
    public function staffs()
    {
        return $this->belongsToMany(Staff::class, 'staffs_bands');
    }

    /**
     * バンド一覧を取得
     */
    public function getBand()
    {
        try{
            $staff = $this->with('staffs')->get();
            return $staff;
        } catch (\Exception $e) {
            Log::emergency('バンド一覧の取得に失敗');
            Log::emergency($e->getMessage());
            return $e;
        }
    }
}
