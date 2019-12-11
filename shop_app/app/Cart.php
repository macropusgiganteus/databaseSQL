<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $keyType = 'string';
    protected $primaryKey = 'productCode';
    protected $fillable = ['productName','customerNumber', 'productCode', 'quantityOrdered', 'priceEach'];
}
