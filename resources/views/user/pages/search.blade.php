@extends("user.master")
@section('description','Trang chủ')
@section('author','Sơn Híp')
@section('content')
    <!-- Featured Product-->
    <section id="featured" class="row mt40">
        <div class="container">
            <h1 class="heading1"><span class="maintext" style="color:indianred;">Từ khóa tìm kiếm:{!! $word !!}</span>
            </h1>
            <ul class="thumbnails">
                @foreach($value as $item)
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
            Tổng số trang: {!! $value->lastPage() !!}
            <div class="pagination pull-right">
                <ul>
                    @if($value->currentPage() != 1)
                        <li>
                            <a href="{!! str_replace('/?','?',$value->url($value->currentPage() - 1)) !!}">Prev</a>
                        </li>
                    @endif
                    @for($i=1;$i<=$value->lastPage();$i++)
                        <li class="{!! ($value->currentPage() == $i) ? 'active' : "" !!}">
                            <a href="{!! ($value->currentPage() == $i) ? "javascript:void(0)" : str_replace('/?','?',$value->url($i)) !!}">{!! $i !!}</a>
                        </li>
                    @endfor
                    @if($value->currentPage() != $value->lastPage())
                        <li>
                            <a href="{!! str_replace('/?','?',$value->url($value->currentPage() + 1)) !!}">Next</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </section>
@endsection