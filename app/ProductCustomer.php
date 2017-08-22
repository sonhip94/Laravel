<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCustomer extends Model {

	//
    protected $table = 'product_customers';
    protected $fillable = ['product_id','customer_id','qty'];

}
