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

class WelcomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $product = DB::table("products")->orderByRaw("RAND()")->take(4)->get();
        $product_spec = DB::table("products")->orderBy('id', 'DESC')->skip(0)->take(4)->get();
        return view("user.pages.home", compact("product", 'product_spec'));
    }

    public function getLienhe()
    {
        return view('user.pages.contact');
    }

    public function postLienhe(Request $request)
    {
        $data = [
            'hoten' => $request->name,
            'email' => $request->email,
            'tinnhan' => $request->message
        ];
        $email = $data['email'];
        $hoten = $data['hoten'];

        Mail::send('emails.blanks', $data, function ($message) {
            $message->from('phuonganhpham2808@gmail.com', 'Pisces Girl');
            $message->to($email, $hoten)->subject('Pisces Girl chào bạn');
        });
        echo "<script>
                alert('Cảm ơn bạn đã góp ý, Chúng tôi sẽ liên hệ với bạn sớm');
                window.location = '" . url('/') . "'
                </script>";
    }
}