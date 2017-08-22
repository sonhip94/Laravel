<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model {

	//
    protected $table = 'reply_comments';
    protected $fillable = ['reply_name','reply_content','comment_id'];
    public $timestamps = true;
    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
