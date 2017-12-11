<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{

    //non editable fields
    protected $guarded = ['id'];

}
