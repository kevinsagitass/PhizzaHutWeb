<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\AdminRepositoryEloquent;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $adminRepository;

    public function __construct(AdminRepositoryEloquent $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function viewAllUser()
    {
        try {
            if(!Auth::check()) {
                return redirect('Login');
            } else if (Auth::user()->role_id != 1) {
                abort(403);
            }

            $allUser = $this->adminRepository->getAllUser();

            return View('all_user')->with(['users' => $allUser, 'user' => Auth::user()]);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
