<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    //
    protected $table = 'comments';
    protected $fillable = ['comm_name', 'comm_content', 'product_id'];
    public $timestamps = true;

    public function replies()
    {
        return $this->hasMany('App\ReplyComment');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public static function saveComment()
    {

        $comment = new Comment();
        $comment->comm_name = $comm_name;
        $comment->comm_content = $comm_content;
        $comment->product_id = $id;
        $comment->save();
        return $comment;
    }
}
