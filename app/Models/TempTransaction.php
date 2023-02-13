<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempTransaction extends Model
{
    use HasFactory;
    protected $table = 'temp_transaction';
    public $fillable = ['customer_id', 'product_id', 'quantity', 'warehouse_id', 'initiated_by'];


}
