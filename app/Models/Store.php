<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
    use HasFactory;
    use TraitUuid;

    protected $fillable = [
        'id',
        'name',
    ];

    public function bills(): HasMany
    {
        return $this->hasMany(Bill::class);
    }
}
