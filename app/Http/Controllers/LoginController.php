<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\LoginRepositoryEloquent;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $loginRepository;

    public function __construct(LoginRepositoryEloquent $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function login(Request $request)
    {
        try {
            $data = $request->all();

            $response = $this->loginRepository->login($data);

            if($response != 'success') {
                return redirect()->back()->with($response)->withInput();
            } else {
                if (isset($data['remember'])) {
                    $emailCookie = cookie('email', $data['email'], 120);
                    return redirect('Home')->withCookie($emailCookie);
                }
                return redirect('Home');
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
        } catch (Exception $e) {
            throw $e;
        }
        return redirect('Home');
    }
}
