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
                <li class="active">Category</li>
            </ul>
            <div class="row">
                <!-- Sidebar Start-->
                <aside class="span3">
                    <!-- Category-->
                    <div class="sidewidt">
                        <h2 class="heading2"><span>Danh mục cùng loại</span></h2>
                        <ul class="nav nav-list categories">

                            @foreach($menu_cate as $item)
                                @if($item->parent_id != 0)
                                    <li>
                                        <a href="{!! url("c",[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <!--  Best Seller -->
                    <div class="sidewidt">
                        <h2 class="heading2"><span>Sản phầm bán chạy</span></h2>
                        <ul class="bestseller">
                            @foreach($best_seller as $item)
                                <li>
                                    <img style="width:5em;height: 4em;"
                                         src="{!! asset('resources/upload/'.$item->image) !!}" alt="product"
                                         title="product">
                                    <a class="productname"
                                       href="{!! url('d',[$item->id,$item->alias]) !!}"> {!! $item->name !!}</a>
                                    <span class="procategory">{!! $cate->name !!}</span>
                                    <span class="price">{!! number_format($item->price) !!} VNĐ</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Latest Product -->
                    <div class="sidewidt">
                        <h2 class="heading2"><span>Sản phầm cùng danh mục</span></h2>
                        <ul class="bestseller">
                            @foreach($lasted_product as $item)
                                <li>
                                    <img style="width:5em;height: 4em;"
                                         src="{!! asset('resources/upload/'.$item->image) !!}" alt="product"
                                         title="product">
                                    <a class="productname"
                                       href="{!! url('d',[$item->id,$item->alias]) !!}"> {!! $item->name !!}</a>
                                    <span class="procategory">{!! $cate->name !!}</span>
                                    <span class="price">{!! number_format($item->price) !!} VNĐ</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--  Must have -->
                    <div class="sidewidt">
                        <h2 class="heading2"><span>Must have</span></h2>
                        <div class="flexslider" id="mainslider">
                            <?php
                            $slider = DB::table('products')->take(4)->orderByRaw("RAND()")->get();
                            ?>
                            <ul class="slides">
                                @foreach($slider as $item)
                                    <li>
                                        <a href="{!! url('d',[$item->id,$item->alias]) !!}"><img alt=""
                                                                                                 style="height: 40em;"
                                                                                                 src="{!! asset('resources/upload/'.$item->image) !!}">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </aside>
                <!-- Sidebar End-->
                <!-- Category-->
                <div class="span9">
                    <!-- Category Products-->
                    <section id="category">
                        <div class="row">
                            <div class="span9">
                                <!-- Category-->
                                <section id="categorygrid">
                                    @if($product_cate->count() > 0)
                                        <ul class="thumbnails grid">
                                            @foreach($product_cate as $item)
                                                <li class="span3">
                                                    <a class="prdocutname"
                                                       href="{!! url('d',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
                                                    <div class="thumbnail">
                                                        <span class="sale tooltip-test">Sale</span>
                                                        <a href="{!! url('d',[$item->id,$item->alias]) !!}"><img alt=""
                                                                                                                 style="width:30em;height: 25em;"
                                                                                                                 src="{!! asset('resources/upload/'.$item->image) !!}"></a>
                                                        <div class="pricetag">
                                                            <span class="spiral"></span><a
                                                                    href="{!! url('mua-hang',[$item->id,$item->name]) !!}"
                                                                    class="productcart">Mua sản phẩm</a>
                                                            <div class="price">
                                                                <div style="font-size:12px;margin-top:8px;"
                                                                     class="pricenew">{!! number_format($item->price) !!}
                                                                    VNĐ
                                                                </div>
                                                                <div class="priceold"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        Tổng số trang: {!! $product_cate->lastPage() !!}
                                        <div class="pagination pull-right">
                                            <ul>
                                                @if($product_cate->currentPage() != 1)
                                                    <li>
                                                        <a href="{!! str_replace('/?','?',$product_cate->url($product_cate->currentPage() - 1)) !!}">Prev</a>
                                                    </li>
                                                @endif
                                                @for($i=1;$i<=$product_cate->lastPage();$i++)
                                                    <li class="{!! ($product_cate->currentPage() == $i) ? 'active' : "" !!}">
                                                        <a href="{!! ($product_cate->currentPage() == $i) ? "javascript:void(0)" : str_replace('/?','?',$product_cate->url($i)) !!}">{!! $i !!}</a>
                                                    </li>
                                                @endfor
                                                @if($product_cate->currentPage() != $product_cate->lastPage())
                                                    <li>
                                                        <a href="{!! str_replace('/?','?',$product_cate->url($product_cate->currentPage() + 1)) !!}">Next</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    @else Không có sản phẩm nào
                                    @endif
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection