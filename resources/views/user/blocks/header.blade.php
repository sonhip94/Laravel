<style>
    .keywords {
        width: 100px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
        margin-top: -0.4em;
    }

    .keywords:focus {
        width: 165%;
    }

    #quicksearch {
        padding: 0;
        margin: 0;
        top: 0px;
        margin-top: 4.1em;
        margin-left: 29.8em;
        position: absolute;
        width: 315px;
        border: solid 1px black;
        border-radius: 5px;
        background: #fdfdfd;
        display: none;
        z-index: 20;
    }

    #quicksearch li {

        height: auto;
        position: relative;

    }

    #quicksearch li a {
        line-height: 40px;
        padding-left: 10px;
        color: #808394;
        font-weight: 500;
        text-shadow: 0 1px #FFF;
    }

    #quicksearch img {
        position: absolute;
        right: 0px;
        top: 2px
        padding-top: 2em;
    }

    #quicksearch li:hover, #quicksearch li a:hover {
        background: #CCC;
        color: #FFF;
        text-shadow: 0 -1px rgba(0, 0, 0, 0.3);
        border-radius: 5px;
    }
</style>
<div class="headerstrip">
    <div class="container">
        <div class="row">
            <div class="span12">
                <a href="{!! url("/") !!}" class="logo pull-left"><img src="{!! url('/public/user/img/logo.png') !!}"
                                                                       alt="Sơn Híp" title="Sơn Híp"></a>
                <!-- Top Nav Start -->
                <div class="pull-left">
                    <div class="navbar" id="topnav">
                        <div class="navbar-inner">
                            <ul class="nav">
                                <li><a class="home active" href="{!! url("/") !!}">Home</a>
                                </li>
                                <li><a class="myaccount" href="{!! url("lien-he") !!}">Liên hệ</a>
                                <li><a class="shoppingcart" href="{!! url("gio-hang") !!}">Giỏ hàng của bạn</a>
                                </li>
                                <li>
                                    <div id="searchform">
                                        <form action="{!! url("/search") !!}" method="get" class="form-wrapper">
                                            {{--<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>--}}
                                            <input type="text" name="keywords" class="keywords" placeholder="Search.."/>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul id="quicksearch" style="list-style: none;">

                    </ul>
                </div>
                <!-- Top Nav End -->
            </div>
        </div>
    </div>
</div>