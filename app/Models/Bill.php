<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bill extends Model
{
    use HasFactory;
    use TraitUuid;

    protected $table = 'bills';

    protected $fillable = [
        'id',
        'store_id',
        'value',
    ];

    public $timestamps = true;

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
