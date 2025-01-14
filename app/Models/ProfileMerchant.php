<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileMerchant extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
