<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cus_kot extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    public function modified_user()
    {
        return $this->hasOne(User::class, 'modified_user_id');

    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id');

    }

}
