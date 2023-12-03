<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $fillable = ['room_no', 'room_type_id', 'floor_id', 'rent_ac', 'rent_non_ac','is_maintenence'];
}
