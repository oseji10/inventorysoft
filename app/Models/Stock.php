<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;



class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';
    public $fillable = ['stock_id','manufacturer_id', 'supplier_id', 'batch_number', 'invoice_number', 'product_id', 'warehouse_id', 'quantity_received', 'quantity_sold', 'quantity_expired', 'quantity_transferred', 'added_by'];
    public $incrementing = false; 
    public $keyType = 'string';
    protected $primaryKey = 'stock_id';

/**
 * Get the user associated with the Stock
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function manufacturer_list(): HasOne
{
    return $this->hasOne(Manufacturer::class, 'manufacturer_id', 'manufacturer_id');
}

/**
 * Get the user associated with the Stock
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function product_list(): HasOne
{
    return $this->hasOne(Product::class, 'product_id', 'product_id');
}


/**
 * Get the user associated with the Stock
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function warehouse_list(): HasOne
{
    return $this->hasOne(Warehouse::class, 'warehouse_id', 'warehouse_id');
}

}

