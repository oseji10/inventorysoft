<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;



class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $fillable = ['product_id','product_name', 'description', 'manufacturer_id', 'product_type_id', 'landed_cost', 'selling_price', 'added_by'];
    public $incrementing = false; 
    public $keyType = 'string';
    protected $primaryKey = 'product_id';



}

