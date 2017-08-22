@extends("user.master")
@section('description','Trang chủ')
@section('author','Sơn Híp')
@section('content')
    <section id="product">
        <div class="container">
            <!--  breadcrumb -->
            <ul class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                    <span class="divider">/</span>
                </li>
                <li class="active">Contact</li>
            </ul>
            <!-- Contact Us-->
            <h1 class="heading1"><span class="maintext">Liên hệ</span><span class="subtext"> Hãy liên hệ với chúng tôi nếu bạn cần!!!</span>
            </h1>
            <div class="row">
                <div class="span9">
                    <form class="form-horizontal" action="{!! url("lien-he") !!}" method="post">
                        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                        <fieldset>
                            <div class="control-group">
                                <label for="name" class="control-label">Họ tên <span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" class="required" id="name" value="" name="name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="email" class="control-label">Email <span class="required">*</span></label>
                                <div class="controls">
                                    <input type="email" class="required email" id="email" value="" name="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="message" class="control-label">Nội dung</label>
                                <div class="controls">
                                    <textarea class="required" rows="6" cols="40" id="message"
                                              name="message"></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input class="btn btn-orange" type="submit" value="Submit" id="submit_id">
                                <input class="btn" type="reset" value="Reset">
                            </div>
                        </fieldset>
                    </form>
                </div>

                <!-- Sidebar Start-->
                <div class="span3">
                    <aside>
                        <div class="sidewidt">
                            <h2 class="heading2"><span>Thông tin liên hệ</span></h2>
                            <p> - Phạm Phương Anh<br>
                                - Chuyên thời trang Quang Châu<br>
                                - 438 Đê La Thành<br>
                                <br>
                                Phone: 091 158 9496<br>
                                Email: phuonganhpham2808@gmail.com<br>
                                <a href="{!! url("/") !!}" Web: piscesgirl.com></a><br>
                            </p>
                        </div>
                    </aside>
                </div>
                <!-- Sidebar End-->

            </div>
        </div>
    </section>
@endsection
