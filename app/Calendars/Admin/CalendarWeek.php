<?php
namespace App\Calendars\Admin;

use Carbon\Carbon;

// その週のカレンダーを出力するためのクラス
class CalendarWeek{
  protected $carbon;
  protected $index = 0;

  function __construct($date, $index = 0){
    $this->carbon = new Carbon($date);
    $this->index = $index;
  }

  // HTMLを表示するときに後からCSSを充てることができるようクラス名を出力するgetClassName()関数
  function getClassName(){
    return "week-" . $this->index;
  }

  // 週の開始日～終了日までを作成するgetDays()関数
  function getDays(){
    $days = [];
    // Carbonを利用し週の開始～終了日を作成
    $startDay = $this->carbon->copy()->startOfWeek();
    $lastDay = $this->carbon->copy()->endOfWeek();
    // 作業用
    $tmpDay = $startDay->copy();

    // 月曜～日曜までループ
    while($tmpDay->lte($lastDay)){
      // 月を比較。違う月の場合は前または後の余白のため分けている
      if($tmpDay->month != $this->carbon->month){
        // 違う月の場合は余白用のカレンダー日オブジェクトを追加
        $day = new CalendarWeekBlankDay($tmpDay->copy());
        $days[] = $day;
        $tmpDay->addDay(1);
        continue;
       }
      // 同じ月の場合は通常のカレンダー日オブジェクトを追加
       $day = new CalendarWeekDay($tmpDay->copy());
       $days[] = $day;
       $tmpDay->addDay(1);
    }
    return $days;
  }
}
