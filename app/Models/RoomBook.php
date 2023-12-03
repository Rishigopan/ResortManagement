<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBook extends Model
{
    use HasFactory;

   protected $table = 'roombooking';
    protected $fillable = ['id', 'op_id', 'user_id','RoomType_id','Room_id','acnonac', 'Rent', 'fromdate', 'Todate','remarks'];
}
