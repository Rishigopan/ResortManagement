<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = ['name', 'item_category', 'unit', 'selling_price', 'mrp', 'gst', 'batch_no',
     'exp_date', 'opening_stock', 'reorder_level'];
}
