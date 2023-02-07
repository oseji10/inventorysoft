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


/**
 * Get the user associated with the Consumer
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function state_of_residence(): HasOne
{
    return $this->hasOne(State::class, 'state_code', 'state_code');
}

/**
 * Get the user associated with the Consumer
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function state_of_origin(): HasOne
{
    return $this->hasOne(State::class, 'state_code', 'state_of_birth');
}


/**
 * Get the user associated with the Consumer
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function tier_info(): HasOne
{
    return $this->hasOne(Tier::class, 'code', 'tier_id');
}


/**
 * Get the user associated with the Consumer
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function lga_info(): HasOne
{
    return $this->hasOne(Lga::class, 'lga_code', 'lga');
}


/**
 * Get the user associated with the Consumer
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function country_info(): HasOne
{
    return $this->hasOne(Country::class, 'country_code', 'country');
}

public function country_of_origin(): HasOne
{
    return $this->hasOne(Country::class, 'country_code', 'country_of_birth');
}

}

