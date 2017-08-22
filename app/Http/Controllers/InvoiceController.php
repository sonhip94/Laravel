<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\ProductCustomer;
use App\Http\Requests\CartRequest;

use DB, Mail, Cart;

class InvoiceController extends Controller
{

    public function getList()
    {
        $invoice = Customer::orderBy('id', 'DESC')->get()->toArray();
        return view("admin.invoice.list", compact("invoice"));

    }

    public function getInvoice($id)
    {
        $invoice = Customer::find($id)->product()->get();
        $customer = Customer::find($id);
        $total = Customer::find($id)->select("totalPrice")->first();
        return view("admin.invoice.detail", compact("invoice", "total", "customer"));
    }

    public function postInvoice($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->status = $request->rdoStatus;
        $customer->save();
        return redirect()->route("admin.invoice.list")->with([
            'flash_level' => 'success',
            'flash_message' => 'Cập nhật thành công'
        ]);
    }

    public function getCheckout()
    {
        $content = Cart::content();
        $total = Cart::total();
        return view("user.pages.checkout", compact("content", "total"));
    }

    public function postCheckout(CartRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->totalPrice = $request->totalPrice;
        $customer->save();

        $content = Cart::content();
        foreach ($content as $item) {
            $pro_cust = new ProductCustomer();
            $pro_cust->product_id = $item->id;
            $pro_cust->qty = $item->qty;
            $pro_cust->customer_id = $customer->id;
            $pro_cust->save();
        }


        Cart::destroy();
        echo "<script>
                    alert('Cảm ơn bạn đã mua hàng của chúng tôi, Nhân viên sẽ gọi lại và xác nhận đơn hàng của bạn');
                    window.location = '";
        echo url('/');
        echo "'</script>";
    }
}
