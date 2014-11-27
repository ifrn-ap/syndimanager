<?php
	
	require 'conexao_bd.php';
	include 'funcoes.php';
	
	if(isset($_POST['hdnMatricula'])){
		if(isset($_POST['hdnEndereco'])){
			
			$matricula = $_POST['hdnMatricula'];
			$endereco_id = $_POST['hdnEndereco'];
		
			$sql_delete = "DELETE FROM associado,endereco USING associado INNER JOIN endereco WHERE matricula=".$matricula." AND associado.endereco_id = endereco.id";
			$sql_delete_usuario = "DELETE FROM usuario WHERE associado_matricula=".$matricula;
			
			$sql_comm = mysql_query($sql_delete);
			$sql_comm_usuario = mysql_query($sql_delete_usuario);
			
			if($sql_comm){
				if($sql_comm_usuario){
					$sql_alter_associado = "ALTER TABLE associado AUTO_INCREMENT =". setCampoMatricula();
					$sql_alter_endereco = "ALTER TABLE endereco AUTO_INCREMENT =". setCampoMatricula();
										
					$sql_comm_associado = mysql_query($sql_alter_associado);
					$sql_comm_endereco = mysql_query($sql_alter_endereco);		
										
					header("Location:busca.php?acao=remover&sucesso=2");					
				}
			}
		}
	}
	
	
	
	
	
	
?>