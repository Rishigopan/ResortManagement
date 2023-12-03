<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpPatientRecord extends Model
{
    use HasFactory;
    protected $table = 'ip_patient_records';
    protected $fillable = ['id', 'ip_id', 'date', 'records'];
}
