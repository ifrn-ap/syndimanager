<?php	
	
	//Inicio a sessão corrente
	session_start();
	
	//Destruo a sessão corrente
	session_destroy();
	
	setcookie('pagina');
	
	if(isset($_GET['error'])){
		if($_GET['error'] == 3){
			header("Location:index.php?error=3");
		}			
	}else if(isset($_GET['warning'])){
		if($_GET['warning'] == 1){
				header("Location:index.php?warning=1");
			}	
		
	}else{
		
		//Redirecionando a página para index.php
		header("Location:index.php");
		
	}

?>