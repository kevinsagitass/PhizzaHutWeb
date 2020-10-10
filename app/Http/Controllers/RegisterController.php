<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\RegisterRepositoryEloquent;

class RegisterController extends Controller
{
    protected $registerRepository;

    public function __construct(RegisterRepositoryEloquent $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    public function register(Request $request)
    {
        try {
            $data = $request->all();

            $response = $this->registerRepository->store($data);

            if($response != 'success') {
                return redirect()->back()->with($response)->withInput();
            } else {
                return view('Login');
            }

        } catch (Exception $e) {
            throw $e;
        }
    }
}
