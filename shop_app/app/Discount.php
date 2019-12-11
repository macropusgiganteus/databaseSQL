<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';
    protected $fillable = ['PromotionCode','Count','EXP_date','DiscountAmount','Create_date'];
}