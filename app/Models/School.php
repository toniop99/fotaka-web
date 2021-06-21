<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'direction',
        'master_password',
        'folder_path'
    ];

    protected $hidden = [
    ];

    public function classes(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
}
