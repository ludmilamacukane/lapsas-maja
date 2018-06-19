<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $attributes = ['enabled' => true];

    public function productOrders() {
        return $this->hasMany('App\ProductOrder');
    }
}
