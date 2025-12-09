<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $casts = [
        'price' => 'double',
        'after_repair_value' => 'double',
        'annual_taxes' => 'double',
    ];

    public function getImages()
    {
        return $this->hasMany(PropertiesImage::class, 'property_id', 'id');
    }
    public function getMember()
    {
        return $this->hasOne(Member::class, 'id', 'member_id');
    }
    public function getOffers()
    {
        return $this->hasMany(Offer::class, 'property_id', 'id');
    }
    public function getJVPartners()
    {
        return $this->hasMany(JVPartner::class, 'property_id', 'id');
    }


    //mutator to convert comma values for pricing to double
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (double) str_replace(',', '', $value);
    }

    public function setAfterRepairValueAttribute($value)
    {
        $this->attributes['after_repair_value'] = (double) str_replace(',', '', $value);
    }

    public function setAnnualTaxesAttribute($value)
    {
        $this->attributes['annual_taxes'] = (double) str_replace(',', '', $value);
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 2, '.', ',');
    }
}
