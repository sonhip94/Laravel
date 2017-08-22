@extends('admin.master')
@section('controller','Bình luận')
@section('action','Danh sách')
@section('content')
    <div>
        <span>Trả lời cho bình luân:</span>
        <span style="color:red;font-weight: bold;">{!! $comment["comm_content"] !!}</span>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>STT</th>
            <th>Tên</th>
            <th>Lời bình luận</th>
            <th>Ngày bình luận</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach($reply_comments as $item)
            <?php $stt += 1; ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $item["reply_name"] !!}</td>
                <td>{!! $item["reply_content"] !!}</td>
                <td>{!!  \Carbon\Carbon::createFromTimestamp(strtotime($item["created_at"]))->diffForHumans() !!}</td>
                <td class="center"><a onclick="return xacNhanXoa('Bạn có chắc chắn muốn xóa?')"
                                      href="{!! URL::route("admin.comments.getDeleteReply",$item["id"]) !!}"> Xóa</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
