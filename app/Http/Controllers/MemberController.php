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
            $allMember = $member->all();
            $tokyoMembers = $allMember->map(function ($member) {
                    if ($member['area'] === '東京'){
                        return $member;
                    }
                });
            Log::info($tokyoMembers);

        // 05 - Step7
            // $allMember = $member->all();
            // $areas = $allMember->pluck('area');
            // Log::info($areas);

        // 05 - Step8
            // $allMember = $member->get();
            // $sortMembers = $allMember->sortByDesc('age');
            // Log::info($sortMembers);


        // 07 - Step2
            // $allMember = $member->all();

        // 07 - Step3
        $isEmptyArea = $member->getMemberArea($area)->isEmpty();

        if (isset($area)) {
            $area = $member->getMemberArea($area);
            Log::info(json_encode($area, JSON_UNESCAPED_UNICODE));
        }

        if (!isset($area)) {
            $area = $member->all();
            Log::info(json_encode($area, JSON_UNESCAPED_UNICODE));
        }

        if ($isEmptyArea && isset($area)) {
            Log::info('該当するユーザーはいません');
        }

        return 'test';
    }

    public function outputMemberInformation(Member $member, $member_id)
    {
        // 07 - Step1
            // Log::info($member->find($member_id));
    }

    public function searchMembers(Request $request, Member $member)
    {
        // 07 - Step4
            // $minAge = $request->input('minAge');
            // return $minAge;

        // 07 - Step5
            // $allMember = $member->all();
            // $user = $allMember->where('age', '>=', $minAge);
            // return $user;

        // 07 - Step6
            $minAge = $request->input('minAge');
            $maxAge = $request->input('maxAge');

            if (isset($minAge, $maxAge)) {
                $outputMembers = $member->whereBetween('age', [$minAge, $maxAge]);
            }

            if (isset($minAge)) {
                $outputMembers = $member->where($minAge, '>=', 10);
            }

            if (isset($maxAge)) {
                $outputMembers = $member->where($maxAge, '<=', 10);
            }

            return $outputMembers->get();

            // それではPOSTMANから送られてきたminAgeの情報をつかってその年齢以上の情報を返してあげましょう。
            // Membersテーブルのageが10歳以上の人を取得しreturnで返却します。
            // minAge20・maxAge21を指定すると、2名分出力される
            // minAge90・maxAge nullを指定すると 90歳以上が出力される
            // minAge null ・ maxAge nullを指定すると全員出力される
            // minAge 90 ・ maxAge 1を指定すると誰も出力されない。
    }
}