@extends('layouts.frame')
@section('plate')
      <div class="mainbar">
        <div class="article">
          @foreach($article as $art)
          <h2><span>{{ $art->title }}</span></h2><div class="clr"></div>
          <input type="hidden" value="{{ $art->id }}" class="hi_id">
          <p>Posted by <a href="#">{{ $art->user->name }}</a>  <span>&nbsp;&bull;&nbsp;</span>  Filed under:&nbsp;<a href="#">{{ $art->category->name }}</a><span>&nbsp;&bull;&nbsp;</span>&nbsp;点击量:&nbsp;{{ $art->view_count }} </p>
          {!! $art->content !!}
            <p>Tagged:
              @foreach($art->tags as $tag)
              <a href="#">{{ $tag->name }}</a>
                @endforeach
            </p>
          <p><a href="#"><strong>Comments ({{ $art->comment_count }})</strong></a>  <span>&nbsp;&bull;&nbsp;</span>  {{ $art->created_at }} </p>

        </div>
        @if($art->comment_count)
        <div class="article">
          <h2><span>{{ $art->comment_count }}</span> Responses</h2><div class="clr"></div>
          @foreach($art->comment as $com)
            <div class="comment">
              <a href="#"><img src="{{ asset('images/userpic.gif') }}" width="40" height="40" alt="user" class="userpic" /></a>
              <p><a href="#">{{ $com->user }}</a> Says:<br />{{ $com->created_at }}</p>
              <p>{{ $com->content }}</p>
            </div>
            @endforeach
        </div>
        @endif
        @endforeach
        <div class="article">
          <h2><span>Leave a</span> Reply</h2><div class="clr"></div>
          <ol>
            <li>
              <label for="name">username (required)</label>
              <input id="name" name="username" class="text" />
            </li>
            <li>
              <label for="title">title (required)</label>
              <input id="title" name="name" class="text" />
            </li>
            <li>
              <label for="message">Your Message(required)</label>
              <textarea id="message" name="content" rows="8" cols="50"></textarea>
            </li>
            <li>
              <input type="image" name="imageField" id="imageField" src="{{ asset('../images/submit.gif') }}" class="send" />
              <div class="clr"></div>
            </li>
          </ol>
        </div>
      </div>
  <script>
    $(document).ready(function(){
        $('.send').click(function(){
          var name = $('#title').val();
          var user = $('#name').val();
          var content = $('#message').val();
          var article_id = $('.hi_id').val();
            $.post('{{ url('comment') }}',{'_method':'post','_token':'{{ csrf_token() }}','article_id':article_id,'name':name,'user':user,'content':content},function(data){
              if(!data.status){
                //var html = "<div class='comment'> <a href='#'><img src='{{ asset('../images/userpic.gif') }}' width='40' height='40' alt='user' class='userpic' /></a> <p><a href='#'>"+user+"</a> Says:<br />"+data.status+"</p> <p>"+content+"</p> </div>";
                location.href = location.href;
              }else{
                layer.msg('请填写相关内容',{icon:5});
              }
            },'json');
        });
    });

  </script>
@endsection
