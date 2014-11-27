<?php 



require 'conexao_bd.php';
header('Content-type: text/html; charset=utf-8',true);


function setCampoMatricula(){
	
	$sql_select = "SELECT matricula FROM associado ORDER BY matricula DESC LIMIT 1";
	
	$sql_comm = mysql_query($sql_select);
	$dados = mysql_fetch_array($sql_comm);
	
	if(mysql_num_rows($sql_comm) > 0){
		$matricula = (int) $dados['matricula'];
		return $matricula + 1;
	}else{
		return 1 ;
	}
	
}

function setCampoEndereco(){
	
	$sql_select = "SELECT id FROM endereco ORDER BY id DESC LIMIT 1";
	
	$sql_comm = mysql_query($sql_select);
	$dados = mysql_fetch_array($sql_comm);
	
	if(mysql_num_rows($sql_comm) > 0){
		$id = (int) $dados['id'];
		return $id + 1;
	}else{
		return 1 ;
	}
	
}

function retira_mascara($variavel,$mascara){

	
	$variavel_explodida = explode($mascara,$variavel);
	$variavel = "";
	
	for($i = 0; $i < count($variavel_explodida); $i++){
		$variavel .= $variavel_explodida[$i];	
	}
		
	return $variavel;
}

function retira_maiusculo($variavel){
		
		
		$variavel = strtolower($variavel);
		$variavel_explodida = explode(" ",ucwords($variavel));
		
		for($i = 0; $i < count($variavel_explodida); $i++){
			if($variavel_explodida[$i] == "De" || $variavel_explodida[$i] == "Do" || $variavel_explodida[$i] == "Da" || $variavel_explodida[$i] == "Das" || $variavel_explodida[$i] == "Dos" || $variavel_explodida[$i] == "E"){
				$variavel_explodida[$i] = strtolower($variavel_explodida[$i]);
			}						
		}
		
		$variavel = implode(" ", $variavel_explodida);
		return $variavel;
		
}

function setSituacao($data){
	
	$data_pagamento = new DateTime($data);
	$data_atual = new DateTime(date('d-m-Y'));
	$data_final = $data_pagamento->diff($data_atual)->days;
	
	if((int)$data_final > 30){
		return "<label id='em_atraso'>Em Atraso</label>";		
	}else{
		return "<label id='em_dia'>Em Dia</label>";	
	}
	
	
}


function retornaMes($mes){
	
	switch ($mes) {
        case "01":    $mes = Janeiro;     break;
        case "02":    $mes = Fevereiro;   break;
        case "03":    $mes = Março;       break;
        case "04":    $mes = Abril;       break;
        case "05":    $mes = Maio;        break;
        case "06":    $mes = Junho;       break;
        case "07":    $mes = Julho;       break;
        case "08":    $mes = Agosto;      break;
        case "09":    $mes = Setembro;    break;
        case "10":    $mes = Outubro;     break;
        case "11":    $mes = Novembro;    break;
        case "12":    $mes = Dezembro;    break; 
 	}
 
 	return $mes;	
	
}



?>