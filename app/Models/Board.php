<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'user_id',
        'board_id',
        'name',
        'description',
        'privacy',
        'follower_count',
        'collaborator_count',
        'pin_count',
        'image_cover_url',
        'created_at_board',
        'updated_at_board',
    ];

    public function pins()
    {
        return $this->hasMany(Pin::class);
    }
}
