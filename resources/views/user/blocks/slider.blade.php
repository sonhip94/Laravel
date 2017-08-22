<section class="slider">
    <div class="container">
        <div class="flexslider" id="mainslider">
            <?php
            $slider = DB::table('products')->take(4)->orderByRaw("RAND()")->get();
            ?>
            <ul class="slides">
                @foreach($slider as $item)
                    <li>
                        <a href="{!! url('d',[$item->id,$item->alias]) !!}"><img alt=""
                                                                                 style="height: 40em;"
                                                                                 src="{!! asset('resources/upload/'.$item->image) !!}">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>