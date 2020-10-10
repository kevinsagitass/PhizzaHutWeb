<?php

namespace App\Models;

use Exception;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class Msuser extends Model
{
    protected $table      = "ms_user";
    protected $primaryKey = "id";
}

?>