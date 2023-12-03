<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeOfPay extends Model
{
    use HasFactory;
    protected $table = 'mode_of_pays';
    protected $fillable = ['name','id'];
}
