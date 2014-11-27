<?php 

	//Tenta a conexão com banco de dados (servidor, usuario, senha)
	$bdconn = mysql_connect("localhost","root","");

	//Verifica se a conexão não foi bem sucedida e retorna uma mensagem de erro.	
	if(!$bdconn){
		
		echo "Não foi possível efetuar conexão com banco de dados!";
		
	}else{
		
		//Caso a conexão seja estabelecida, tentará selecionar o banco de dados.
		mysql_select_db("sindicato",$bdconn);
		mysql_set_charset("utf8");		
	}

?>