<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JVPartner extends Model
{
    use HasFactory;
    protected $table = 'j_v_partners';
    public function getMember()
    {
        return $this->hasOne(Member::class, 'id', 'member_id');
    }
    public function getLister()
    {
        return $this->hasOne(Member::class, 'id', 'lister_id');
    }
    public function getProperty()
    {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }
}
