<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'product_variants';

    public $timestamps = false;

    protected $fillable = ['*'];

    public function detail()
    {
        return $this->belongsTo('App\Detail','detail_id', 'id');
    }

    public function productType()
    {
        return $this->belongsTo('App\ProductType','product_type_id', 'id');
    }
}
