<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;



class StockTransfer extends Model
{
    use HasFactory;
    protected $table = 'stock_transfer_history';
    public $fillable = ['stock_id','initial_stock_id', 'received_from', 'sent_to', 'quantity_received', 'quantity_dispatched', 'sent_by', 'received_by'];
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

/**
 * Get the user associated with the StockTransfer
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function sent_to_list(): HasOne
{
    return $this->hasOne(Warehouse::class, 'warehouse_id', 'sent_to');
}

}

