<div id="categorymenu">
    <nav class="subnav">
        <ul class="nav-pills categorymenu">
            <li><a href="{!! url("/") !!}">Trang chủ</a>
            <?php
            $menu_1 = DB::table("cates")->where('parent_id', 0)->get();
            ?>
            @foreach($menu_1 as $item)
                <li>
                    <?php
                    $menu_2 = DB::table("cates")->where('parent_id', $item->id)->get();
                    $count = DB::table("cates")->where('parent_id', $item->id)->count();
                    if($count <= 0){
                    ?>
                    <a href="{!! url("c",[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
                    <?php
                    }else{
                    ?>
                    <a href="javascript:void(0)">{!! $item->name !!}</a>
                    <?php }
                    ?>
                    <div style="display:<?php if ($count == 0) echo 'none;';?>">
                        <ul>
                            @foreach($menu_2 as $item2)
                                <li><a
                                            href="{!! url("c",[$item2->id,$item2->alias]) !!}">{!! $item2->name !!}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </nav>
</div>