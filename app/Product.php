<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable, SoftDeletes;

    protected $table = 'products';

    public $timestamps = true;

    protected $fillable = ['*'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function reviews()
    {
        return $this->hasMany('App\Review', 'product_id', 'id');
    }

    public function productDetails()
    {
        return $this->hasMany('App\ProductDetail', 'product_id', 'id');
    }

    public function productOrders()
    {
        return $this->hasMany('App\ProductOrder', 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function taxPrice()
    {
        $bedrag_inc = $this->price();
        $btw = 21; // 0 - 6 - 19

//        echo 'Bedrag inclusief: '.$bedrag_inc .'<br>';

        return number_format($bedrag_inc/(100+$btw)*100, 2);
//        echo 'Bedrag exclusief: '.$bedrag_ex.'<br>'; //totaal

//        $bedrag_ex = round($bedrag_ex, 2); //totaal afgerond
//        echo 'Eindbedrag: '.$bedrag_ex.'<br>';
    }

    public function price()
    {
        return number_format($this->price - $this->discount, 2);
    }

    public function isNewProduct()
    {
        return $this->created_at > Carbon::now()->day(-45);
    }

    public function images($amount = '*')
    {
        $images = [];

        if(!empty($this->images)){
            $i = 1;
            foreach (explode(',', $this->images) as $image) {
                if ($amount == '*'){
                    $images[] = $image;
                }elseif ($i <= $amount){
                    $images[] = $image;
                }
                $i++;
            }
        }else{
            $images = null;
        }

        return $images;
    }

    public function thumbnail()
    {
        $getImage = $this->images(1)[0];
        if ($getImage == null){
            return '/images/geen-foto-beschikbaar.png';
        }

        return $getImage;
    }

    public function getSelectedDetail($detail)
    {
        $details = $this->productDetails()->get();

        foreach ($details as $d)
        {
            $property = $detail
                ->where('id', '=', $d->detail_id);

            if($property->count() > 0){
                return $property->first()->id;
            }
        }
    }

    public function getUrlTitleAttribute()
    {
//        function url($url) {
            $url = preg_replace('~[^\\pL0-9_]+~u', '-', $this->title);
            $url = trim($url, "-");
            $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
            $url = strtolower($url);
            $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
            return $url;
//        }

//        return str_replace(' ', '-',  rtrim($this->title));
    }

    public function getProductPriceAttribute()
    {
        return '&euro; '.number_format($this->price, 2);
    }

    public function getDiscountPriceAttribute()
    {
        return '&euro; '.number_format($this->price(), 2);
    }

    public function getProductNameAttribute()
    {
        return "{$this->id} - {$this->title} - {$this->region}";
    }
}
