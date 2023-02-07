<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;



class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    public $fillable = ['supplier_id', 'supplier_name', 'supplier_short_name', 'supplier_address'];




}

