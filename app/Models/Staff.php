<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Staff extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $table = 'staffs';

    /**
     * リレーション
     */
    public function bands()
    {
        return $this->belongsToMany(Band::class, 'staffs_bands');
    }

    /**
     * 部員一覧を取得
     */
    public function getStaff()
    {
        try{
            $staff = $this->with('bands')->get();
            return $staff;
        } catch (\Exception $e) {
            Log::emergency('部員一覧の取得に失敗しました' . $staff) ;
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * 部員情報の登録処理
     */
    public function createStaffData($postData)
    {
        Log::info($postData);
        try {
            $createData = $this->create($postData);
            return $createData;
        } catch (\Exception $e) {
            Log::emergency('部員情報の登録に失敗しました');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * 部員情報の更新処理
     */
    public function updateStaffData($postData, $id)
    {
        try {
            $updateData = $this->where('id', $id)->update($postData);
            return $updateData;
        } catch (\Exception $e) {
            Log::emergency('部員情報の更新に失敗しました');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * 部員情報の削除処理
     */
    public function deleteStaffData($id)
    {
        try {
            $deleteData = $this->find($id)->delete();
            return $deleteData;
        } catch (\Exception $e) {
            Log::emergency('部員情報の削除に失敗しました');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * 部員登録の際に安全にバンドと紐付ける
     */
    public function createStaffBandData($staff_id)
    {
        $staff = $this->find($staff_id);
        $bandCount = Band::count();
        $data = $staff->bands()->sync(rand(1, $bandCount));
        return $data;
    }
}
