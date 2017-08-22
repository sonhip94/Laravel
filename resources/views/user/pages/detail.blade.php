@extends("user.master")
@section('description','Trang chủ')
@section('author','Sơn Híp')
@section('content')
    <style>
        .field-comment ul li {
            margin: 5px;
            margin-bottom: 5px;
        }

        .field-comment ul li ul {
            margin-left: 40px;
        }

        .field-comment ul li fieldset {
            width: 50%;
            margin-left: 45px;
        }
    </style>
    <section id="product">
        <div class="container">
            <!-- Product Details-->
            <div class="row">
                <!-- Left Image-->
                <div class="span5">
                    <ul class="thumbnails mainimage">
                        <li class="span5">
                            <a rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4"
                               class="thumbnail cloud-zoom"
                               href="{!! url('resources/upload/'.$product_detail->image )!!}">
                                <img style="width:40em;height: 40em; margin-top:1em;"
                                     src="{!! url('resources/upload/'.$product_detail->image )!!}" alt="" title="">
                            </a>
                        </li>
                        @foreach($image as $item)
                            <li class="span5">
                                <a rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4"
                                   class="thumbnail cloud-zoom"
                                   href="{!! url("resources/upload/detail/".$item->image) !!}">
                                    <img style="width:40em;height: 40em; margin-top:1em;"
                                         src="{!! url("resources/upload/detail/".$item->image) !!}" alt="" title="">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="thumbnails mainimage">
                        <li class="producthtumb">
                            <a class="thumbnail">
                                <img style="width:8em;height:8em;"
                                     src="{!! url('resources/upload/'.$product_detail->image )!!}" alt="" title="">
                            </a>
                        </li>
                        @foreach($image as $item)
                            <li class="producthtumb">
                                <a class="thumbnail">
                                    <img style="width:8em;height:8em;"
                                         src="{!! url("resources/upload/detail/".$item->image) !!}" alt="" title="">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Right Details-->
                <div class="span7">
                    <div class="row">
                        <div class="span7">
                            <h1 class="productname"><span class="bgnone">{!! $product_detail->name !!}</span></h1>
                            <div class="productprice">
                                <div class="productpageprice">
                                    <span class="spiral"></span><span style="font-size:26px">{!! number_format($product_detail->price) !!}
                                        VNĐ</span>
                                </div>
                            </div>
                            <ul class="productpagecart">
                                <li><a class="cart"
                                       href="{!! url('mua-hang',[$product_detail->id,$product_detail->name]) !!}">Thêm
                                        vào giỏ hàng</a>
                                </li>
                            </ul>
                            <!-- Product Description tab & comments-->
                            <div class="productdesc">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active"><a href="#description">Mô tả</a>
                                    </li>
                                    <li><a href="#review">Bình luận</a>
                                    </li>
                                    <li><a href="#producttag">Tags</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="description">
                                        {!! $product_detail->description !!}
                                    </div>
                                    <div class="tab-pane" id="review">
                                        <h3>Bình luận !!!</h3>
                                        <form method="post" class="form-vertical">
                                            <input type="hidden" name="_token" class="token1"
                                                   value="{!! csrf_token() !!}"/>
                                            <fieldset>
                                                <input type="hidden" class="product_id"
                                                       value="{!! $product_detail->id !!}"/>
                                                <input type="hidden" class="product_alias"
                                                       value="{!! $product_detail->alias !!}"/>
                                                <div class="control-group">
                                                    <label class="control-label">Họ tên</label>
                                                    <div class="controls">
                                                        <input type="text" name="comm_name" class="comm_name span3">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Nội dung bình luận</label>
                                                    <div class="controls">
                                                        <textarea rows="3" name="comm_content"
                                                                  class="comm_content span3"></textarea>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <input type="submit" class="btn btn-orange comment" value="Comment">
                                        </form>
                                        <fieldset class="field-comment">
                                            <legend>Lời bình luận</legend>

                                            <ul id="comm-list">
                                                @if($commentCount == 0)
                                                    <span>Chưa có bình luận nào</span>
                                                @else
                                                    @foreach($comment as $item)
                                                        <li>
                                                            <div>
                                                                <b>{!! $item->comm_name  !!}</b><br>
                                                                <span>{!! nl2br($item->comm_content)  !!}</span><br>
                                                                <small>
                                                                    <a href="javascript:void(0)" class="reply-block"
                                                                       data-id="{!! $item->id !!}">Trả lời</a>
                                                                    <span>{!!  \Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans() !!}</span>
                                                                </small>
                                                            </div>
                                                            <ul class="rep-list{!! $item->id !!}">
                                                                <?php
                                                                $reply = DB::table("reply_comments")->where("comment_id", $item->id)->get();
                                                                ?>

                                                                @foreach($reply as $item2)
                                                                    <li>
                                                                        <div>
                                                                            <b>{!! $item2->reply_name !!}</b><br>
                                                                            <span>{!! $item2->reply_content !!}</span><br>
                                                                            <small>
                                                                                <a href="javascript:void(0)">Trả
                                                                                    lời</a>
                                                                                <span>{!!  \Carbon\Carbon::createFromTimestamp(strtotime($item2->created_at))->diffForHumans() !!}</span>
                                                                            </small>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <fieldset style="display:none;"
                                                                      class="rep-form{!! $item->id !!}">
                                                                <form method="post" class="form-vertical">
                                                                    <input type="hidden" name="_token" class="token2"
                                                                           value="{!! csrf_token() !!}"/>
                                                                    <input type="hidden" class="product_alias"
                                                                           value="{!! $product_detail->alias !!}"/>
                                                                    <div class="control-group">
                                                                        <label class="control-label">Họ tên</label>
                                                                        <div class="controls">
                                                                            <input type="text" name="reply_name"
                                                                                   class="reply_name{!! $item->id !!} span3">
                                                                        </div>
                                                                    </div>
                                                                    <div class="control-group">
                                                                        <label class="control-label">Nội dung bình
                                                                            luận</label>
                                                                        <div class="controls">
                                                        <textarea rows="3" name="reply_content"
                                                                  class="reply_content{!! $item->id !!} span3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <input type="submit" class="btn btn-orange reply"
                                                                           value="Reply" data-comid='{!! $item->id !!}'>
                                                                </form>
                                                            </fieldset>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>

                                        </fieldset>
                                    </div>

                                    <div class="tab-pane" id="producttag">
                                        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries, but also
                                            the leap into electronic typesetting, remaining essentially unchanged. It
                                            was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing software
                                            like Aldus PageMaker including versions of Lorem Ipsum <br>
                                            <br>
                                        </p>
                                        <ul class="tags">
                                            <li><a href="#"><i class="icon-tag"></i> Webdesign</a>
                                            </li>
                                            <li><a href="#"><i class="icon-tag"></i> html</a>
                                            </li>
                                            <li><a href="#"><i class="icon-tag"></i> html</a>
                                            </li>
                                            <li><a href="#"><i class="icon-tag"></i> css</a>
                                            </li>
                                            <li><a href="#"><i class="icon-tag"></i> jquery</a>
                                            </li>
                                            <li><a href="#"><i class="icon-tag"></i> css</a>
                                            </li>
                                            <li><a href="#"><i class="icon-tag"></i> jquery</a>
                                            </li>
                                            <li><a href="#"><i class="icon-tag"></i> Webdesign</a>
                                            </li>
                                            <li><a href="#"><i class="icon-tag"></i> css</a>
                                            </li>
                                            <li><a href="#"><i class="icon-tag"></i> jquery</a>
                                            </li>
                                            <li><a href="#"><i class="icon-tag"></i> Webdesign</a>
                                            </li>
                                            <li><a href="#"><i class="icon-tag"></i> html</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Related Products-->
    <section id="related" class="row">
        <div class="container">
            <h1 class="heading1"><span class="maintext">Sản phẩm cùng loại</span><span class="subtext"> </span></h1>
            <ul class="thumbnails">
                @foreach($rela_product as $item)
                    <li class="span3">
                        <a class="prdocutname" href="{!! url('d',[$item->id,$item->alias]) !!}">{!! $item->name !!}
                        </a>
                        <div class="thumbnail">
                            <span class="sale tooltip-test">Sale</span>
                            <a href="{!! url('d',[$item->id,$item->alias]) !!}"><img alt="" style="width:40em;height: 25em;"
                                                                                     src="{!! url('resources/upload/'.$item->image) !!}"></a>
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
    <!-- Popular Brands-->
@endsection
