<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StaffController extends Controller
{
    /**
     * 部員一覧を表示
     */
    public function showStaffList(Staff $staff)
    {
        try {
            $showStaff = $staff->getStaff();
            Log::info(json_encode($showStaff, JSON_UNESCAPED_UNICODE));
            return '部員一覧をログ出力しました';
        } catch (\Exception $e) {
            Log::emergency('部員一覧の表示に失敗');
            Log::emergency($e->getMessage());
            return $e;
        }
    }
}
