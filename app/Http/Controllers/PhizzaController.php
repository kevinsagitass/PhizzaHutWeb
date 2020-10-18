<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Phizza;
use App\Http\Repository\PhizzaRepositoryEloquent;
class PhizzaController extends Controller
{

    public function __construct(PhizzaRepositoryEloquent $phizzaRepository)
    {
        $this->phizzaRepository = $phizzaRepository;
    }

    

    public function add(Request $request)
    {
        try{
            $data = $request->all();

            $response =$this->phizzaRepository->add($data);
            if($response['status'] !='success'){
                return redirect()->back()->with($response['status'])->withInput();
            }else{
                $image = $request->file('image');
                $new_name= $response['new_name'];
                if(!File::exists(storage_path().'\app\PhizzaPicture'))
                {
                    File::makeDirectory(storage_path().'\app\PhizzaPicture',0777,true,true);
                }
                $image->move(storage_path().'\app\PhizzaPicture', $new_name);
                return view('addphizza');
            }
        }catch(Exception $e){
            throw e;
        }
    }

    public function view()
    {
        $products = Phizza::all();
        return view('viewphizza',[
            'products'=> $products
        ]);
    }

}
