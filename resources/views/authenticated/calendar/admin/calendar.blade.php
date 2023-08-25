@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="w-75 m-auto pt-5" style="border-radius:5px; background:#FFF; box-shadow:0 0 10px #DBE0E4; height:95%;">
    <div class="w-75 m-auto" style=" height:100%;">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <p>{!! $calendar->render() !!}</p>
    </div>
  </div>
</div>
@endsection
