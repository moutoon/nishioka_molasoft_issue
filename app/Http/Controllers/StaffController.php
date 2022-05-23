<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StaffPostRequest;

class StaffController extends Controller
{
    /**
     * 部員一覧を表示
     */
    public function showStaffList(Staff $staff)
    {
        try {
            $showStaff = $staff->getStaff();
            // Log::info(json_encode($showStaff, JSON_UNESCAPED_UNICODE));
            return $showStaff;
        } catch (\Exception $e) {
            Log::emergency('部員一覧の表示に失敗');
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * 部員情報の登録
     */
    public function createStaff(Request $request, Staff $staff)
    {
        $postData = $request->only([
            'name',
            'grade',
            'gender',
            'instrument',
        ]);

        try {
            DB::beginTransaction();
            $createData = $staff->createStaffData($postData);
            Log::info('部員情報の登録が完了しました');

            $staff_id = $createData->id;
            $staff->createStaffBandData($staff_id);
            Log::info('部員とバンドが安全に紐付きました');

            DB::commit();
            return '部員情報を登録しました';

        } catch (\Exception $e) {
            Log::emergency('部員情報の登録に失敗しました');
            Log::emergency($e->getMessage());
            DB::rollBack();
            return $e;
        }
    }

    /**
     * 部員情報の更新
     */
    public function updateStaff(StaffPostRequest $request, Staff $staff)
    {
        $id = $request->input('id');
        $postData = $request->only([
            'name',
            'grade',
            'gender',
            'instrument',
        ]);

        try {
            DB::beginTransaction();
            $staff->updateStaffData($postData, $id);
            DB::commit();
            return '部員情報を更新しました';

        } catch (\Exception $e) {
            Log::emergency('部員情報の更新に失敗しました');
            Log::emergency($e->getMessage());
            DB::rollBack();
            return $e;
        }
    }

    /**
     * 部員情報の削除
     */
    public function deleteStaff(Request $request, Staff $staff)
    {
        $id = $request->input('id');

        try {
            DB::beginTransaction();
            $staff->deleteStaffData($id);
            DB::commit();
            return '部員情報を削除しました';
        } catch (\Exception $e) {
            Log::emergency('部員情報の削除に失敗しました');
            Log::emergency($e->getMessage());
            DB::rollBack();
            return $e;
        }
    }
}
