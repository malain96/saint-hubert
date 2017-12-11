<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    //non editable fields
    protected $guarded = ['id'];

    /**
    * Return the city
    * @return City
    */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
