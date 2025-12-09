<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertySold extends Model
{
    use HasFactory;

    public function getBuyer()
    {
        return $this->hasOne(Member::class, 'id', 'buyer_id');
    }
    public function getLister()
    {
        return $this->hasOne(Member::class, 'id', 'lister_id');
    }
    public function getProperty()
    {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }
    public function getOffer()
    {
        return $this->hasOne(OfferDocument::class, 'id', 'offer_id');
    }
}
