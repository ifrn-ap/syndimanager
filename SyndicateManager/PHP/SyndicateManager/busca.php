<?php 
	
	session_start();
	
	$hora_atual = time();
	$tempo_online = $hora_atual - $_SESSION['hora_acessou'];
			
	if(!isset($_SESSION['usuario'])){		
		header("Location:index.php?error=2");
	}else if($tempo_online > 2400){
		header("Location:logout.php?error=3");	
	}else{
		$_SESSION['hora_acessou'] = time();
	}
	
	if(isset($_GET['error'])){
		if($_GET['error'] == 1)
			echo "<script type='text/javascript'> window.alert('Associado(a) não encontrado!') </script>";
	}else if(isset($_GET['sucesso'])){
		if($_GET['sucesso'] == 1)
			echo "<script type='text/javascript'> window.alert('Associado(a) atualizado com sucesso!') </script>";
		else if($_GET['sucesso'] == 2)
			echo "<script type='text/javascript'> window.alert('Associado(a) removido com sucesso!') </script>";
	}
	
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
<script type="text/javascript" src="javascript/scripts.js"></script>
<script type="text/javascript" src="javascript/jquery/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="javascript/jquery/jquery.maskedinput-1.1.4.pack.js"></script>
<script type="text/javascript">
	function mascara(){
	
	  if(document.getElementById("rdCPF").checked || document.getElementById("rdLiderFamiliar").checked){
		  jQuery(function($){
			  $("#txtFiltro").mask("999.999.999-99");
		  });
	  }else{
		  jQuery(function($){
			  $("#txtFiltro").unmask();
		  });
	  }
	}
</script>
</head>

<body>

	<?php
		
		if(isset($_GET['acao'])){
			
			$acao = $_GET['acao'];
			
			 if(isset($_POST['tipo_pesquisa'])){
				if(isset($_POST['txtFiltro'])){ 
			 		
					$tipo_pesquisa = $_GET['acao'];
					$parametro_pesquisa = $_POST['tipo_pesquisa'];
					$dados_pesquisa = $_POST['txtFiltro'];
					
					setcookie("tipo_pesquisa", $acao, time() + 15);
					setcookie("parametro_pesquisa", $_POST['tipo_pesquisa'], time() + 15);
					setcookie("dados_pesquisa", $_POST['txtFiltro'], time() + 15);
					
					
					header("Location:efetua_busca.php");		 
			 
				}
			 }		
		}
	?>


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
                    	<li id="consulta"><a href="busca.php?acao=consultar">Consulta de Cadastro</a></li>
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
    
    <div id="content">
    	<div id="pesquisa">            	  
          <form nome="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF']."?acao=".$_GET['acao']; ?>" autocomplete="off">
              
              	<div class="radio_button">
                  <label>
                    <input type="radio" name="tipo_pesquisa" id="rdMatricula" value="matricula" onclick="verifica_filtro()" checked />Matricula
                  </label>
                </div>
                                           
                <div class="radio_button">
                  <label> 
                    <input type="radio" name="tipo_pesquisa" id="rdNome" value="nome"  onclick="verifica_filtro()"  />Nome
                  </label>
                </div>  
                 
                 <div class="radio_button">
                  <label> 
                    <input type="radio" name="tipo_pesquisa" id="rdCPF" value="cpf"  onclick="verifica_filtro()" />CPF
                  </label>
                </div>
                 
                <div class="radio_button">
                  <label>
                    <input type="radio" name="tipo_pesquisa" id="rdLiderFamiliar" value="lider_familiar" onclick="verifica_filtro()" />Líder Familiar
                  </label>
                </div>
                 
              
              <div id="campo_pesquisa">    
              	<input type="text" name="txtFiltro" id="txtFiltro" placeholder="Matricula" onfocus="mascara()" />
                <input type="image" name="btnFiltrar" id="btnFiltrar" src="imagens/icons/black/funcao_pesquisa_24px.png" onclick="return valida_busca()" />
              </div>
          </form>
        </div>         
	</div>
        	
</body>
</html>