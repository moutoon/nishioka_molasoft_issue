<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Band extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * リレーション
     */
    public function staffs()
    {
        return $this->belongsToMany(Staff::class, 'staffs_bands');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * バンド一覧を取得
     */
    public function getBand()
    {
        try{
            $band = $this->with('staffs')->get();
            return $band;
        } catch (\Exception $e) {
            Log::emergency('バンド一覧の取得に失敗しました');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * バンド情報の登録処理
     */
    public function createBandData($postData)
    {
        try {
            $createData = $this->create($postData);
            return $createData;
        } catch (\Exception $e) {
            Log::emergency('バンド情報の登録に失敗しました');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * バンド登録の際に安全に部員と紐付ける
     */
    public function createStaffBandData($band_id)
    {
        $band = $this->find($band_id);
        $staffCount = Staff::count();
        $data = $band->staffs()->sync(rand(1, $staffCount));
        return $data;
    }

}
