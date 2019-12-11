<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $keyType = 'string';
    protected $primaryKey = 'productCode';
    protected $table = 'products';
    protected $fillable = ['productCode', 'productName', 'productLine', 'productScale', 'productVendor', 'productDescription', 'quantityInStock', 'buyPrice', 'MSRP'];
    
}
