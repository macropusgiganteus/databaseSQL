<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $keyType = 'int';
    protected $primaryKey = 'employeeNumber';
    protected $table = 'employees';
    protected $fillable = ['employeeNumber', 'firstName', 'lastName', 'extension', 'email', 'officeCode', 'reportsTo', 'jobTitle'];
}
