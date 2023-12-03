<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRecordTable extends Model
{
    use HasFactory;
    protected $table = 'patient_record_tables';
    protected $fillable = ['id', 'op_id', 'date', 'records'];
}
