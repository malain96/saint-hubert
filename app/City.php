<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    //non editable fields
    protected $guarded = ['id'];

    /**
    * Return the postalCode
    * @return PostalCode
    */
    public function postalCode()
    {

        return $this->belongsTo(PostalCode::class);

    }

}
