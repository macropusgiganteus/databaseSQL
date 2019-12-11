<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $keyType = 'string';
    protected $primaryKey = 'checkNumber';
    protected $table = 'payments';
    protected $fillable = ['customerNumber', 'checkNumber', 'paymentDate', 'amount','point'];
}
