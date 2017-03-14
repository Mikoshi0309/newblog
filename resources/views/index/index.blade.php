@extends('layouts.frame')
@section('plate')
<div class="mainbar">
        @foreach($article as $art)
            <div class="article">
                <h2><span>{{ $art->title }}</span></h2>
                <div class="clr"></div>
                <p class="info">{{ $art->created_at }} <a href="#">{{ $art->user->name }}</a></p>
                <img src="{{ $art->imageurl }}" width="613" height="193" alt="image" />
                <div class="clr"></div>
                {{ $art->description }}
                <p><a href="{{ url('art/'.$art->id) }}">Read more </a></p>
            </div>
        @endforeach

    {!! $article->links() !!}
    {{--<div class="article" style="padding:5px 20px 2px 20px; background:none; border:0;">--}}
    {{--<p>Page 1 of 2 <span class="butons"><a href="#">3</a><a href="#">2</a> <a href="#" class="active">1</a></span></p>--}}
    {{--</div>--}}
</div>
    @endsection
{{--<script language="javascript" type="text/javascript">--}}
    {{--var i = 5;--}}
    {{--var intervalid;--}}
    {{--intervalid = setInterval("fun()", 1000);--}}
    {{--function fun() {--}}
        {{--if (i == 0) {--}}
            {{--window.location.href = "{{ url('/') }}";--}}
            {{--clearInterval(intervalid);--}}
        {{--}--}}
        {{--document.getElementById("mes").innerHTML = i;--}}
        {{--i--;--}}
    {{--}--}}
{{--</script>--}}