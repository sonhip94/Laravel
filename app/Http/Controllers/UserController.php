<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{

    //
    public function getList()
    {
        $user = User::orderBy('id', 'DESC')->get()->toArray();
        return view("admin.user.list", compact("user"));
    }

    public function getDelete($id)
    {
        $user_current = Auth::user()->level;//level user đang đăng nhập hiện tại
        $user = User::find($id); //$id để xóa
        if ((Auth::user()->level != 1 && (($user['level'] == 1) || ($user['level'] == 2 && (Auth::user()->id != $id)) || (Auth::user()->level == 0 && Auth::user()->id != $id)))) {
            return redirect()->route("admin.user.list")->with([
                'flash_level' => 'danger',
                'flash_message' => 'Không xóa được'
            ]);

        } else {
            $user->delete($id);
            return redirect()->route("admin.user.list")->with([
                'flash_level' => 'success',
                'flash_message' => 'Xóa thành công'
            ]);
        }
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        if ((Auth::user()->level != 1 && (($user['level'] == 1) || ($user['level'] == 2 && (Auth::user()->id != $id)) || (Auth::user()->level == 0 && Auth::user()->id != $id)))) {
            return redirect()->route("admin.user.list")->with([
                'flash_level' => 'danger',
                'flash_message' => 'Không được sửa'
            ]);
        }

        return view("admin/user/edit", compact("user", "id"));
    }

    public function postEdit($id, Request $request)
    {
        $user = User::find($id);
        if ($request->input('txtPass')) {
            $this->validate('txtPass',
                [
                    'txtRePass' => 'same:txtPass'
                ],
                [
                    'txtRePass.same' => 'Mật khẩu nhập lại không trùng, yêu cầu nhập lại'
                ]);
            $pass = $request->input('txtPass');
            $user->password = Hask::make($pass);
        }
        $user->level = $request->input('rdoLevel');
        $user->username = $request->input("txtUser");
        $user->remember_token = $request->input('_token');
        $user->save();
        return redirect()->route("admin.user.list")->with([
            'flash_level' => 'success',
            'flash_message' => 'Sửa thành công'
        ]);
    }
}
