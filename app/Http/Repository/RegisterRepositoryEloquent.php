<?php

namespace App\Http\Repository;

use App\Models\MsUser;
use Illuminate\Support\Facades\DB;

/**
 * Class RegisterRepositoryEloquent
 *
 * @package namespace App\Http\Repository;
 */
class RegisterRepositoryEloquent
{
    public function store($data)
    {
        try {
            $result = $this->validate($data);
        } catch (Exception $e) {
            throw $e;
        }

        return $result;
    }

    private function validate($data)
    {
        try {
            if(!isset($data['username']) || $data['username'] == null) {
                return ['error' => 'username', 'msg' => 'Username Cannot be Empty'];
            } else if (!isset($data['email'])) {
                return ['error' => 'email', 'msg' => 'Email Cannot be Empty'];
            } else if (!isset($data['password'])) {
                return ['error' => 'password', 'msg' => 'Password Cannot be Empty'];
            } else if (!isset($data['confirm_password'])) {
                return ['error' => 'confirm_password', 'msg' => 'Confirm Password Cannot be Empty'];
            } else if (!isset($data['address'])) {
                return ['error' => 'address', 'msg' => 'Address Cannot be Empty'];
            } else if (!isset($data['phone_number'])) {
                return ['error' => 'phone_number', 'msg' => 'Phone Number Cannot be Empty'];
            } else if (!isset($data['gender'])) {
                return ['error' => 'gender', 'msg' => 'Please Choose Gender'];
            }

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                return ['error' => 'email', 'msg' => 'Email Format Wrong'];
            }

            $email = MsUser::query()
            ->where('email', 'LIKE', '%'.$data['email'].'%')
            ->first();

            if($email != null) {
                return ['error' => 'email', 'msg' => 'Email Already Exists'];
            }

            if (strlen($data['password']) < 6) {
                return ['error' => 'password', 'msg' => 'Password Length Minimum 6 Letters'];
            }

            if ($data['password'] !== $data['confirm_password']) {
                return ['error' => 'confirm_password', 'msg' => 'Confirm Password and Password Must be The Same'];
            }

            if (!is_numeric($data['phone_number'])) {
                return ['error' => 'phone_number', 'msg' => 'Phone Number Must be Numeric'];
            }

            $user = new MsUser();


            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->pass = $data['password'];
            $user->confirm_pass = $data['confirm_password'];
            $user->address = $data['address'];
            $user->phone_number = $data['phone_number'];
            $user->gender = $data['gender'];
        
            $user->save();

        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>