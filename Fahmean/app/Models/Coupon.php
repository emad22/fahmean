<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'type', 'value', 'expires_at', 'usage_limit', 'used_count', 'status'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
