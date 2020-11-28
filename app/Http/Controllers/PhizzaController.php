<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Phizza;
use App\Http\Repository\PhizzaRepositoryEloquent;

class PhizzaController extends Controller
{

    public function __construct(PhizzaRepositoryEloquent $phizzaRepository)
    {
        $this->phizzaRepository = $phizzaRepository;
    }

    private function validatePhizza($data)
    {
        $validator = Validator::make($data, [
            'phizza_name' => 'required|max:20',
            'price' => 'required|numeric|min:10000',
            'desc' => 'required|min:20',
            'image' => 'image'
        ]);
        return $validator;

    }

    public function add(Request $request)
    {
        try {
            $data = $request->all();
            $validator = $this->validatePhizza($data);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $response = $this->phizzaRepository->add($data);
            $image = $request->file('image');
            $new_name = $response['new_name'];
            if (!File::exists(public_path() . '\storage\PhizzaPicture')) {
                File::makeDirectory(public_path() . '\storage\PhizzaPicture', 0777, true, true);
            }
            $image->move(public_path() . '\storage\PhizzaPicture', $new_name);
            return view('addphizza');
        } catch (Exception $e) {
            throw e;
        }
    }

    public function update(Request $request)
    {
        try {
            $data = $request->all();
            $validator = $this->validatePhizza($data);
            $oldPhizza = $this->phizzaRepository->getPhizza($data['idPhizza']);
            if ($validator->fails()) {
                return redirect()->route('editphizza',['phizza'=>$oldPhizza])->withErrors($validator)->withInput();
            }
            $oldImage = $oldPhizza->image;
            $response = $this->phizzaRepository->update($data);
            if($request->file('image') != null) {
                $image = $request->file('image');
                $new_name = $response['new_name'];
                $image->move(public_path() . '\storage\PhizzaPicture', $new_name);
                unlink(public_path() . "\storage\PhizzaPicture\\$oldImage");
            }
            return redirect('Home');
        } catch (Exception $e) {
            throw e;
        }
    }

    public function getPhizzaDetail($phizza_id)
    {
        try {
            $phizza = $this->phizzaRepository->getPhizzaDetail($phizza_id);
        } catch (Exception $e) {
            throw $e;
        }

        return view('phizza_detail', ['detail' => $phizza]);
    }

    public function editPhizza(Phizza $phizza)
    {
        return view('updatepizza', [
            'phizza' => $phizza,
            'user' => Auth::user()
        ]);
    }

    public function deletePhizza($phizza_id)
    {
        try {
            $phizza = $this->phizzaRepository->getPhizzaDetail($phizza_id);
        } catch (Exception $e) {
            throw $e;
        }

        return view('delete_phizza', ['phizza' => $phizza]);
    }

    public function delete($phizza_id)
    {
        try {
            $this->phizzaRepository->deletePhizza($phizza_id);
        } catch (Exception $e) {
            throw $e;
        }

        return redirect('Home');
    }

    public function addPhizzatoCart($phizza_id, Request $request)
    {
        try {
            $param = $request->only([
                'quantity',
            ]);
            $param['phizza_id'] = $phizza_id;

            if ($param['quantity'] <= 0) {
                return redirect()->back()->with(['err' => 'Minimum Quantity is 1'])->withInput();
            }

            $err = $this->phizzaRepository->addPhizzatoCart($param);

            if ($err != 'success') {
                return redirect()->back()->with($err)->withInput();
            } else {
                return redirect('Home');
            }

        } catch (Exception $e) {
            throw $e;
        }
    }
}
