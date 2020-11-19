<?php

namespace App\Http\Repository;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Cookie;
use Carbon\Carbon;

/**
 * Class TransactionRepositoryEloquent
 *
 * @package namespace App\Http\Repository;
 */
class TransactionRepositoryEloquent
{
    public function getUserCart() 
    {
        try {
            $user = Auth::User();

            $cartItem = Cart::query()
            ->select([
                'phizza.image',
                'phizza.phizza_name',
                'phizza.price',
                'cart.quantity',
                'cart.item_id'
            ])
            ->join('phizza', 'cart.phizza_id', '=', 'phizza.phizza_id')
            ->where('user_id', '=', $user['user_id'])
            ->get();

        } catch (Exception $e) {
            throw $e;
        }
        return $cartItem;
    }

    public function updateItemQuantity($param)
    {
        try {
            $item = Cart::query()
            ->where('item_id', '=', $param['item_id'])
            ->first();

            if(!$item) {
                return 'Item Not Found!';
            }

            $item->quantity = $param['quantity'];

            $item->save();
        } catch (Exception $e) {
            throw $e;
        }

        return 'success';
    }

    public function deleteCartItem($item_id)
    {
        try {
            $item = Cart::query()->where('item_id', '=', $item_id)->first();

            if(!$item) {
                return 'Item Not Found!';
            }

            $item->delete();
        } catch (Exception $e) {
            throw $e;
        }

        return 'success';
    }

    public function checkoutCart($user_id)
    {
        try {
            $items = Cart::query()
            ->join('phizza', 'cart.phizza_id', '=', 'phizza.phizza_id')
            ->where('user_id', '=', $user_id)
            ->get();

            if(count($items) == 0) {
                return 'No items';
            }

            $totalPayment = 0;

            // count total price
            foreach($items as $item) {
                $totalPayment += ($item->price * $item->quantity);
            }

            $transaction = new Transaction();

            $transaction->payment_ammount = $totalPayment;
            $transaction->transaction_date = Carbon::now();
            $transaction->user_id = $user_id;
            
            $transaction->save();

            // Insert Detail & Delete Cart Item
            foreach($items as $item) {
                $transactionDetail = new TransactionDetail();

                $transactionDetail->transaction_id = $transaction->transaction_id;
                $transactionDetail->phizza_id = $item->phizza_id;
                $transactionDetail->quantity = $item->quantity;

                $transactionDetail->save();
                $item->delete();
            }

        } catch (Exception $e) {
            throw $e;
        }

        return 'success';
    }

    public function getUserTransaction() 
    {
        try {
            $user = Auth::User();

            $transactions = Transaction::query()
            ->where('user_id', '=', $user['user_id'])
            ->get();

        } catch (Exception $e) {
            throw $e;
        }

        return $transactions;
    }

    public function getTransactionDetails($transaction_id)
    {
        try {
            $details = TransactionDetail::query()
            ->join('phizza', 'tr_transaction_detail.phizza_id', '=', 'phizza.phizza_id')
            ->where('transaction_id', '=', $transaction_id)
            ->get();

        } catch (Exception $e) {
            throw $e;
        }

        return $details;
    }
}

?>