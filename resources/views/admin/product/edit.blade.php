@extends('admin.master')
@section('controller','Sản phẩm')
@section('action','Sửa')
@section('content')
    <style>
        .icon_del {
            background: #28a4c9;
            position: relative;
            top: -19em;
            left: 22em;
        }
    </style>
    <form action="" method="POST" name="frmEditProduct" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">
            @include("admin.blocks.errors")
            <input type="hidden" name="_token" value="{!! csrf_token()!!}"/>
            <div class="form-group">
                <label>Danh sác danh mục</label>
                <select class="form-control" name="sltParent">
                    {!! cate_parent($cate, 0, "--", $product["cate_id"]) !!}
                    {!! var_dump($product) !!}
                </select>

                {{--<label>Danh mục hiện tại</label>--}}
                {{--<input class="form-control" name="sltParent" disabled--}}
                {{--value="{!! $product["cate_id"] !!}"--}}
                {{--placeholder="Please Enter Username"/>--}}
            </div>
            <div class="form-group">
                <label>Tên</label>
                <input class="form-control" name="txtName"
                       value="{!! old('txtName',isset($product) ? $product['name'] : null)  !!}"
                       placeholder="Please Enter Username"/>
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input class="form-control" name="txtPrice"
                       value="{!! old('txtPrice',isset($product) ? $product['price'] : null)  !!}"/>
            </div>
            <div class="form-group">
                <label>Giới thiệu</label>
                <textarea class="form-control" rows="3" id="editor1" name="txtIntro">
                        {!! old('txtIntro',isset($product) ? $product['intro'] : null)  !!}
                    </textarea>
                <script>CKEDITOR.replace('editor1');</script>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea class="form-control" rows="3" id="editor2" name="txtContent">
                        {!! old('txtContent',isset($product) ? $product['content'] : null)  !!}
                    </textarea>
                <script>CKEDITOR.replace('editor2');</script>
            </div>

            <div class="form-group">
                <label>Ảnh hiện tại</label><br>
                <img class="img-responsive" src="{!! asset('resources/upload/'.$product['image']) !!}"
                     style="width:47.5em;height: 25em;"/>
                <input type="hidden" value="{!! $product['image'] !!}" name="img_current"/>
            </div>

            <div class="form-group">
                <label>Ảnh muốn thay đổi</label>
                <input type="file" name="fImages">
            </div>


            <div class="form-group">
                <label>Từ khóa</label>
                <input class="form-control" name="txtKeywords"
                       value="{!! old('txtKeywords',isset($product) ? $product['keywords'] : null)  !!}"
                       placeholder="Please Enter Category Keywords"/>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" name="txtDescription" rows="3">
                         {!! old('txtDescription',isset($product) ? $product['description'] : null)  !!}
                    </textarea>
            </div>
            <div class="form-group">
                <label>Trạng thái</label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="1" checked="" type="radio">Hoạt động
                </label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="2" type="radio">Không hoạt động
                </label>
            </div>
            <button type="submit" class="btn btn-default">Sửa</button>
            <button type="reset" class="btn btn-default">Làm mới</button>

        </div>
        <div class="col-md-4">
            @foreach($product_image as $key => $item)
                <div class="form-group" id="{!! $key !!}">
                    <img src="{!! asset('resources/upload/detail/'.$item['image']) !!}"
                         class="img-responsive" rid="{!! $key !!}" idImage="{!! $item['id'] !!}"
                         style="width:20em;height: 15em;margin-bottom: 0em;"/>
                    <a href="javascript:void(0)" type="button" id="del_img_demo"
                       class="btn btn-info btn-circle icon_del">
                        <i class="fa fa-times"></i>
                    </a>
                </div>

            @endforeach
            <button type="button" class="btn btn-primary" id="addImage">Thêm ảnh</button>
            <div id="insert"></div>
        </div>
        <div class="col-md-1"></div>
        <form>
@endsection
