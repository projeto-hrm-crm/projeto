<?php
/*
 * @author: Dhiego Balthazar
 * metodo que retorna uma data trocada: se houver o caracter '-' ele troca por
 * '/' e transforma na data do Brasil
 * se não ele transforma na data que o banco de dados aceita
 * @params: $date
 * @returns: $date
 */
function switchDate($date){
	if(strpos($date, '-') !== FALSE){
            $date_array = explode('-', $date);
            $char = '/';
            
	}else{
            $date_array = explode('/', $date);
            $char = '-';
            
	}
        return $date_array[2].$char.$date_array[1].$char.$date_array[0];
}