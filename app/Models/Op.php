<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Op extends Model
{
    use HasFactory;
    protected $table = 'ops';
    protected $fillable = ['op_no', 'op_date', 'name', 'age', 'gender', 'full_address',
        'phone_no', 'mobile_no', 'occupation', 'marital_status', 'local_address', 'local_phone_no',
        'local_mobile_no','email','reg_no'];
}
