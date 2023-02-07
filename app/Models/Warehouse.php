<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;



class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'warehouse';
    public $fillable = ['warehouse_id', 'warehouse_name', 'warehouse_short_name', 'warehouse_address', 'warehouse_email', 'warehouse_phone', 'warehouse_manager'];




}

