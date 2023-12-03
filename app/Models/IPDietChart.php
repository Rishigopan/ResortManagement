<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPDietChart extends Model
{
    use HasFactory;
    protected $table = 'i_p_diet_charts';
    protected $fillable = ['ip_no_id','consultation_id','date','time','diet_id','diet_cost'];
}
