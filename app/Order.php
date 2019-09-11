<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    protected $table = 'order';

    public $timestamps = true;

    protected $fillable = ['payment_id', 'status', 'payment_method'];

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->hasMany('App\User', 'order_id', 'id');
    }

    public function productOrders()
    {
        return $this->hasMany('App\ProductOrder', 'order_id', 'id');
    }
}
