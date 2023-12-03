<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseSheet extends Model
{
    use HasFactory;
    protected $table = 'case_sheets';
    protected $fillable = ['id','date', 'op_no_id', 'consultation_id',
        'morning_session', 'afternoon_session', 'vital_dates','evng_staff_id','mrng_staff_id','treatment_cost','casesheet_bill_no'];
}
