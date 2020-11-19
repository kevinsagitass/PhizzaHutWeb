<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "tr_transaction";
    protected $primaryKey = "transaction_id";
}
