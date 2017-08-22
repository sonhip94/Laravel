@extends("user.master")
@section('description','Trang chủ')
@section('author','Sơn Híp')
@section('content')
    <section id="product">
        <div class="container">
            <!--  breadcrumb -->
            <ul class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                    <span class="divider">/</span>
                </li>
                <li class="active">Checkout</li>
            </ul>
            <div class="row">
                <!-- Account Login-->
                <form method="post" action="">
                    <div class="span9">
                        @include("admin.blocks.errors")
                        <div class="checkoutsteptitle">Bước 1 : Ghi thông tin<a class="modify">Modify</a>
                        </div>
                        <div class="checkoutstep">
                            <div class="row">
                                <fieldset>
                                    <div class="span4">
                                        <div class="control-group">
                                            <label class="control-label">Họ tên<span class="red">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="name" class="" value="">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Email<span class="red">*</span></label>
                                            <div class="controls">
                                                <input type="email" name="email" class="" value="">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Số điện thoại<span class="red">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="phone" class="" value="">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Địa chỉ<span class="red">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="address" class="" value="">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <a href="{!! url("/") !!}" class="btn btn-orange ">Tiếp tục mua hàng</a>
                            <input type="submit" class="btn btn-orange" value="Thanh toán"/>
                        </div>
                        <div class="checkoutsteptitle">Step 2: Xác nhân đơn hàng<a class="modify">Modify</a>
                        </div>
                        <div class="checkoutstep">
                            <div class="cart-info">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th class="image">Ảnh</th>
                                        <th class="name">Tên sản phẩm</th>
                                        <th class="quantity">Số lượng</th>
                                        <th class="total">Hành động</th>
                                        <th class="price">Giá từng sản phẩm</th>
                                        <th class="total">Thành tiền</th>

                                    </tr>
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                    @foreach($content as $item)
                                        <tr>
                                            <td class="image"><a href="#"><img title="product" alt="product"
                                                                               src="{!! url("resources/upload/".$item->options->img) !!}"
                                                                               style="width:5em;height: 5em;"></a></td>
                                            <td class="name"><a href="#">{!! $item->name !!}</a></td>
                                            <td class="quantity"><input type="text" size="1" value="{!! $item->qty !!}"
                                                                        name="quantity[40]" class="qty span1"></td>
                                            <td class="total">
                                                <a href="javascript:void(0)" class="updatecart"
                                                   id="{!! $item->rowid; !!}"><img
                                                            class="tooltip-test" data-original-title="Update"
                                                            src="{!! asset("public/user/img/update.png") !!}"
                                                            alt=""></a>
                                                <a onclick="return xacNhanXoa('Bạn có chắc chắn muốn xóa?')" href="{!! url('xoa',['id'=>$item->rowid]) !!}"><img
                                                            class="tooltip-test"
                                                            data-original-title="Remove"
                                                            src="{!! asset("public/user/img/remove.png") !!}"
                                                            alt=""></a>
                                            </td>


                                            <td class="price">{!! number_format($item->price) !!} VNĐ</td>
                                            <td class="total">{!! number_format($item->price*$item->qty) !!} VNĐ</td>

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="row">
                                <div class="pull-right">
                                    <div class="span4 pull-right">
                                        <table class="table table-striped table-bordered ">
                                            <tbody>
                                            <tr>
                                                <td><span class="extra bold totalamout">Total :</span></td>
                                                <td>
                                                    <span class="bold totalamout">{!! number_format($total) !!}</span>
                                                    <input type="hidden" name="totalPrice" value="{!! $total !!}"/>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <!-- Sidebar Start-->
                <div class="span3">
                    <aside>
                        <div class="sidewidt">
                            <h2 class="heading2"><span> Checkout Steps</span></h2>
                            <ul class="nav nav-list categories">
                                <li>
                                    <a class="active" href="#">Checkout Options</a>
                                </li>
                                <li>
                                    <a href="#">Billing Details</a>
                                </li>
                                <li>
                                    <a href="#">Delivery Details</a>
                                </li>
                                <li>
                                    <a href="#">Delivery Method</a>
                                </li>
                                <li>
                                    <a href="#"> Payment Method</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <!-- Sidebar End-->
            </div>
        </div>
    </section>
@endsection