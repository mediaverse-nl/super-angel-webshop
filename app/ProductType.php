<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ProductType extends Model
{
    use Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'product_types';

    public $timestamps = false;

    protected $fillable = ['ean', 'sku', 'status', 'stock', 'price', 'product_id'];

    protected $appends = ['selling_price'];

    public function product()
    {
        return $this->belongsTo('App\Product','product_id', 'id');
    }

    public function productVariants()
    {
        return $this->hasMany('App\ProductVariants','product_type_id', 'id');
    }

    public function reduceStock(int $amount)
    {
        $stock = $this->stock - $amount;

        $this->where('id', '=', $this->id)->update(['stock' => $stock]);
    }

    public function increaseStock(int $amount)
    {
        $stock = $this->stock + $amount;

        $this->where('id', '=', $this->id)->update(['stock' => $stock]);
    }

    public function taxPrice()
    {
        $bedrag_inc = $this->price;
        $btw = 21;

        return number_format($bedrag_inc/(100+$btw)*100, 2);
    }

    public function getProductPriceAttribute()
    {
        return '&euro; '.number_format($this->price, 2);
    }

//    public function getDiscountPri ceAttribute()
//    {
//        return number_format($this->price, 2);
//    }

    public function getSellingPriceAttribute()
    {
        return   $this->price - $this->product->discount ;
//        return number_format($this->price - $this->product->discount, 2);
    }
}
