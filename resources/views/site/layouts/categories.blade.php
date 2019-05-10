<div id="sidebar" class="float_l">
    <div class="sidebar_box"><span class="bottom"></span>
        <h3>Категории работ</h3>
        <div class="content">
            <ul class="sidebar_list">
                @foreach($categories as $cat)
                    <li><a href="{{ url('Category/'.$cat->cat_id) }}">{{ $cat->cat_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>