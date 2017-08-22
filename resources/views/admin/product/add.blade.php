@extends('admin.master')
@section('controller','Sản phẩm')
@section('action','Thêm mới')
@section('content')
<form action="{!! route('admin.product.postAdd') !!}" method="POST" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">
        @include("admin.blocks.errors")
            <input type="hidden" name="_token" value="{!! csrf_token()!!}"/>
            <div class="form-group">
                <label>Danh sách danh mục</label>
                <select class="form-control" name="sltParent">
                    <option value="">Chọn danh mục</option>
                    <?php cate_parent($cate, 0, "--", old('sltParent')) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input class="form-control" name="txtName" placeholder="Nhập tên..." value="{!! old('txtName') !!}"/>
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input class="form-control" name="txtPrice" value="{!! old('txtPrice') !!}" placeholder="Nhập giá..."/>
            </div>
            <div class="form-group">
                <label>Giới thiệu</label>
                <textarea class="form-control" rows="3" id="editor1" name="txtIntro">{!! old('txtIntro') !!}</textarea>
                <script>CKEDITOR.replace('editor1');</script>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea class="form-control" rows="3" id="editor2"
                          name="txtContent">{!! old('txtContent') !!}</textarea>
                <script>CKEDITOR.replace('editor2');</script>
            </div>
            <div class="form-group">
                <label>Upload ảnh</label>
                <input type="file" name="fImages" value="{!! old('fImages') !!}">
            </div>
            <div class="form-group">
                <label>Từ khóa</label>
                <input class="form-control" name="txtKeywords" value="{!! old('txtKeywords') !!}"
                       placeholder="Nhập từ khóa..."/>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription') !!}</textarea>
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
            <button type="submit" class="btn btn-default">Thêm mới</button>
            <button type="reset" class="btn btn-default">Reset</button>

    </div>
        <div class="col-md-4">
            @for($i=1;$i<=4;$i++)
                <div class="form-group">
                    <label>Ảnh sản phẩm {!! $i !!}</label>
                    <input type="file" name="fProductDetail[]"/>
                </div>
            @endfor
        </div>
        <div class="col-md-1"></div>
    <form>
@endsection
