<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'product_details';

    public $timestamps = false;

    protected $fillable = ['*'];

    public function detail()
    {
        return $this->belongsTo('App\Detail','detail_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id', 'id');
    }
}
