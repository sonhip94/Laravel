<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProductImage;
//use Illuminate\Http\Request;
use App\Cate;
use App\Product;
use Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Input, Cart;
use File;
use Request;


class ProductController extends Controller
{

    //
    public function getList()
    {
        $data = Product::loadProducts();
        return view('admin.product.list', compact('data'));
    }

    public function getAdd()
    {
        $cate = Product::getLoadProduct();
        return view('admin.product.add', compact('cate'));
    }

    public function postAdd(ProductRequest $request)
    {
        Product::postLoadProduct($request);
        return redirect()->route('admin.product.list')
            ->with([
                'flash_message' => 'Thêm thành công sản phẩm!',
                'flash_level' => 'success'
            ]);
    }

    public function getDelete($id)
    {
        $product_detail = Product::find($id)->product_images->toArray();
        foreach ($product_detail as $item) {
            File::delete('resources/upload/detail/' . $item["image"]);
        }
        $product = Product::find($id);
        File::delete("resources/upload/" . $product->image);
        $product->delete($id);
        return redirect()->route('admin.product.list')
            ->with([
                'flash_message' => 'Xóa thành công sản phẩm!',
                'flash_level' => 'success'
            ]);
    }

    public function getEdit($id)
    {
        $cate = Cate::loadCategories();
        $product = Product::getByID($id);
        $product_image = $product->product_images->take(5)->toArray();
        return view("admin.product.edit", compact("cate", "product", "product_image"));

    }

    public function postEdit($id)
    {
        $product = Product::find($id);
        //ảnh sản phẩm
        $img_current = 'resources/upload/' . Request::input("img_current");
        if (!empty(Request::file("fImages"))) {
            $file_name = Request::file("fImages")->getClientOriginalName();
            $product->image = $file_name;
            Request::file("fImages")->move("resources/upload/", $file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }

        } else {
            echo "không có";
        }
        //------
        $product->name = Request::input('txtName');
        $product->alias = changeTitle(Request::input('txtName'));
        $product->price = Request::input('txtPrice');
        $product->intro = Request::input('txtIntro');
        $product->content = Request::input('txtContent');
        $product->keywords = Request::input('txtKeywords');
        $product->description = Request::input('txtDescription');
        $product->user_id = Auth::user()->id;
        $product->cate_id = Request::input('sltParent');
        $product->save();
        //xử lý ảnh detail
        if (!empty(Request::file("fEditDetail"))) {
            foreach (Request::file("fEditDetail") as $item) {
                $product_image = new ProductImage();
                if (isset($item)) {
                    $product_image->image = $item->getClientOriginalName();
                    $product_image->product_id = $id;
                    $item->move('resources/upload/detail/', $item->getClientOriginalName());
                }
                $product_image->save();
            }
        }
        //-----------------
        return redirect()->route('admin.product.list')
            ->with([
                'flash_message' => 'Sửa thành công!',
                'flash_level' => 'success'
            ]);
    }

    public function getDelImg($id)
    {
        if (Request::ajax()) {
            $idImage = (int)Request::get('idImage'); //Lấy ra ID image (truyền từ client)
            $image_detail = ProductImage::find($idImage); //Lấy ra image bằng id vừa truyền qua
            if (!empty($image_detail)) {//kiểm tra nếu image ko rỗng
                $img = 'resources/upload/detail/' . $image_detail->image;//lấy ra đường dẫn ảnh
                if (File::exists($img)) { //Nếu tồn tại đường dẫn
                    File::delete($img);// remove nó
                }
                $image_detail->delete();//remove trong db
            }
            return "OK";
        }
    }
    //frontend
    public function searchAjax()
    {
        if (Request::ajax()) {
            $k = Request::get("k");
            $keyword = '%' . $k . '%';
            $value = DB::table('products')
                ->where('id', 'LIKE', $keyword)
                ->orWhere('name', 'LIKE', $keyword)
                ->orWhere('price', 'LIKE', $keyword)
                ->orWhere('intro', 'LIKE', $keyword)
                ->orWhere('content', 'LIKE', $keyword)
                ->take(3)->orderBy('id', 'DESC')->get();
            foreach ($value as $item) {
                echo "<li id='results'><a style='color:red;' href='" . url('d', [$item->id, $item->alias]) . "'>" . $item->name . "</a><img style='width:9%;' src='" . asset('resources/upload/' . $item->image) . "' /></li>";
            }
        }

    }

    public function getSearch()
    {

        $word = Input::get("keywords");
        $keyword = '%' . $word . '%';
        $value = DB::table('products')
            ->where('id', 'LIKE', $keyword)
            ->orWhere('name', 'LIKE', $keyword)
            ->orWhere('price', 'LIKE', $keyword)
            ->orWhere('intro', 'LIKE', $keyword)
            ->orWhere('content', 'LIKE', $keyword)
            ->paginate(12)->setPath("");
        $pagination = $value->appends(array(
            'keywords' => Input::get('keywords')
        ));
        return view("user.pages.search", compact("value", "word"));
    }
    //chi tiết sản phẩm
    public function chitiet($id)
    {
        $product_detail = DB::table("products")->where('id', $id)->first();
        $image = DB::table("product_images")->where('product_id', $id)->take(3)->get();
        $rela_product = DB::table("products")->where('cate_id', $product_detail->cate_id)->where('id', '<>', $id)->take(4)->get();

        $comment = DB::table("comments")->where("product_id", $id)->get();
        $commentID = DB::table("comments")->select("id")->where("product_id", $id)->get();
        $commentCount = DB::table("comments")->where("product_id", $id)->count();

        return view("user.pages.detail", compact("product_detail", "image", "rela_product", "comment", "", "commentCount"));
    }

    public function muahang($id)
    {
        $product_buy = DB::table("products")->where('id', $id)->first();
        Cart::add(array(
            'id' => $id,
            'name' => $product_buy->name,
            'qty' => 1,
            'price' => $product_buy->price,
            'options' => array(
                'img' => $product_buy->image
            )
        ));

        return redirect()->route("giohang");
    }

    public function giohang()
    {
        $content = Cart::content();
        $total = Cart::total();
        return view("user.pages.shopping", compact("content", "total"));
    }
    //xóa giỏ hàng
    public function xoasanpham($id)
    {
        Cart::remove($id);
        return redirect()->route("giohang");
    }

    public function capnhat()
    {
        if (Request::ajax()) {
            $rowid = Request::get('id');
            $qty = Request::get("qty");
            Cart::update($rowid, $qty);
            echo "OK";
        }
    }


}
