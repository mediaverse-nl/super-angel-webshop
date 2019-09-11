<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'product_orders';

    public $timestamps = true;

    protected $fillable = ['*'];

    protected $dates = ['created_at', 'updated_at'];

    public function order()
    {
        return $this->belongsTo('App\Order','order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id', 'id');
    }
}
