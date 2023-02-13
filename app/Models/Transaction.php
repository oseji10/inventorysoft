<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    public $fillable = ['customer_id', 'transaction_id', 'payment_mode', 'payment_status', 'amount_payable', 'amount_paid', 'sold_by', 'bought_by'];


}
