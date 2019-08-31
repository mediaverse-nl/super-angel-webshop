<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'details';

    public $timestamps = false;

    protected $fillable = ['*'];

    public function property()
    {
        return $this->belongsTo('App\Property','property_id', 'id');
    }

    public function productDetails()
    {
        return $this->hasMany('App\ProductDetail','property_id', 'id');
    }
}
