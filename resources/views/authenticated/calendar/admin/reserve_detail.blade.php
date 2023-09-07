@extends('layouts.sidebar')

@section('content')
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-50 m-auto h-75">
    <p><span><?php echo date('Y年m月d日',strtotime($date)); ?></span><span class="ml-3">{{$part}}部</span></p>
    <div class="h-75 border">
      <table class="">
        <tr class="text-center">
          <th class="w-25">ID</th>
          <th class="w-25">名前</th>
          <th class="w-25">場所</th>
        </tr>
          @foreach($reservePersons->users as $persons)
          <tr class="text-center">
            <td class="w-25">{{$persons->id}}</td>
            <td class="w-25"><span>{{$persons->over_name}}</span><span>{{$persons->under_name}}</span></td>
            <td>リモート</td>
          </tr>
          @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
