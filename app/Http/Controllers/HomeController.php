<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\HomeRepositoryEloquent;
use Illuminate\Support\Facades\Auth;
use App\Models\Phizza;

class HomeController extends Controller
{
    protected $homeRepository;
    protected $user = null;

    public function __construct(HomeRepositoryEloquent $homeRepository)
    {
        $this->homeRepository = $homeRepository;
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function dashboard(Request $request)
    {
        try {
            $userAbility = [];
            if ($this->user != null) {
             // get user abbilities
             $userAbility = $this->homeRepository->getUserAbility($this->user);             
            } else {
                session()->put('ability', []);
            }

            $phizzas = $this->homeRepository->getPhizzas();

            return view('home')->with(['phizzas' => $phizzas]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function searchPhizza(Request $request) 
    {
        try {
            $q = $request->only(['q']);
            if($q != []) {
                $q = $q['q'];
                $phizza = Phizza::query()->where('phizza_name','LIKE','%'.$q.'%')
                ->orWhere('price', '=', $q)
                ->paginate(6);
    
                return view('home')->with(['phizzas' => $phizza]);
            } else {
                $phizza = $this->homeRepository->getPhizzas();
    
                return view('home')->with(['phizzas' => $phizza]);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
