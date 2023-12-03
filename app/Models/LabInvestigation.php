<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabInvestigation extends Model
{
    use HasFactory;
    protected $table = 'lab_investigations';
    protected $fillable = ['name','cost','remarks'];
}
