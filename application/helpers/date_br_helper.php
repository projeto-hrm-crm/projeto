<?php

function date_br($date){
	if(strpos($date, '/') !== FALSE){
		$date_array = explode('/', $date);
		return $date_array[2].'-'.$date_array[1].'-'.$date_array[0];
	}else{
		$date_array = explode('/', $date);
		return $date_array[0].'-'.$date_array[1].'-'.$date_array[2];
	}
}