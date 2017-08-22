@extends('admin.master')
@section('controller','Danh mục')
@section('action','Thêm mới')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        @include("admin.blocks.errors")
        <form action="{!! route('admin.cate.getAdd') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token()!!}"/>
            <div class="form-group">
                <label>Danh sách danh mục</label>
                <select class="form-control" name="sltParent">
                    <option value="0">Chọn danh mục</option>
                    <?php cate_parent($parent); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <input class="form-control" name="txtCateName" value="{!! old('txtCateName') !!}" placeholder="Nhập tên "/>
            </div>
            <div class="form-group">
                <label>Vị trí</label>
                <input class="form-control" name="txtOrder" value="{!! old('txtOrder') !!}" placeholder="Nhập vị trí "/>
            </div>
            <div class="form-group">
                <label>Từ khóa danh mục</label>
                <input class="form-control" name="txtKeywords" value="{!! old('txtKeywords') !!}" placeholder="Nhập từ khóa"/>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" name="txtDescription" rows="3">{!! old('txtDescription') !!}</textarea>
            </div>
            <div class="form-group">
                <label>Trạng Thái</label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="1" checked="" type="radio">Hoạt động
                </label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="2" type="radio">Không hoạt động
                </label>
            </div>
            <button type="submit" class="btn btn-default">Thêm</button>
            <button type="reset" class="btn btn-default">Reset</button>
            <form>
    </div>

@endsection()