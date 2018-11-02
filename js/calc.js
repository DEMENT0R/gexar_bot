$script_update_time = 500;
$staf_quantity = 0;
$staf_salary = 0;

setInterval(function(){
  //Тип бота
  if ($("#radios-1-0").prop("checked")) {
    $bot_type = 10000;
  }
  if ($("#radios-1-1").prop("checked")) {
    $bot_type = 20000;
  }
  if ($("#radios-1-2").prop("checked")) {
    $bot_type = 40000;
  }
  //Ум бота
  if ($("#radios-2-0").prop("checked")) {
    $bot_int = 10000;
  }
  if ($("#radios-2-1").prop("checked")) {
    $bot_int = 30000;
  }
  if ($("#radios-2-2").prop("checked")) {
    $bot_int = 60000;
  }
  //Количество сотрудников
  if ($("#textinput_quant").val()){
    $staf_quantity = $("#textinput_quant").val();
  }
  if ($("#textinput_salary").val()){
    $staf_salary = $("#textinput_salary").val();
  }
  //Общая стоимость
  $total_result = $bot_type + $bot_int + ($staf_quantity * $staf_salary);
  $pre_total_result = $bot_type + " + " + $bot_int + " + ( " + $staf_quantity + " X " + $staf_salary + " ) = ";
  $("#total_result").text($pre_total_result + "" + $total_result);
  //console.log('$total_result: '+$total_result);
  //Окупаемость
  $bot_cost = $bot_type + $bot_int;
  $men_cost = ($staf_quantity * $staf_salary) / 30;
  $total_profit = $bot_cost / $men_cost;
  $("#total_profit").html("Дней до полной окупаемости: <b>" + Math.round($total_profit) + ".</b>");
  //Прибыль
  $this_year_profit = (365 - $total_profit) * $men_cost;
  $("#this_year_profit").html("Высвобождено средств за текущий год: <b>" + Math.round($this_year_profit) + " руб.</b>");

  $year_profit = 365 * $men_cost;
  $("#year_profit").html("<h4>" + Math.round($year_profit) + " руб. чистой прибыли за каждый последующи год, и это не считая индексации ЗП!</h4>");
}, $script_update_time);
