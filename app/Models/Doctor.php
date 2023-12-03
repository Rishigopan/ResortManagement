<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = ['name', 'email', 'mobile_no', 'department_id', 'password', 'confirm_password','remarks','branch_id','gender'];
}
