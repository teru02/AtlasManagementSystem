@extends('layouts.sidebar')

@section('content')
<div class="vh-100 " style="padding-top:10px;">
  <span class="pl-3">{{ $user->over_name }}</span><span class="pl-2">{{ $user->under_name }}さんのプロフィール</span>
  <div class="top_area w-75 m-auto pt-5">
    <div class="user_status p-3">
      <p>名前 : <span>{{ $user->over_name }}</span><span class="ml-1">{{ $user->under_name }}</span></p>
      <p>カナ : <span>{{ $user->over_name_kana }}</span><span class="ml-1">{{ $user->under_name_kana }}</span></p>
      <p>性別 : @if($user->sex == 1)<span>男</span>@else<span>女</span>@endif</p>
      <p>生年月日 : <span>{{ $user->birth_day }}</span></p>
      <div>選択科目 :
        @foreach($user->subjects as $subject)
        <span>{{ $subject->subject }}</span>
        @endforeach
      </div>
      <div class="profile-acd">
        @can('admin')
        <span class="subject_edit_btn">選択科目の登録</span>
        <div class="subject_inner">
          <form action="{{ route('user.edit') }}" method="post">
            @foreach($subject_lists as $subject_list)
            <div style="display:inline-block; font-size:13px;">
              <label>{{ $subject_list->subject }}</label>
              <input type="checkbox" name="subjects[]" value="{{ $subject_list->id }}">
            </div>
            @endforeach
            <input type="submit" value="登録" class="btn btn-primary" style="font-size:13px;">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            {{ csrf_field() }}
          </form>
        </div>
        @endcan
      </div>
    </div>
  </div>
</div>

@endsection
