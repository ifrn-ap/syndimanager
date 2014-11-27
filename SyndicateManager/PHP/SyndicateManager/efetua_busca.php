<?php
	
	
	if(isset($_COOKIE['tipo_pesquisa'])){
		if(isset($_COOKIE['parametro_pesquisa'])){
			if(isset($_COOKIE['dados_pesquisa'])){
				
				$tipo_pesquisa = $_COOKIE['tipo_pesquisa'];
				$parametro_pesquisa = $_COOKIE['parametro_pesquisa'];
				$dados_pesquisa = $_COOKIE['dados_pesquisa'];
				
				if($tipo_pesquisa == "atualizar"){
					if($parametro_pesquisa == "matricula"){
					
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "matricula", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:ficha_atualizacao.php");
					
					
					}else if($parametro_pesquisa == "nome"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "nome", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");
					
					
					}else if($parametro_pesquisa == "cpf"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "cpf", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:ficha_atualizacao.php");				
												
					}else if($parametro_pesquisa == "lider_familiar"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "lider_familiar", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");				
												
					}					
									
				}else if($tipo_pesquisa == "remover"){
					if($parametro_pesquisa == "matricula"){
					
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "matricula", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:remover_associado.php");
					
					
					}else if($parametro_pesquisa == "nome"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "nome", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");
					
					
					}else if($parametro_pesquisa == "cpf"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "cpf", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:remover_associado.php");				
												
					}else if($parametro_pesquisa == "lider_familiar"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "lider_familiar", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");				
												
					}
					
				}else if($tipo_pesquisa == "consultar"){
					if($parametro_pesquisa == "matricula"){
					
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "matricula", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:ficha_associado.php");
					
					
					}else if($parametro_pesquisa == "nome"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "nome", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");
					
					
					}else if($parametro_pesquisa == "cpf"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "cpf", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:ficha_associado.php");				
												
					}else if($parametro_pesquisa == "lider_familiar"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "lider_familiar", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");				
												
					}
					
					
				}else if($tipo_pesquisa == "ficha"){
					
				  if($parametro_pesquisa == "matricula"){
					
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "matricula", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:gerar_pdf.php");
					
					
					}else if($parametro_pesquisa == "nome"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "nome", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");
					
					
					}else if($parametro_pesquisa == "cpf"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "cpf", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:gerar_pdf.php");				
												
					}else if($parametro_pesquisa == "lider_familiar"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "lider_familiar", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");				
												
					}	
					
					
				}else if($tipo_pesquisa == "cartao"){
					
					if($parametro_pesquisa == "matricula"){
					
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "matricula", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:gerar_pdf.php");
					
					
					}else if($parametro_pesquisa == "nome"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "nome", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");
					
					
					}else if($parametro_pesquisa == "cpf"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "cpf", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:gerar_pdf.php");				
												
					}else if($parametro_pesquisa == "lider_familiar"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "lider_familiar", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");				
												
					}
					
					
				}else if($tipo_pesquisa == "atividade"){
					
					if($parametro_pesquisa == "matricula"){
					
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "matricula", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:gerar_pdf.php");
					
					
					}else if($parametro_pesquisa == "nome"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "nome", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");
					
					
					}else if($parametro_pesquisa == "cpf"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "cpf", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:gerar_pdf.php");				
												
					}else if($parametro_pesquisa == "lider_familiar"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "lider_familiar", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");				
												
					}
					
				}else if($tipo_pesquisa == "transferencia"){
					if($parametro_pesquisa == "matricula"){
					
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "matricula", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:gerar_pdf.php");
					
					
					}else if($parametro_pesquisa == "nome"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "nome", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");
					
					
					}else if($parametro_pesquisa == "cpf"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "cpf", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:gerar_pdf.php");				
												
					}else if($parametro_pesquisa == "lider_familiar"){
						
						setcookie("pagina", true, time() + 30);
						setcookie("tipo", $tipo_pesquisa, time() + 15);
						setcookie("parametro", "lider_familiar", time() + 15);
						setcookie("dados",$dados_pesquisa, time() + 15);
						header("Location:resultado_busca.php");				
												
					}					
				}
			}
		}
	}
?>