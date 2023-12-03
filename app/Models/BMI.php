<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BMI extends Model
{
    use HasFactory;
    protected $table = 'b_m_i_s';
    protected $fillable = ['id','date', 'op_no_id', 'consultation_id',
        'temp_mrng', 'temp_evng', 'b_P_mrng', 'b_P_evng',
         'weight', 'remarks'];
}
