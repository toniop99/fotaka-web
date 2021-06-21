<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Grade extends Model
{
    use HasFactory;

    protected $table = "schools_classes";

    protected $fillable = [
        'school_id',
        'orla_id',
        'name',
        'promotion',
        'students_count',
        'teachers_count',
        'education_period',
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function orla(): HasOne {
        return $this->hasOne(Orla::class);
    }
}
