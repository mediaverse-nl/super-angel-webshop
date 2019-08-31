<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'properties';

    public $timestamps = false;

    protected $fillable = ['*'];

    public function details()
    {
        return $this->hasMany('App\Detail','property_id', 'id');
    }
}
