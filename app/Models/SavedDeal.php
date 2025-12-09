<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedDeal extends Model
{
    use HasFactory;
    protected $table = 'saved_deals';

    public function getMember()
    {
        return $this->hasOne(Member::class, 'id', 'member_id');
    }
    public function getProperty()
    {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }
}
