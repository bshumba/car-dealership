<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarFeatures extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'car_id';

    protected $guarded = [
        // 'user_id'
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
