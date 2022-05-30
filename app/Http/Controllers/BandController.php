<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BandController extends Controller
{
    /**
     * バンド一覧を表示
     */
    public function showBandList(Band $band)
    {
        try {
            $showBand = $band->getBand();
            Log::info(json_encode($showBand, JSON_UNESCAPED_UNICODE));
            return $showBand;
        } catch (\Exception $e) {
            Log::emergency('バンド一覧の表示に失敗しました' . $showBand);
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    /**
     * バンドの登録処理
     */
    public function createBand(Request $request, Band $band)
    {
        $postData = $request->only([
            'name',
            'genre',
            'num_people',
            'introduction',
        ]);

        try {
            DB::beginTransaction();
            $createData = $band->createBandData($postData);
            Log::info('バンド情報の登録が完了しました');

            $band_id = $createData->id;
            $band->createStaffBandData($band_id);
            Log::info('バンドと部員が安全に紐付きました');

            DB::commit();
            return 'バンドを登録しました';
        } catch (\Exception $e) {
            Log::emergency('バンドの登録に失敗しました');
            Log::emergency($e->getMessage());
            DB::rollBack();
            return $e;
        }
    }
}
