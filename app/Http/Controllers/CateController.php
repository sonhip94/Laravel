<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Cate;

use App\Http\Requests\EditCateRequest;

class CateController extends Controller
{

    //
    public function getList()
    {

        $data = Cate::loadCategories();
        return view('admin.cate.list', compact('data'));
    }

    public function getAdd()
    {
        $parent = Cate::getLoadCate();
        return view('admin.cate.add', compact('parent'));
    }

    public function postAdd(CateRequest $request)
    {
        $cate = Cate::postAddCate($request);
        return redirect()->route('admin.cate.list')
            ->with([
                'flash_message' => 'Thêm thành công danh mục!',
                'flash_level' => 'success'
            ]);
    }

    public function getDelete($id)
    {
        $parent = Cate::where('parent_id', $id)->count();
        if ($parent == 0) {
            $cate = Cate::getByID($id);
            $cate->delete();
            return redirect()->route('admin.cate.list')
                ->with([
                    'flash_message' => 'Xóa thành công!',
                    'flash_level' => 'success'
                ]);
        } else {
            echo "<script>
                    alert('Xin lỗi! Bạn không thể xóa Mục này');
                    window.location = '";
            echo route('admin.cate.list');
            echo "'</script>";
        }

    }

    public function getEdit($id)
    {
        $data = Cate::getByID($id);
        $parent = Cate::loadCategories();
        return view('admin.cate.edit', compact('parent', 'data'));
    }

    public function postEdit(EditCateRequest $request, $id)
    {
//        $this->validate($request,
//            ["txtCateName" => "required"],
//            ["txtCateName.required" => "Không được để trống"]
//        );
//        $cate = Cate::find($id);
//        $cate->name = $request->txtCateName;
//        $cate->alias = changeTitle($request->txtCateName);
//        $cate->order = $request->txtOrder;
//        $cate->parent_id = $request->sltParent;
//        $cate->keywords = $request->txtKeywords;
//        $cate->description = $request->txtDescription;
//        $cate->save();
        Cate::postEditCate($request, $id);
        return redirect()->route('admin.cate.list')
            ->with([
                'flash_message' => 'Sửa thành công!',
                'flash_level' => 'success'
            ]);
    }
    //Frontend
    public function loaisanpham($id)
    {
        //lấy ra sản phẩm cùng chuyên mục
        $product_cate = DB::table("products")->where('cate_id', $id)->paginate(12);
        //In ra menu bên cạnh
        $cate = DB::table("cates")->where('id', $id)->first();//Lấy ra id
        $menu_cate = DB::table('cates')->where('parent_id', $cate->parent_id)->get();//in ra danh sách chuyên mục cùng cate cha


        //$best
        $best_seller = DB::table('products')->orderBy('id', 'ASC')->take(3)->get();
        //
        $lasted_product = DB::table('products')->orderBy('id', 'DESC')->take(3)->get();
        return view("user.pages.cate", compact("product_cate", "menu_cate", "cate", "lasted_product", "best_seller"));
    }
}
