@extends("user.master")
@section('description','Trang chủ')
@section('author','Sơn Híp')
@section('content')
    <!-- Featured Product-->
    <section id="featured" class="row mt40">
        <div class="container">
            <h1 class="heading1"><span class="maintext" style="color:indianred;">Sản phẩm đặc biệt</span><span
                        class="subtext">Các sản phẩm bán chạy nhất</span>
            </h1>
            <ul class="thumbnails">
                @foreach($product as $item)
                    <li class="span3">
                        <a class="prdocutname" href="{!! url('d',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
                        <div class="thumbnail">
                            <a href="{!! url('d',[$item->id,$item->alias]) !!}"><img alt=""
                                                                                     style="width:30em;height: 25em;"
                                                                                     src="{!! asset('resources/upload/'.$item->image) !!}"></a>
                            <div class="pricetag">
                                <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->name]) !!}"
                                                               class="productcart">ADD TO CART</a>
                                <div class="price">
                                    <div style="font-size:12px;margin-top:8px;"
                                         class="pricenew">{!! number_format($item->price) !!} VNĐ
                                    </div>
                                    <div class="priceold"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <!-- Latest Product-->
    <section id="latest" class="row">
        <div class="container">
            <h1 class="heading1"><span class="maintext" style="color:#286090">Sản phẩm mới nhất</span><span
                        class="subtext"> Các mẫu thời trang cập nhật mới nhất</span>
            </h1>
            <ul class="thumbnails">
                @foreach($product_spec as $item)
                    <li class="span3">
                        <a class="prdocutname" href="{!! url('d',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
                        <div class="thumbnail">
                            <a href="{!! url('d',[$item->id,$item->alias]) !!}"><img alt=""
                                                                                     style="width:30em;height: 17em;"
                                                                                     src="{!! asset('resources/upload/'.$item->image) !!}"></a>
                            <div class="pricetag">
                                <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->name]) !!}"
                                                               class="productcart">ADD TO CART</a>
                                <div class="price">
                                    <div style="font-size:12px;margin-top:8px;"
                                         class="pricenew">{!! number_format($item->price) !!} VNĐ
                                    </div>
                                    <div class="priceold"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection