<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $table = 'consultations';
    protected $fillable = ['id','consultation_no', 'consultation_date', 'op_id',
                            'doctor_id', 'token_no', 'consultation_status','consultation_fees',
                            'registration_fees','total','mode_of_payment_id','branch_id','consultation_bill_no'];
}
