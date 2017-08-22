@extends('admin.master')
@section('controller','Thành viên')
@section('action','Sửa')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token()!!}"/>
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="txtUser"
                       value="{!! old('txtUser',isset($user) ? $user['username'] : null)  !!}"/>
            </div>
            <div class=" form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" name="txtPass"
                       {!! old('txtPass',isset($user) ? $user['password'] : null)  !!} placeholder="Please Enter Password"/>
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu</label>
                <input type="password" class="form-control" name="txtRePass"
                       {!! old('txtRePass',isset($user) ? $user['password'] : null)  !!} placeholder="Please Enter RePassword"/>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="txtEmail"
                       value="{!! old('txtEmail',isset($user) ? $user['email'] : null)  !!}" disabled/>
            </div>
            @if(Auth::user()->id != $id)
                <div class="form-group">
                    <label>User Level</label>
                    @if(Auth::user()->level == 1)
                        <label class="radio-inline">
                            <input name="rdoLevel" value="1" checked="" type="radio"
                                   @if($user['level']==1)
                                   checked="checked"
                                    @endif
                            >Admin
                        </label>
                    @endif
                    <label class="radio-inline">
                        <input name="rdoLevel" value="2" type="radio"
                               @if($user['level']==2)
                               checked="checked"
                                @endif>Quản trị
                    </label>
                    <label class="radio-inline">
                        <input name="rdoLevel" value="0" type="radio"
                               @if($user['level']==0)
                               checked="checked"
                                @endif>Thành viên
                    </label>
                </div>
            @endif
            <button type="submit" class="btn btn-default">User Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
            <form>
    </div>
@endsection