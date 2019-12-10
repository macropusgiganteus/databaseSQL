<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $keyType = 'int';
    protected $primaryKey = 'orderNumber';
    protected $table = 'orders';
    protected $fillable = ['orderNumber', 'orderDate', 'requiredDate', 'shippedDate', 'status', 'comments'];
}
