@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}" style="color:#000000; font-weight:bold;">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
        <p><span class="category_btn"></span></p>
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class="" style="margin-left:5px;">{{$post_comment->commentCounts($post->id)}}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}" style="margin-left:5px;">{{ $like->likeCounts($post->id) }}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}" style="margin-left:5px;">{{ $like->likeCounts($post->id) }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area w-25">
    <div class="m-4">
      <div class="btn search-content" style=" background-color:#04A9D2;"><a href="{{ route('post.input') }}" style="color:white;" >投稿</a></div>
      <div class="search-content search-1">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest" class="search-box"><input type="submit" value="検索" form="postSearchRequest" class="search-btn">
      </div>
      <div class="search-content search-2">
        <input type="submit" name="like_posts" class=" like-post-btn" value="いいねした投稿" form="postSearchRequest" >
        <input type="submit" name="my_posts" class=" mypost-btn" value="自分の投稿" form="postSearchRequest" >
      </div>
      <div>
        <p style="font-size:13px; padding-top:10px;">カテゴリー検索</p>
        <ul>
          @foreach($categories as $category)
          <li class="main_categories" category_id="{{ $category->id }}"><span>{{ $category->main_category }}</span>
            @foreach($category->SubCategories as $sub_category)
            <li class="sub_categories"><input type="submit" name="category_word" class="category_btn" value="{{$sub_category->sub_category}}" form="postSearchRequest"></li>
            @endforeach
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection
