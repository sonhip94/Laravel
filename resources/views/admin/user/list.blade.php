@extends('admin.master')
@section('controller','Thành viên')
@section('action','Danh sách')
@section('content')
    @include("admin/blocks/errors")
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>STT</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Level</th>
            <th>Xóa</th>
            <th>Sửa</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach($user as $item)
            <?php $stt += 1 ?>
            <tr class="odd gradeX" align="center">
                <td><?php echo $stt ?></td>
                <td>{!! $item['username'] !!}</td>
                <td>{!! $item['email'] !!}</td>
                <td>
                    @if( $item['level'] == 1)
                        Admin
                    @elseif($item['level']==2)
                        Quản trị
                    @else Thành viên
                    @endif
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                            onclick="return xacNhanXoa('Bạn có chắc xóa không?')"
                            href="{!! URL::route("admin.user.getDelete",$item['id']) !!} ">Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                            href="{!! URL::route("admin.user.getEdit",$item['id']) !!}">Sửa</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
