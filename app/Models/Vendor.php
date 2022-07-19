<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Authenticatable
{
    use HasFactory;

    protected $tale = 'vendors';

    public function user(){
        return $this->belongTo('App\Models\User');
    }
}
