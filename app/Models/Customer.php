<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class);

    }

    public function shalwarKameez()
    {
        return $this->hasOne(Cus_kameezshalwar::class);

    }

    public function kot()
    {
        return $this->hasOne(Cus_kot::class);

    }

    public function patloon()
    {
        return $this->hasOne(Cus_patloon::class);

    }

    public function shirt()
    {
        return $this->hasOne(Cus_shirt::class);

    }




}
