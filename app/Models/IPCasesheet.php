<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPCasesheet extends Model
{
    use HasFactory;
    protected $table = 'i_p_casesheets';
    protected $fillable = ['date', 'ip_no_id', 'consultation_id', 'morning_session', 'afternoon_session',
                         'vital_dates','evng_staff_id','mrng_staff_id','ip_casesheet_bill_no','treatment_cost'];
}
