<?php

namespace App\Http\Repository;

use App\Models\Phizza;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

/**
 * Class PhizzaRepositoryEloquent
 *
 * @package namespace App\Http\Repository;
 */
class PhizzaRepositoryEloquent
{
    public function add($data)
    {
        try {

            $new_name = null;
            $phizza = new Phizza();
            $phizza->phizza_name = $data['phizza_name'];
            $phizza->desc = $data['desc'];
            $phizza->price = $data['price'];
            $phizza->image = rand() . '.' . $data['image']->getClientOriginalExtension();;
            $new_name = $phizza->image;
            $phizza->save();
        } catch (Exception $e) {
            throw e;
        }
        return ['new_name' => $new_name];
    }

    public function getPhizza($id)
    {
        $phizza = Phizza::query()
            ->where('phizza_id', '=', $id)
            ->first();
        return $phizza;
    }

    public function update($data)
    {
        try {
            $new_name = null;

                $phizza = $this->getPhizza($data['idPhizza']);
                $phizza->phizza_id = $data['idPhizza'];
                $phizza->phizza_name = $data['phizza_name'];
                $phizza->desc = $data['desc'];
                $phizza->price = $data['price'];
                $phizza->image = rand() . '.' . $data['image']->getClientOriginalExtension();
                $new_name = $phizza->image;
                $phizza->save();

        } catch (Exception $e) {
            throw e;
        }
        return ['new_name' => $new_name];
    }


    public function getPhizzaDetail($phizza_id)
    {
        try {
            $phizza = Phizza::query()
                ->where('phizza_id', '=', $phizza_id)
                ->first();

        } catch (Exception $e) {
            throw $e;
        }

        return $phizza;
    }

    public function deletePhizza($phizza_id)
    {
        try {
            $phizza = Phizza::query()->where('phizza_id', '=', $phizza_id);

            $phizza->delete();
        } catch (Exception $e) {
            throw $e;
        }

        return null;
    }

    public function addPhizzatoCart($param)
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return ['err' => 'Please Log in First!'];
            }

            $userCart = Cart::query()
                ->where('user_id', '=', $user['user_id'])
                ->where('phizza_id', '=', $param['phizza_id'])
                ->first();

            if ($userCart != null) {
                $cart = Cart::query()->where('item_id', '=', $userCart->item_id)->first();

                $cart->quantity = $cart->quantity + $param['quantity'];
            } else {
                $cart = new Cart();

                $cart->phizza_id = $param['phizza_id'];
                $cart->user_id = $user['user_id'];
                $cart->quantity = $param['quantity'];
            }

            $cart->save();

        } catch (Exception $e) {
            throw $e;
        }

        return 'success';
    }

}

?>
