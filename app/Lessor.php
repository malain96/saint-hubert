<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessor extends Model
{

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['title_id', 'firstName', 'lastName', 'active', 'address_id', 'hectares', 'price', 'validityDate'];


    /**
    * Return the valid leases
    * @var object
    * @return array
    */
    public function scopeIsValid($query)
    {
      return $query->where('validityDate', '>=', date("Y"));
    }

    /**
    * Return the leases which expire this year
    * @var object
    * @return array
    */
    public function scopeLastYear($query)
    {
      return $query->where('validityDate', '=', date("Y"));
    }

    /**
    * Return the Title
    * @return Title
    */
    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    /**
    * Return the address
    * @return Address
    */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

}
