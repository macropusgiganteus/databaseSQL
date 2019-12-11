<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $keyType = 'int';
    protected $primaryKey = 'orderNumber';
    protected $table = 'orderdetails';
    protected $fillable = ['orderNumber', 'productCode', 'quantityOrdered','priceEach','orderLineNumber'];
}
