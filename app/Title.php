<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{

    //non editable fields
    protected $guarded = ['id'];

}
