<div class="sidebar">
    <div class="gadget">
        <h2>分类</h2>
        <div class="clr"></div>
        <ul class="sb_menu">
            @foreach($share_category as $v)
            <li><a href="{{ url('cate/'.$v->id) }}">{{ $v->name }}</a>&nbsp;<span class="badge">{{ $v->count }}</span></li>
            @endforeach
        </ul>
    </div>
    <div class="gadget">
        <h2><span>Hot</span></h2>
        <div class="clr"></div>
        <ul class="ex_menu">
            @foreach($share_hot_article as $val)
                <li><a href="{{ url('art/'.$val->id) }}" title="Website Templates">{{ $val->title }}</a></li>
                @endforeach

        </ul>
    </div>
    <div class="gadget">
        <h2>Wise Words</h2>
        <div class="clr"></div>
        <p>   <img src="{{ asset('images/test_1.gif') }}" alt="image" width="18" height="17" /> <em>We can let circumstances rule us, or we can take charge and rule our lives from within </em>.<img src="{{ asset('images/test_2.gif') }}" alt="image" width="18" height="17" /></p>
        <p style="float:right;"><strong>Earl Nightingale</strong></p>
    </div>
</div>