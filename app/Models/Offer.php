<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table = 'offers';

    protected $casts = [
        'offer_price' => 'double',
        'earnest_deposit' => 'double'
    ];

    //relations
    public function getMember()
    {
        return $this->hasOne(Member::class, 'id', 'buyer_id');
    }
    public function getProperty()
    {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }
    public function getOffersDocument()
    {
        return $this->hasMany(OfferDocument::class, 'offer_id', 'id');
    }


    //mutator
    //to convert comma values for pricing to double
    public function setOfferPriceAttribute($value)
    {
        $this->attributes['offer_price'] = (double) str_replace(',', '', $value);
    }

    public function setEarnestDepositAttribute($value)
    {
        $this->attributes['earnest_deposit'] = (double) str_replace(',', '', $value);
    }


    //accessors
    public function getOfferPriceAttribute($value)
    {
        return number_format($value, 2, '.', ',');
    }
    public function getEarnestDepositAttribute($value)
    {
        return number_format($value, 2, '.', ',');
    }
}
