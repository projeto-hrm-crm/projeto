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


/**
 * @author: Tiago Villalobos
 * Transforma um timestamp em data no formato brasileiro
 * Utilizando o parâmetro $full é possível definir se as horas serão concatenadas no retorno
 * $full ? data e hora : somente data
 * 
 * @param: $timestamp string
 * @param: $full boolean
 * @return: string - Data formatada
 */
function swicthTimestamp($timestamp, $full = TRUE)
{
	$parts = explode(' ', $timestamp);
	
	return $full ? switchDate($parts[0]).' '.$parts[1] : switchDate($parts[0]);
}

