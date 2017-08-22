<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\ProductRequest;
use Auth;
use Input;

class Product extends Model
{

    //
    protected $table = 'products';
    protected $fillable = ['name', 'alias', 'price', 'intro', 'keywords', 'description', 'content', 'image', 'user_id', 'cate_id'];
    public $timestamps = true;

    public function cate()
    {
        return $this->belongsTo('App\Cate');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product_images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function customer()
    {
        return $this->belongsToMany('App\Customer', 'product_customers')->withPivot("qty");
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    //////-------------------------
    public static function loadProducts()
    {
        $data = Product::select("*")
            ->orderBy('id', 'DESC')
            ->get()
            ->toArray();
        return $data;
    }

    public static function getByID($id)
    {
        $product = Product::find($id);
        return $product;
    }

    public static function getLoadProduct($id = null)
    {
        $cate = Cate::loadCategories();
        return $cate;
    }

    public static function postLoadProduct(ProductRequest $request)
    {
        $file_name = $request->file('fImages')->getClientOriginalName();//lấy ảnh từ client
        $product = new Product();
        $product->name = $request->txtName;
        $product->alias = changeTitle($request->txtName);
        $product->price = $request->txtPrice;
        $product->intro = $request->txtIntro;
        $product->content = $request->txtContent;
        $product->image = $file_name;
        $product->keywords = $request->txtKeywords;
        $product->description = $request->txtDescription;
        $product->user_id = Auth::user()->id;
        $product->cate_id = $request->sltParent;
        $request->file('fImages')->move('resources/upload/', $file_name);
        $product->save();
        //-----
        if (Input::hasFile('fProductDetail')) {
            foreach (Input::file('fProductDetail') as $file) {
                $product_img = new ProductImage();
                if (isset($file)) {
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $product->id;
                    $file->move('resources/upload/detail/', $file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        return $product;
    }
}
