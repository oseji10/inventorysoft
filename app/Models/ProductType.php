<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;



class ProductType extends Model
{
    use HasFactory;
    protected $table = 'product_type';
    public $fillable = ['product_type_name'];




}

