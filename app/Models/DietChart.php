<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietChart extends Model
{
    use HasFactory;
    protected $table = 'diet_charts';
    protected $fillable = ['op_no_id','consultation_id','date','time','diet_id','diet_cost'];
}
