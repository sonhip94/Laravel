<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    protected $table = 'customers';
    protected $fillable = ['name','address','phone','status','email','totalPrice','qty'];
    public $timestamps = true;
    public function product()
    {
        return $this->belongsToMany('App\Product','product_customers')->withPivot('qty');
    }
}
