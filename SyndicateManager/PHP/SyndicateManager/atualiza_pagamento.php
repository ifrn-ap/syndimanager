<?php
	
	require 'conexao_bd.php';

	if(isset($_GET['lider_familiar'])){

		$lider_familiar = $_GET['lider_familiar'];
	  
		$sql_update = "UPDATE associado SET data_pagamento='".date("Y-m-d")."' WHERE lider_familiar='".$lider_familiar."' OR cpf='".$lider_familiar."'";
	  
		if($sql_comm = mysql_query($sql_update)){
			header('Location:pagamentos_atrasados.php');				
		}else{
			echo mysql_error();
		}
	}


?>