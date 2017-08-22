@extends('admin.master')
@section('controller','Chi tiết đơn hàng')
@section('action','Danh sách')
@section('content')

    <form style="width:30%" method="post" action="">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <label class="radio-inline">
            <input name="rdoStatus" value="0" type="radio"
                   @if($customer->status==0)
                   checked="checked"
                    @endif
            />Chưa chuyển
        </label>

        <label class="radio-inline">
            <input name="rdoStatus" value="1" type="radio"
                   @if($customer->status==1)
                   checked="checked"
                    @endif
            />Đang chuyển
        </label>
        <label class="radio-inline">
            <input name="rdoStatus" value="2" type="radio"
                   @if($customer->status==2)
                   checked="checked"
                    @endif
            />Đã chuyển
        </label>
        <br>
        <button type="submit" class="btn btn-default">Cập nhật</button>
    </form>
    <div class="clearfix"></div><br>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>STT</th>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Ngày</th>
            <th>Danh mục</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach($invoice as $item)
            <?php $stt += 1; ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td><img style="width:4em;" src="{!! asset("/resources/upload/".$item->image) !!}"/></td>
                <td>{!! $item['name'] !!}</td>
                <td>{!! number_format($item['price'],0,",",".") !!} VNĐ</td>
                <td>{!!  \Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans() !!}</td>
                <td>
                    <?php $cate = DB::table('cates')->where('id', $item["cate_id"])->first(); ?>
                    @if(!empty($cate->name))
                        {!! $cate->name !!}
                    @endif

                </td>
                <td class="center">{!! $item["pivot"]["qty"] !!}</td>
                <td class="center">{!! number_format($item["pivot"]["qty"]*$item->price) !!}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div style="">
        <div style="float:left;background: #286090;border-radius:5px;padding:1em;">
            <a style="color:white;text-decoration: none;" href="{!! route('admin.invoice.list') !!}">Quay lại danh sách đơn hàng </a>
        </div>
        <div style="float:right;background: #286090;border:0.01em solid black;border-radius:5px;padding:1em;">
            <span style="font-weight: bold;color:red;font-size:20px;">Tổng:</span>
            <span style="font-weight: bold;color:red;font-size:22px;">{!! number_format($total->totalPrice) !!}
                VNĐ</span>
        </div>
    </div>

    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
