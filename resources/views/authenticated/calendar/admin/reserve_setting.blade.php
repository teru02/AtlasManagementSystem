@extends('layouts.sidebar')
@section('content')
<div class="w-100 vh-100 pt-1 ">
  <div class="w-75 vh-80 m-auto pb-1" style="border-radius:5px; background:#FFF; box-shadow:0 0 10px #DBE0E4;">
    <div class="w-100 vh-80 pt-3">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
        {!! $calendar->render() !!}
    <div class="adjust-table-btn m-auto text-right pt-1">
      <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
    </div>
  </div>
  </div>
</div>
@endsection
