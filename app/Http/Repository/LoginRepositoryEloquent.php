<?php

namespace App\Http\Repository;

use App\Models\MsUser;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class LoginRepositoryEloquent
 *
 * @package namespace App\Http\Repository;
 */
class LoginRepositoryEloquent
{
    public function login($data)
    {
        try {
            $result = $this->validate($data);

            if ($result == 'success') {

                $user = MsUser::query()
                ->where('email', 'like', '%'.$data['email'].'%')
                ->first();

                if ($user != null) {
                    $userdata = array(
                        'email'     => $data['email'],
                        'password'  => $data['password']
                    );
                    if (Auth::attempt($userdata)) {
                        return $result;
                    } else {
                        return ['error' => 'user', 'msg' => 'User Doesn\'t Exists'];    
                    }
                } else {
                    return ['error' => 'user', 'msg' => 'User Doesn\'t Exists'];
                }
            }

        } catch (Exception $e) {
            throw $e;
        }

        return $result;
    }

    private function validate($data)
    {
        try {
            if (!isset($data['email'])) {
                return ['error' => 'email', 'msg' => 'Email Cannot be Empty'];
            } else if (!isset($data['password'])) {
                return ['error' => 'password', 'msg' => 'Password Cannot be Empty'];
            }

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                return ['error' => 'email', 'msg' => 'Email Format Wrong'];
            }

            if (strlen($data['password']) < 6) {
                return ['error' => 'password', 'msg' => 'Password Must be More than 5 Characters'];
            }

            return 'success';

        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>