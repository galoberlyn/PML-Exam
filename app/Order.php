<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = "orders";
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
