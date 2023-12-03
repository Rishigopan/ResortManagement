<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpConsultation extends Model
{
    use HasFactory;
    protected $table = 'ip_consultations';
    protected $fillable = ['id','ip_consultation_no', 'consultation_date', 'ip_id',
                            'doctor_id', 'token_no','consultation_fees',
                            'registration_fees','total','mode_of_payment_id','branch_id','ip_consultation_bill_no'];
}
