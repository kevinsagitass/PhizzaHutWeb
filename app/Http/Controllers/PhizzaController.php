<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        try {
            $data = $request->all();

            $response = $this->phizzaRepository->add($data);
            if ($response['status'] != 'success') {
                return redirect()->back()->with($response['status'])->withInput();
            } else {
                $image = $request->file('image');
                $new_name = $response['new_name'];
                if (!File::exists(public_path() . '\storage\PhizzaPicture')) {
                    File::makeDirectory(public_path() . '\storage\PhizzaPicture', 0777, true, true);
                }
                $image->move(public_path() . '\storage\PhizzaPicture', $new_name);
                return view('addphizza');
            }
        } catch (Exception $e) {
            throw e;
        }
    }


    public function viewupdate($id)
    {

        $phizza = $this->phizzaRepository->getPhizza($id);
        return view('updatepizza', [
            'phizza' => $phizza,
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        try {
            $data = $request->all();
            $oldPhizza = $this->phizzaRepository->getPhizza($data['idPhizza']);
            $oldImage = $oldPhizza->image;
            $response = $this->phizzaRepository->update($data);
            if ($response['status'] != 'success') {
                return redirect()->back()->with($response['status'])->withInput();
            } else {
                $image = $request->file('image');
                $new_name = $response['new_name'];
                $image->move(public_path() . '\storage\PhizzaPicture', $new_name);
                unlink(public_path() . "\storage\PhizzaPicture\\$oldImage");
                return redirect('Home');
            }
        }catch (Exception $e)
        {
            throw e;
        }
    }

}
