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
	
	if(isset($_GET['sucesso'])){
		if($_GET['sucesso'] == 1)
			echo "<script type='text/javascript'> window.alert('Senha atualizada com sucesso!') </script>";
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
    	<div id="cabecalho">
    		<h2 id="cabecalho_pag">Alterar Senha</h2>
            <hr />
      	</div>
        
        <div id="componentes">
          <form nome="frmAlterarSenha" method="post" action="altera_senha.php" autocomplete="off">
              <div class="text_box">
                <label>Senha Atual:
                    <input type="password" name="txtSenhaAtual" id="txtSenhaAtual" class="input" autofocus />
                </label>
              </div>
              
              <div class="text_box">
                <label>Nova Senha:
                    <input type="password" name="txtNovaSenha" id="txtNovaSenha" class="input" />
                </label>
              </div>
              
              <div class="text_box">
                <label>Confirmar Nova Senha:
                    <input type="password" name="txtConfirmaNovaSenha" id="txtConfirmarNovaSenha" class="input" />
                </label>
              </div>
              
              <div class="botoes">
              	<input type="submit" name="btnAlterarSenha" id="btnAtualizar" value="Alterar Senha" class="button" onclick="return valida_senha()" /> 
          	  </div>
          </form>
        </div>         
	</div>
        	
</body>
</html>