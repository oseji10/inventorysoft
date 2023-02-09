<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;



class Manufacturer extends Model
{
    use HasFactory;

    protected $table = 'manufacturer';
    public $fillable = ['manufacturer_id', 'manufacturer_name', 'manufacturer_short_name', 'manufacturer_address'];
    public $incrementing = false; 
    public $keyType = 'string';
    protected $primaryKey = 'manufacturer_id';


}

