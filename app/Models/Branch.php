<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable = ['branch_name','code','permanent_address','permanent_mobile_no','permanent_lan_line_no','permanent_email','permanent_post_office'
    ,'permanent_lan_mark','communication_address','communication_mobile_no','communication_lan_line_no','communication_email','communication_post_office',
    'communication_lan_mark','gst_no','pan_no','website','country','state','location','headding','subheading'];
}
