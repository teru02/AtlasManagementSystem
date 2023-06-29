<?php
namespace App\Calendars\Admin;


// 余白用日カレンダークラス
// 日カレンダーをカスタマイズして、クラス名とHTMLだけ別の処理になるようなクラスを作成している。クラス名は「day-blank」、render()で何も出力しないように上書き
class CalendarWeekBlankDay extends CalendarWeekDay{

  function getClassName(){
    return "day-blank";
  }

  function render(){
    return '';
  }

  function everyDay(){
    return '';
  }

  function dayPartCounts($ymd = null){
    return '';
  }

  function dayNumberAdjustment(){
    return '';
  }
}
