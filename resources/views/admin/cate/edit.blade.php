@extends('admin.master')
@section('controller','Danh mục')
@section('action','Sửa')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        @include("admin.blocks.errors")
        <form action="" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token()!!}"/>
            <div class="form-group">
                <label>Danh mục cha</label>
                <select class="form-control" name="sltParent">
                    <option value="0">Chọn danh mục</option>
                    <?php cate_parent($parent,0,"--",$data['parent_id']); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <input class="form-control" name="txtCateName" placeholder="Nhập tên" value="{!! old('txtCateName',isset($data) ? $data['name'] : null)  !!}"/>
            </div>
            <div class="form-group">
                <label>Vị trí</label>
                <input class="form-control" name="txtOrder" placeholder="Nhập vị trí" value="{!! old('txtOrder',isset($data) ? $data['order'] : null)  !!}"/>
            </div>
            <div class="form-group">
                <label>Từ khóa</label>
                <input class="form-control" name="txtKeywords" placeholder="Nhập từ khóa" value="{!! old('txtKeywords',isset($data) ? $data['keywords'] : null)  !!}"/>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" name="txtDescription" rows="3">{!! old('txtDescription',isset($data) ? $data['description'] : null)  !!}</textarea>
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
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
    </div>
    @endsection
<!-- /.row -->