<?php

namespace App\Models;

use Exception;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Msuser extends Authenticatable
{
    protected $table      = "ms_user";
    protected $primaryKey = "user_id";
    
    protected $fillable = array(
        'username',
        'email',
        'pass',
        'confirm_pass',
        'address',
        'phone_number',
        'gender',
        'role_id'
    );

    public function getAuthPassword()
    {
      return $this->pass;
    }
}

?>