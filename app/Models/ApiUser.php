<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApiUser extends Model
{
    use HasFactory;
    use TraitUuid;

    protected $table = 'api_user';

    protected $fillable = [
        'token',
        'active',
        'write',
        'read'
    ];
}
