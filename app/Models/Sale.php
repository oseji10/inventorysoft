<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sale';
    public $fillable = ['transaction_id', 'product_id', 'quantity', 'warehouse_id', 'initiated_by'];


}
