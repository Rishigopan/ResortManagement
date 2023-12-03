<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IP extends Model
{
    use HasFactory;
    protected $table = 'ips';
    protected $fillable = ['id','op_id','ip_no', 'RoomType_id','Room_id','consultation_id','ip_date', 'name', 'age', 'gender', 'full_address',
        'phone_no', 'mobile_no', 'occupation', 'marital_status', 'local_address', 'local_phone_no',
        'local_mobile_no','branch_id'];
}
