<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    //
    protected $table = 'pizza';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
