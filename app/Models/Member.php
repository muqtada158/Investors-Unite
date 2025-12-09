<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Member extends Model implements Authenticatable
{
    use HasFactory;
    protected $guard = "member";

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    // Your model implementation

    // Implement the required methods from Authenticatable contract
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getPermissions()
    {
        return $this->hasOne(NotificationPermissions::class, 'id', 'member_id');
    }

    public function moneyLender()
    {
        return $this->hasOne(MoneyLender::class);
    }
}
