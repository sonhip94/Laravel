@extends('admin.master')
@section('controller','Sản phẩm')
@section('action','Danh sách')
@section('content')

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>STT</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Ngày</th>
            <th>Danh mục</th>
            <th>Xóa</th>
            <th>Sửa</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach($data as $item)
            <?php $stt += 1; ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $item['name'] !!}</td>
                <td>{!! number_format($item['price'],0,",",".") !!} VNĐ</td>
                <td>{!!  \Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans() !!}</td>
                <td>
                    <?php $cate = DB::table('cates')->where('id', $item["cate_id"])->first(); ?>
                    @if(!empty($cate->name))
                        {!! $cate->name !!}
                    @endif

                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                           onclick="return xacNhanXoa('Bạn có chắc chắn muốn xóa?')" href="{!! URL::route("admin.product.getDelete",$item["id"]) !!}"> Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                            href="{!! URL::route("admin.product.getEdit",$item["id"]) !!}">Sửa</a></td>
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
