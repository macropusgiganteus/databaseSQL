<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    protected $table = 'instock';
    protected $fillable=['productID','amount'];
}
