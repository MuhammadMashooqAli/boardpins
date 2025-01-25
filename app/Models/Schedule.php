<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'pins_per_day',
        'time_from',
        'time_to',
        'status'
    ];

    /**
     * Relationship: A schedule belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
