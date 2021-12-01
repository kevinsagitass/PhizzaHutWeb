<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\TransactionRepositoryEloquent;
use App\Models\Phizza;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    protected $transactionRepository;

    public function __construct(TransactionRepositoryEloquent $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function viewCart()
    {
        try {
            if(Auth::User()->role_id != 2) {
                abort(403);
            }
            $cartItem = $this->transactionRepository->getUserCart();

            return view('show_cart')->with(['items' => $cartItem]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateCartItemQuantity($item_id, Request $request)
    {
        try {
            if(Auth::User()->role_id != 2) {
                abort(403);
            }
            $param = $request->only([
                'quantity',
            ]);
            $param['item_id'] = $item_id;

            if($param['quantity'] <= 0) {
                return redirect()->back()->with(['err' => 'Minimum Quantity is 1'])->withInput();
            }

            $err = $this->transactionRepository->updateItemQuantity($param);

            if($err != 'success') {
                return redirect()->back()->with(['err' => $err])->withInput();
            } else {
                return redirect('UserCart');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteCartItem($item_id)
    {
        try {
            if(Auth::User()->role_id != 2) {
                abort(403);
            }
            $err = $this->transactionRepository->deleteCartItem($item_id);

            if($err != 'success') {
                return redirect()->back()->with(['err' => $err])->withInput();
            } else {
                return redirect('UserCart');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function CheckoutCart($user_id)
    {
        try {
            if(Auth::User()->role_id != 2) {
                abort(403);
            }
            $err = $this->transactionRepository->checkoutCart($user_id);

            if($err != 'success') {
                return redirect()->back()->with(['checkoutErr' => $err])->withInput();
            } else {
                return redirect('Home');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function viewUserTransaction()
    {
        try {
            if(Auth::User()->role_id != 2) {
                abort(403);
            }
            $transactions = $this->transactionRepository->getUserTransaction();

            return view('user_transaction')->with(['transactions' => $transactions]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function viewTransactionDetail($transaction_id)
    {
        try {
            $details = $this->transactionRepository->getTransactionDetails($transaction_id);

            return view('user_transaction_detail')->with(['details' => $details]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function viewAllUserTransaction(){
        try {
            if(!Auth::check()){
                return redirect('Login');
            } else if(Auth::user()->role_id != 1){
                abort(403);
            }
            $allTransaction = $this->transactionRepository->getAllTransaction();
            return view('all_user_transaction')->with(['transactions'=>$allTransaction , 'user'=> Auth::user()]);
        }catch (Exception $e){
            throw $e;
        }
    }
}
