@extends('admin.master')
@section('controller','Đơn hàng')
@section('action','Danh sách')
@section('content')

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>STT</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tổng tiền</th>
            <th>Thời gian mua</th>
            <th>Trạng thái</th>
            <th>Chi tiết đơn hàng</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach($invoice as $item)
            <?php $stt += 1; ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $item['name'] !!}</td>
                <td>{!! $item['email'] !!}</td>
                <td>{!! $item['phone'] !!}</td>
                <td>{!! $item['address'] !!}</td>
                <td>{!! number_format($item['totalPrice'],0,",",".") !!} VNĐ</td>
                <td>{!!  \Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans() !!}</td>
                <td>
                    @if($item["status"] == 0)
                        Chưa chuyển
                    @elseif($item["status"] == 1)
                        Đang chuyển
                    @else
                        Đã chuyển
                    @endif
                </td>
                <td class="center"><a href="{!! URL::route("admin.invoice.getInvoice",$item["id"]) !!}"> Chi tiết đơn
                        hàng</a></td>
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
