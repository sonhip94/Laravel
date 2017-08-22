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
                <li class="active"> Shopping Cart</li>
            </ul>
            <h1 class="heading1"><span class="maintext"> Giỏ hàng của bạn</span><span class="subtext"> Các sảm phẩm bạn vừa đặt</span>
            </h1>
            <!-- Cart-->
            @if($content->count() > 0)
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
                        <form method="post" action="">
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
                                        <a href="javascript:void(0)" class="updatecart" id="{!! $item->rowid; !!}"><img
                                                    class="tooltip-test" data-original-title="Update"
                                                    src="{!! asset("public/user/img/update.png") !!}" alt=""></a>
                                        <a onclick="return xacNhanXoa('Bạn có chắc chắn muốn xóa?')"
                                           href="{!! url('xoa',['id'=>$item->rowid]) !!}"><img class="tooltip-test"
                                                                                               data-original-title="Remove"
                                                                                               src="{!! asset("public/user/img/remove.png") !!}"
                                                                                               alt=""></a>
                                    </td>


                                    <td class="price">{!! number_format($item->price) !!} VNĐ</td>
                                    <td class="total">{!! number_format($item->price*$item->qty) !!} VNĐ</td>

                                </tr>
                            @endforeach
                        </form>
                    </table>
                </div>
                <div class="container">
                    <div class="pull-right">
                        <div class="span4 pull-right">
                            <table class="table table-striped table-bordered ">
                                <tr>
                                    <td><span class="extra bold totalamout">Total :</span></td>
                                    <td><span class="bold totalamout">{!! number_format($total) !!}</span></td>
                                </tr>
                            </table>
                            <a href="{!! url("thanh-toan") !!}" class="btn btn-orange pull-right">Thanh toán</a>
                            <a style="margin-right:5px;" href="{!! url("/") !!}" class="btn btn-orange pull-right">Tiếp
                                tục mua hàng</a>
                        </div>
                    </div>
                </div>
            @else
                <script>alert('Giỏ hàng của bạn chưa có sản phẩm nào')</script>
                <h4 style="color:indianred">Giỏ hàng của bạn chưa có sản phẩm nào !!!</h4>
            @endif
        </div>
    </section>
@endsection