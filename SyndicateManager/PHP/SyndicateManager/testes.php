<?php
	
	require 'conexao_bd.php';
	
	$sql_select = "SELECT * FROM associado WHERE '".date('Y-m-d')."' - data_pagamento > 30";
	
	$sql_comm = mysql_query($sql_select);
	
	while($dados = mysql_fetch_array($sql_comm)){
		
		
	}
	
	
?>