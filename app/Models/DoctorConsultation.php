<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorConsultation extends Model
{
    use HasFactory;
    protected $table = 'doctor_consultations';
    protected $fillable = ['doctor_id','op_consultation_fees','ip_consultation_fees',
                            'op_no_fee_days','ip_no_fee_days'];
}
