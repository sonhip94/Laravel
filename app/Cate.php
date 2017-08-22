<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Requests\CateRequest;
use App\Http\Requests\EditCateRequest;

class Cate extends Model
{

    //
    protected $table = 'cates';
    protected $fillable = ['name', 'alias', 'order', 'parent_id', 'keywords', 'description'];

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public static function getByID($id)
    {
        $cate = Cate::find($id);
        return $cate;
    }


    public static function loadCategories()
    {
        $data = Cate::select("*")
            ->orderBy('id', 'DESC')
            ->get()
            ->toArray();
        return $data;
    }

    public static function getLoadCate()
    {
        $parent = Cate::select('id', 'name', 'parent_id')
            ->get()
            ->toArray();
        return $parent;
    }

    public static function postEditCate(EditCateRequest $request, $id)
    {

        $cate = Cate::find($id);
        $cate->name = $request->txtCateName;
        $cate->alias = changeTitle($request->txtCateName);
        $cate->order = $request->txtOrder;
        $cate->parent_id = $request->sltParent;
        $cate->keywords = $request->txtKeywords;
        $cate->description = $request->txtDescription;
        $cate->save();
    }

    public static function postAddCate(CateRequest $request)
    {
        $cate = new Cate();
        $cate->name = $request->txtCateName;
        $cate->alias = changeTitle($request->txtCateName);
        $cate->order = $request->txtOrder;
        $cate->parent_id = $request->sltParent;
        $cate->keywords = $request->txtKeywords;
        $cate->description = $request->txtDescription;
        $cate->save();
    }

}
