@extends('layouts.sidebar')

@section('content')
<div class="search_content w-100 d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border one_person">
      <div>
        <span style="color:#999999;">ID : </span><span>{{ $user->id }}</span>
      </div>
      <div>
        <span style="color:#999999;">名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}" style="color:#03AAD2;">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span style="color:#999999;">カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span style="color:#999999;">性別 : </span><span>男</span>
        @else
        <span style="color:#999999;">性別 : </span><span>女</span>
        @endif
      </div>
      <div>
        <span style="color:#999999;">生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span style="color:#999999;">権限 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span style="color:#999999;">権限 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span style="color:#999999;">権限 : </span><span>講師(英語)</span>
        @else
        <span style="color:#999999;">権限 : </span><span>生徒</span>
        @endif
      </div>
      <div>
        @if($user->role == 4)
         <span style="color:#999999;">選択科目 :</span>
          @foreach($user->subjects as $subject)
          <span>{{$subject->subject}}</span>
          @endforeach
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area w-25">
    <div class="">
      <p style="color: #4A6C89;">検索</p>
      <div class="search-element">
        <input type="text" class="free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div class="search-element">
        <label >カテゴリ</label>
        <select form="userSearchRequest" name="category">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div class="search-element">
        <label>並び替え</label>
        <select name="updown" form="userSearchRequest">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="search-element element-add">
        <p class="m-0 search_conditions"><span>検索条件の追加</span></p>
        <div class="search_conditions_inner">
          <div>
            <label>性別</label>
            <div>
              <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest" style="margin-right:10px;">
              <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
            </div>
          </div>
          <div>
            <label>権限</label>
            <select name="role" form="userSearchRequest" class="engineer">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer">
            <label>選択科目</label>
            <div>
            @foreach($all_subjects as $subject)
              <label id="subjects" style="margin-top:0; padding-top:0; color:#000;">{{ $subject->subject }}</label>
              <input id="subjects" type="checkbox" name="subjects[]" value="{{ $subject->id }}" form="userSearchRequest" style="margin-right:10px;">
            @endforeach
            </div>
          </div>
        </div>
      </div>

      <div>
        <input type="submit" name="search_btn" value="検索" form="userSearchRequest" class="btn" style="background-color:#03AAD2; color:#FFF; margin:10px 0; width:100%;">
      </div>
      <div>
        <input type="reset" value="リセット" form="userSearchRequest" class="btn" style="background-color:#ECF1F6; color:#03AAD2; margin:0 0 10px 0; width:100%;">
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
@endsection
