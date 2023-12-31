<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    function room()
    {
        return $this->hasMany(Room::class, 'room_type_id');
    }
}
