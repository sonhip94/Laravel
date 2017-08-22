<?php namespace App\Http\Controllers;

use App\Comment;
use App\Customer;
use App\Http\Requests\CartRequest;
use App\Product;
use App\ProductCustomer;
use App\ProductImage;
use App\ReplyComment;
use DB, Mail, Cart;
use App\Cate;
use Request;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    public function getList()
    {
        $comments = DB::table("comments")->get();
        return view("admin.comments.list", compact("comments"));
    }

    public function getComment($id)
    {
        $reply_comments = Comment::find($id)->replies()->get()->toArray();
        $comment = Comment::find($id)->first()->toArray();
        return view("admin.comments.detail", compact("reply_comments","comment"));

    }

    public function getDelete($id)
    {
        $comment_delete = Comment::find($id);
        $comment_delete->delete($id);
        return redirect()->route("admin.comments.list")->with([
            'flash_message' => 'Xóa thành công comment!',
            'flash_level' => 'success'
        ]);;
    }

    public function getDeleteReply($id)
    {
        $reply_comment = ReplyComment::find($id);
        $reply_comment->delete($id);
        return redirect()->route("admin.comments.list")->with([
            'flash_message' => 'Xóa thành công comment!',
            'flash_level' => 'success'
        ]);;
    }
    public function comment()
    {
        if (Request::ajax()) {
            $comm_name = Request::get("comm_name");
            $comm_content = Request::get("comm_content");
            $id = Request::get("product_id");

            $comment = new Comment();
            $comment->comm_name = $comm_name;
            $comment->comm_content = $comm_content;
            $comment->product_id = $id;
            $comment->save();

            return response()->json($comment);
        }
    }
    public function reply()
    {
        if (Request::ajax()) {
            $reply_name = Request::get("reply_name");
            $reply_content = Request::get("reply_content");
            $id = Request::get("comm_id");

            $reply = new ReplyComment();
            $reply->reply_name = $reply_name;
            $reply->reply_content = $reply_content;
            $reply->comment_id = $id;
            $reply->save();

            return response()->json($reply);
        }
    }
}
