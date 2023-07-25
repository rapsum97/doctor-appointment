<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Prescription extends Model
{
    protected $guarded = [];

    /**
     * Get the user that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor() {
        return $this->belongsTo(User::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
