<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hunter extends Model
{

    //allow mass assign
    protected $fillable = ['title_id', 'firstName', 'lastName', 'active', 'address_id'];

    /**
    * Return active hunters
    * @var object
    * @return array
    */
    public function scopeIsActive($query)
    {
        return $query->where('active', 1);
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
