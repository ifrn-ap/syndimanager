<?php 
	
	session_start();
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SyndicateManager</title>
<link rel="icon" href="imagens/icons/black/icone_navegador.png" type="image/png" />
<link rel="shortcut icon" href="imagens/icons/black/icone_navegador.png" type="image/png" />
<link rel="stylesheet" type="text/css" href="css/style_master.css" />
<link rel="stylesheet" type="text/css" href="css/style_components.css" />
</head>

<body>
	<div id="header">
    	<div id="logo_sm">
        	<a href="home.php"><img src="imagens/logo_sm.png" alt="logo_syndicatemanager" /></a>
        </div>
        
        <div id="navbar">
        	<?php
            	if ($_SESSION['acesso'] == 1){
			?>
            <ul id="menu">
            	<li  id="home"><a href="home.php">Pagina Inicial</a></li>
                <li id="cadastro"><a>Cadastro</a>
                	<ul>
                    	<li id="cadastro"><a href="cadastro.php">Cadastro de Associado</a></li>
                        <li id="atualiza"><a href="busca.php?acao=atualizar">Atualização de Cadastro</a></li>
                        <li id="remover"><a href="busca.php?acao=remover">Remoção de Cadastro</a></li>
                    </ul>
                </li>
                <li id="consulta"><a>Consulta</a>
                	<ul>
                    	<li id="consulta"><a href="busca.php?acao=consultar">Consulta de Cadastro</a></li>
                        <li id="pgto_atraso"><a href="pagamentos_atrasados.php">Pagamentos em Atraso</a></li>
                        <li id="grupo_familiar"><a href="grupo_familiar.php">Grupo Familiar</a></li>
                    </ul>
                </li>
                <li id="documentos"><a>Documentos</a>
                	<ul>
                    	<li id="documentos"><a href="busca.php?acao=ficha">Ficha do Associado</a></li>
                        <li id="documentos"><a href="busca.php?acao=cartao">Cartão do Associado</a></li>
                        <li id="documentos"><a href="busca.php?acao=atividade">Declaração de Atividade</a></li>
                        <li id="documentos"><a href="busca.php?acao=transferencia">Documento de Transferência</a></li>
                    </ul>
                </li>
                <li id="config"><a>Configurações</a>
                	<ul>
                    	<li id="mudar_senha"><a href="alterar_senha.php">Alterar Senha</a></li>
                        <li id="criar_conta"><a href="criar_conta.php">Criar Contas</a></li>
                    </ul>
                </li>
                <li id="sair"><a href="logout.php">Sair</a></li>
			</ul>
			<?php }else{ ?>
            
            <ul id="menu" style="width:28.5%;">
            	<li  id="home"><a href="home.php">Pagina Inicial</a></li>
                <li id="consulta"><a>Consulta</a>
                	<ul>
                    	<li id="consulta"><a href="ficha_associado.php?matricula=<?php echo $_SESSION['matricula']; ?>">Consulta de Cadastro</a></li>
                    </ul>
                </li>
                <li id="config"><a>Configurações</a>
                	<ul>
                    	<li id="mudar_senha"><a href="alterar_senha.php">Alterar Senha</a></li> 
                    </ul>
                </li>                
                <li id="sair"><a href="logout.php">Sair</a></li>
			</ul>
            
            <?php } ?>
			
		</div>
	</div>
    
    <div id="content"><label>
    <?php
		if(isset($_SESSION['usuario']) and isset($_SESSION['hora_acessou'])){
			
			$hora_atual = time();
			$tempo_online = $hora_atual - $_SESSION['hora_acessou'];
			
			if($tempo_online <= 2400){
				$_SESSION['hora_acessou'] = time();
				if($_SESSION['acesso'] == 1){
					echo "Seja bem vindo ".$_SESSION['usuario']."!";
				}else if($_SESSION['acesso'] == 0){
					
					include 'conexao_bd.php';
					
					$sql_select = "SELECT nome FROM associado WHERE matricula=".$_SESSION['matricula'];
					
					$sql_comm	= mysql_query($sql_select);
					
					if($nome = mysql_fetch_array($sql_comm)){
						echo "Seja bem vindo ".$nome['nome']."!";
						setcookie("pagina", "associado", time() + 60*60*24);
					}					
				}
			}else{
				header("Location:logout.php?error=3");
			}
		}else{
			header("Location:index.php?error=2");
		}		
    ?>
    </label></div>
        	
</body>
</html>