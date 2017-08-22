@extends('admin.master')
@section('controller','Danh mục')
@section('action','Danh sách')
@section('content')

    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>STT</th>
            <th>Tên</th>
            <th>Danh mục cha</th>
            <th>Xóa</th>
            <th>Sửa</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach($data as $item)
            <?php $stt = $stt + 1; ?>
            <tr class="odd gradeX" align="center">
                <td>{!!  $stt !!}</td>
                <td>{!!  $item["name"]!!}</td>
                <td>
                    @if($item["parent_id"] == 0)
                        {!! "None" !!}
                    @else
                        <?php
                        $parent = DB::table('cates')
                            ->where('id', $item['parent_id'])
                            ->first();
                        echo $parent->name;
                        ?>
                    @endif

                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacNhanXoa('Bạn có chắc xóa không?')"
                            href="{!! URL::route("admin.cate.getDelete",$item['id']) !!} "> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                            href="{!! URL::route("admin.cate.getEdit",$item['id']) !!}">Edit</a></td>
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

@endsection()