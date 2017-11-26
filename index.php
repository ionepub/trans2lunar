<?php
header("Content-Type:text/html;charset=utf-8");
include_once './Lunar.class.php';
$lunar=new Lunar();

$output_str = "";
$data = "";

if(isset($_POST['datelist']) && trim($_POST['datelist']) != ""){
	$data = $_POST['datelist'];
	$arr = explode("\n", $data);
	$output = array();
	for ($i=0; $i < count($arr); $i++) { 
		if(!trim($arr[$i])){
			$output[] = "";
			continue;
		}
		$temp_time = strtotime($arr[$i]);
		if(!$temp_time){
			$output[] = "";
			continue;
		}
		$year = date("Y", $temp_time);
		$month = date("m", $temp_time);
		$day = date("d", $temp_time);

		$temp_lunar = $lunar->convertSolarToLunar($year, $month, $day);
		// echo $temp_lunar[0] ."年". $temp_lunar[1] . $temp_lunar[2] . "<br>";
		$output[] = $temp_lunar[0] ."年". $temp_lunar[1] . $temp_lunar[2];
	}
	$output_str = implode("\n", $output);
}

include_once './lunar_template.html';

die;
