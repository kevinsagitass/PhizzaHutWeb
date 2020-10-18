<?php

namespace App\Http\Repository;

use App\Models\Phizza;
use Illuminate\Support\Facades\DB;

/**
 * Class PhizzaRepositoryEloquent
 *
 * @package namespace App\Http\Repository;
 */
class PhizzaRepositoryEloquent
{
    public function add($data)
    {
        try{
            $result = $this->validate($data);
            $new_name=null;
            if($result == 'success')
            {
                $phizza = new Phizza();

                $phizza->phizza_name = $data['phizza_name'];
                $phizza->desc = $data['desc'];
                $phizza->price = $data['price'];
                $phizza->image = rand().'.'.$data['image']->getClientOriginalExtension();;
                $new_name = $phizza->image;
                $phizza->save();
            }
        }catch(Exception $e){
            throw e;
        }
        return ['status' => $result, 'new_name' => $new_name];
    }

    private function validate($data)
    {
        try {
            if(!isset($data['phizza_name']) || $data['phizza_name'] == null) {
                return ['error' => 'phizza_name', 'msg' => 'Pizza Name Cannot be Empty'];
            } else if (!isset($data['price'])) {
                return ['error' => 'price', 'msg' => 'Prize Cannot be Empty'];
            } else if (!isset($data['desc'])) {
                return ['error' => 'desc', 'msg' => 'Description Cannot be Empty'];
            } else if (!isset($data['image'])) {
                return ['error' => 'image', 'msg' => 'No File Chosen'];
            } 
            if(strlen($data['phizza_name'] > 20)){
                return['error' => 'phizza_name', 'msg' =>'Pizza Mames Must be Between 1-20 Character(s)'];
            }
            if($data['price'] < 10000){
                return['error'=>'price', 'msg' => 'Minimum pizza price of 10000'];
            }

            if (!is_numeric($data['price'])) {
                return ['error' => 'price', 'msg' => 'Price Must be Numeric'];
            }

            if(strlen($data['desc']) < 20){
                return['error'=>'desc', 'msg' => 'Desciption of Pizza Must be More than 19 Characters'];
            }


            if(pathinfo($data['image']->getClientOriginalName())['extension'] != 'jpg'){
                return ['error' => 'image', 'msg' => 'The Uploaded File wass Not Image'];
            }

            return 'success';

        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>