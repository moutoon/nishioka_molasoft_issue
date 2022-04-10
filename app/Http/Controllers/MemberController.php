<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Member;
use PhpParser\Node\Stmt\ElseIf_;

class MemberController extends Controller
{
    public function showMemberList(Member $member, $area = null)
    {
        // 04 - Step 3
            // $id1 = $member->find(1);
            // Log::info($id1);

        // 04 - Step4
            // $tokyoArea = $member->where('area', '東京')->get();
            // Log::info($tokyoArea);

        // 04 - Step5
            // $under30 = $member->where('age', '<=', 30)->get();
            // Log::info($under30);

        // 05 - Step1
            // $allMember = $member->all();
            // Log::info($allMember);

        // 05 - Step2
            // $allMember = $member->all();
            // $tokyoUser = $allMember->firstWhere('area', '東京');
            // Log::info($tokyoUser);

        // 05 - Step3
            // $allMember = $member->all();
            // $ageOver25 = $allMember->where('age', '>=', 25);
            // if (!empty($ageOver25))
            // {
            //     Log::info('25歳以上がいます。');
            // }

        // 05 - Step4
            // $allMember = $member->all();
            // $ageUnder20 = $allMember->filter(function ($member) {
            //     return $member['age'] <= 20;
            // });

            // if ($member->isNotEmpty)
            // {
            //     Log::info('20歳以下がいます。');
            // }

        // 05 - Step5
            // $allMember = $member->all();
            // Log::info($allMember->count());

        // 05 - Step6
            // $allMember = $member->all();
            // $tokyoMembers = $allMember
            //     ->where('area', '東京')
            //     ->map(function ($allMember) {
            //         return $allMember;
            //     });
            // Log::info($tokyoMembers);

        // 05 - Step7
            // $allMember = $member->all();
            // $areas = $allMember->pluck('area');
            // Log::info($areas);

        // 05 - Step8
            // $allMember = $member->get();
            // $sortMembers = $allMember->sortByDesc('age');
            // Log::info($sortMembers);

        // 07 - Step2
            $allMember = $member->all();

            // $areaが東京、大阪、福岡、北海道なら該当のユーザー情報をログに表示
            // $areaが東京、大阪、福岡、北海道以外なら「該当するユーザーはいません」とログに表示
            // $areaがemptyなら全ユーザーの情報をログに表示

            // if ($area === '東京') {
            //     $tokyoArea = $allMember->where('area', '東京')->get();
            //     Log::info($tokyoArea);
            // } elseif($area === '鹿児島') {
            //     Log::info('該当するユーザーはいません');
            // };


        return 'test';
    }

    public function OutputMemberInformation(Member $member, $member_id)
    {
        // 07 - Step1
        $allMember = $member->all();
        Log::info($allMember->find($member_id));
        return 'OutputMemberInformation';
    }

    public function searchMembers(Request $request)
    {
        $minAge = $request->input('minAge');
        return 'test';
    }
}