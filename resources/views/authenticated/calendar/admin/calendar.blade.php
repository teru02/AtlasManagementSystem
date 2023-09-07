@extends('layouts.sidebar')

@section('content')
<div class="w-100 vh-100 pt-5">
  <div class="w-75  m-auto pb-3" style="border-radius:5px; background:#FFF; box-shadow:0 0 10px #DBE0E4;">
    <div class="w-100 m-auto pt-3" style=" height:100%;">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
      {!! $calendar->render() !!}
    </div>
  </div>
</div>
@endsection
