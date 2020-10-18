<?php

namespace App\Http\Repository;

use App\Models\MsUser;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Cookie;

/**
 * Class AdminRepositoryEloquent
 *
 * @package namespace App\Http\Repository;
 */
class AdminRepositoryEloquent
{
    public function getAllUser()
    {
        try {
            $users = MsUser::all();
        } catch (Exception $e) {
            throw $e;
        }
        return $users;
    }
}

?>