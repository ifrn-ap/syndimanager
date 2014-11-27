<?php 
	
	session_start();
	
	$hora_atual = time();
	$tempo_online = $hora_atual - $_SESSION['hora_acessou'];
			
	if(!isset($_SESSION['usuario'])){		
		header("Location:index.php?error=2");
	}else if($tempo_online > 2400){
		header("Location:logout.php?error=3");	
	}else if(!isset($_COOKIE['pagina'])){
		header("Location:home.php");
	}else{
		$_SESSION['hora_acessou'] = time();
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
</head>

<body>
	<?php
    	
		require 'conexao_bd.php';
		include 'funcoes.php';
		
			if(isset($_COOKIE['pagina'])){
				if(isset($_GET['matricula'])){
					$matricula = $_GET['matricula'];
					$sql_select = "SELECT matricula, nome, data_admissao, data_pagamento, endereco_id , lider_familiar FROM associado WHERE matricula=".$matricula;
					
				}else if(isset($_COOKIE['dados'])){
			  		if($_COOKIE['parametro'] == "matricula"){
						$matricula = $_COOKIE['dados'];
						$sql_select = "SELECT matricula, nome, data_admissao, data_pagamento, endereco_id , lider_familiar FROM associado WHERE matricula=".$matricula;
						
			  		}else if($_COOKIE['parametro'] == "cpf"){
			  			$cpf = $_COOKIE['dados'];
						$sql_select = "SELECT matricula, nome, data_admissao, data_pagamento, endereco_id, lider_familiar FROM associado WHERE cpf='".$cpf."'";						
			  		}
				}
					
					$sql_comm = mysql_query($sql_select);
															
					
					if($dados = mysql_fetch_array($sql_comm)){
    ?>
	<div id="header">
    	<div id="logo_sm">
        	<a href="home.php"><img src="imagens/logo_sm.png" alt="logo_syndicatemanager" /></a>
        </div>
        
        <div id="navbar">
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
		</div>
	</div>
    
    <div id="content">
    	<div id="cabecalho">
        	<h3 id="cabecalho_pag">Realmente deseja remover este associado?</h3>
      	</div>
        
        <div>
          <fieldset id="resultado_busca">
          	  <div class="campos_resultado">
                  <label><span>Nome:</span><?php echo " ".$dados['nome']; ?></label>
              </div>
          
              <div class="campos_resultado">
                  <label><span>Matricula:</span><?php echo " ".$dados['matricula']; ?></label>
              </div>
              
              <div class="campos_resultado">
                  <label><span>Líder Familiar:</span><?php echo " ".$dados['lider_familiar']; ?></label>
              </div>
              
              <div class="campos_resultado">
                  <label><span>Data Admissão:</span><?php echo " ".implode("/",array_reverse(explode("-",$dados['data_admissao']))); ?></label>
              </div>
              
              <div class="campos_resultado">
                  <label><span>Situação:</span><?php echo " ".setSituacao(implode("-",array_reverse(explode("-",$dados['data_pagamento'])))); ?></label>
              </div>
              
          </fieldset>
          
          
          <form name="frmRemover" method="post" action="remove_associado.php">
            <div class="botoes">
              <input type="hidden" name="hdnMatricula" value="<?php echo " ".$dados['matricula']; ?>" />
              <input type="hidden" name="hdnEndereco" value="<?php echo " ".$dados['endereco_id']; ?>" />
              <input type="submit" name="btnRemover" id="btnRemover" value="Remover" class="button" />
              <a href="busca.php?acao=remover" class="button" id="btnCancelar">Cancelar</a>
            </div>
          </form>
          
	</div>
	<?php
		
					}else{
						header("Location:busca.php?acao=remover&error=1");	
					}
			}
	?>        	
</body>
</html>