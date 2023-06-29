<?php
namespace App\Calendars\Admin;
use Carbon\Carbon;
use App\Models\Users\User;

class CalendarView{
  private $carbon;

  function __construct($date){
    $this->carbon = new Carbon($date);
  }

  public function getTitle(){
    return $this->carbon->format('Y年n月');
  }

  public function render(){
    $html = [];
    $html[] = '<div class="calendar text-center">';
    $html[] = '<table class="table m-auto border">';
    $html[] = '<thead>';
    $html[] = '<tr>';
    $html[] = '<th class="border">月</th>';
    $html[] = '<th class="border">火</th>';
    $html[] = '<th class="border">水</th>';
    $html[] = '<th class="border">木</th>';
    $html[] = '<th class="border">金</th>';
    $html[] = '<th class="border">土</th>';
    $html[] = '<th class="border">日</th>';
    $html[] = '</tr>';
    $html[] = '</thead>';
    $html[] = '<tbody>';

    // 週カレンダーオブジェクトの配列を取得
    $weeks = $this->getWeeks();

    // 週カレンダーオブジェクトを一週ずつ処理
    foreach($weeks as $week){
      // 週カレンダーオブジェクトを使ってHTMLのクラス名を出力
      $html[] = '<tr class="'.$week->getClassName().'">';
      // 週カレンダーオブジェクトから、日カレンダーオブジェクトの配列を取得
      $days = $week->getDays();
      // 日カレンダーオブジェクトをループさせながらクラス名を出力し<td>の中に日カレンダーを出力
      foreach($days as $day){
        $startDay = $this->carbon->format("Y-m-01");
        $toDay = $this->carbon->format("Y-m-d");
        if($startDay <= $day->everyDay() && $toDay >= $day->everyDay()){
          $html[] = '<td class="past-day border">';
        }else{
          $html[] = '<td class="border '.$day->getClassName().'">';
        }
        $html[] = $day->render();
        $html[] = $day->dayPartCounts($day->everyDay());
        $html[] = '</td>';
      }
      $html[] = '</tr>';
    }
    $html[] = '</tbody>';
    $html[] = '</table>';
    $html[] = '</div>';

    return implode("", $html);
  }

  protected function getWeeks(){
    $weeks = [];
        // 月の開始日取得
    $firstDay = $this->carbon->copy()->firstOfMonth();
    // 月の終了日取得
    $lastDay = $this->carbon->copy()->lastOfMonth();
    // 一週目　１日を指定してCalenderWeekを作成
    $week = new CalendarWeek($firstDay->copy());
    $weeks[] = $week;
    // 作業用の日　翌週の月曜がほしいので⁺７日したあとに週の開始日に移動する
    $tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();
    // 月末までループしながら一週ごとにCalenderWeekを作成　
    while($tmpDay->lte($lastDay)){
      $week = new CalendarWeek($tmpDay, count($weeks));
      $weeks[] = $week;
      $tmpDay->addDay(7);
      // １週毎に＋７日することで＄tmpdayを翌週に移動している。CalenderWeekを作成する際に第二引数でcount($weeks)を指定しているのは、何週目かを週カレンダーに伝えるため。
    }
    return $weeks;
  }
}
