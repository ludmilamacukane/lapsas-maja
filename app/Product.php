<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productOrders() {
        return $this->hasMany('App\ProductOrder');
    }
}
