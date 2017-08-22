<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Thực tập Laravel Framework tại CO-WELL Châu Á">
    <meta name="author" content="">
    <title>Sơn Híp - Website bán hàng</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('public/admin/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('public/admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('public/admin/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css">

    <!-- DataTables CSS -->
    <link href="{{ url('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}"
          rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ url('public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css')}}"
          rel="stylesheet">

    <script src="{{ url('public/admin/js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ url('public/admin/js/ckfinder/ckfinder.js')}}"></script>

    <script type="text/javascript">
        var baseURL = "{!! url('/') !!}";
    </script>

    <script src="{{ url('public/admin/js/ckeditor/config.js')}}"></script>
    <script src="{{ url('public/admin/js/myscript.js')}}"></script>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0)">Admin - Thực tập Laravel</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> {!! Auth::user()->username !!}</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a onclick="return xacNhanXoa('Bạn có chắc chắn muốn logout?')"
                           href="{!! url('auth/logout') !!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Tìm kiếm...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Danh mục<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('admin.cate.list') !!}">Danh sách </a>
                            </li>
                            <li>
                                <a href="{!! route('admin.cate.postAdd') !!}">Thêm mới</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('admin.product.list') !!}">Danh sách</a>
                            </li>
                            <li>
                                <a href="{!! route('admin.product.postAdd') !!}">Thêm mới</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Đơn hàng<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('admin.invoice.list') !!}">Danh sách </a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-comment-o fa-fw"></i> Bình luận<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('admin.comments.list') !!}">Danh sách </a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Thành viên<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! route('admin.user.list') !!}">Danh sách</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield("controller")
                        <small>@yield("action")</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-{!! Session::get('flash_level') !!}">
                            {!! Session::get('flash_message') !!}
                        </div>
                    @endif
                </div>
                <!-- nội dung -->

            @yield('content')
            <!-- kết thúc nội dung -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{ url('public/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ url('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ url('public/admin/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ url('public/admin/dist/js/sb-admin-2.js')}}"></script>


<!-- DataTables JavaScript -->
<script src="{{ url('public/admin/bower_components/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>

<script>

    $("div.alert").delay(3000).slideUp();
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });

    });

    $(document).ready(function () {
        //Thêm trường upload ảnh
        $("#addImage").click(function (e) {
            $("#insert").append('<br><div class="form-group"><input type="file" name="fEditDetail[]" /></div>');
        });
        // xử lý thêm,xóa ảnh.
        $("a#del_img_demo").on("click", function () {
            var url = "http://localhost/Project/admin/product/delimg/";
            var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
            var idImage = $(this).parent().find("img").attr("idImage");
            var img = $(this).parent().find("img").attr("src");
            var rid = $(this).parent().find("img").attr("rid");
            $.ajax({
                url: url + idImage,
                type: "GET",
                cache: false,
                data: {"_token": _token, "idImage": idImage, 'urlHinh': img},
                success: function (data) {
                    if (data == "OK") {
                        $("#" + rid).remove();
                    }
                    else {
                        alert("Lỗi.");
                    }
                }
            });
        });
    });
</script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
</body>

</html>
