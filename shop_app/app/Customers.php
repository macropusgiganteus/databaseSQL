<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{

    protected $table = 'customers';
    protected $primaryKey = 'customerNumber';
    protected $fillable = [
        'customerNumber',
        'customerName',
        'contactLastName',
        'contactFirstName',
        'phone',
        'addressLine1',
        'addressLine2',
        'city',
        'state',
        'postalCode',
        'country',
        'salesRepEmployeeNumber',
        'creditLimit'];

}
