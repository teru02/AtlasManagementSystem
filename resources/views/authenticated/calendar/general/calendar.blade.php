@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="w-75 m-auto border" style="border-radius:5px;">

      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
  <div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <form action="{{ route('deleteParts') }}" method="post">
      <div class="w-100">
        <div class="w-50 m-auto">
          <p>予約日：</p>
          <p class="modal-inner-day w-100"></p>
        </div>
        <div class="w-50 m-auto pt-3 pb-3">
          <p>部数：</p>
          <p class="modal-inner-part"></p>
        </div>
        <div class="w-50 m-auto edit-modal-btn d-flex">
          <a class="js-modal-close btn btn-danger d-inline-block" href="">閉じる</a>
          <input type="hidden" class="delete-hidden-part" name="reserve_part" value="">
          <input type="hidden" class="delete-hidden-day" name="reserve_day" value="">
          <input type="hidden" class="delete-modal-hidden" name="value" value="">
          <input type="submit" class="btn btn-primary d-block" value="削除">
        </div>
      </div>
      {{ csrf_field() }}
    </form>
  </div>
</div>
</div>
@endsection
