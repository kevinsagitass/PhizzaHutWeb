<?php

namespace App\Http\Repository;

use App\Models\MsUser;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Cookie;

/**
 * Class HomeRepositoryEloquent
 *
 * @package namespace App\Http\Repository;
 */
class HomeRepositoryEloquent
{
    public function getUserAbility($user)
    {
        try {
            $userAbility = DB::table('tr_user_ability')
            ->select('task')
            ->where('role_id', '=', $user['role_id'])
            ->get()->toArray();

            $userAbilityArr = [];
            foreach ($userAbility as $ability) {
                $userAbilityArr[] = $ability->task;
            }
        } catch (Exception $e) {
            throw $e;
        }
        return $userAbilityArr;
    }
}

?>