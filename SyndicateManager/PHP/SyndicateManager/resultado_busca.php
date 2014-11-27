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
    	<?php
        	
			require 'conexao_bd.php';
			
        	if(isset($_COOKIE['tipo'])){
				if(isset($_COOKIE['parametro'])){
						if(isset($_COOKIE['dados'])){
				
						$parametro = $_COOKIE['parametro'];
						$tipo = $_COOKIE['tipo'];
						$dados = $_COOKIE['dados'];
											        
    	?>
    	<div id="cabecalho">
        	<?php if($tipo == "atualizar"){ ?>
            <h3 id="cabecalho_pag">Quem deseja atualizar?</h3>
            <?php }else if($tipo == "remover"){ ?>
			<h3 id="cabecalho_pag">Quem deseja remover?</h3>
            <?php }else if($tipo == "consultar"){ ?>
			<h3 id="cabecalho_pag">Quem deseja consultar?</h3>
            <?php }else if($tipo == "ficha" || $tipo == "cartao" || $tipo == "atividade" || $tipo == "transferencia"){ ?>
			<h3 id="cabecalho_pag">De quem deseja gerar documento?</h3>
			<?php } ?>
      	</div>
        
        <div>
        <?php
			
			if($parametro == "nome"){
				$sql_select = "SELECT nome,matricula,data_admissao,lider_familiar FROM associado WHERE nome like '".$dados."%'";
			
			}else if($parametro == "lider_familiar"){
				$sql_select = "SELECT nome,matricula,data_admissao,lider_familiar FROM associado WHERE lider_familiar ='".$dados."'";				
			}
			
			$sql_comm = mysql_query($sql_select);
			
			if(mysql_num_rows($sql_comm) > 0){
			
			while($resultado = mysql_fetch_array($sql_comm)){	
		?>
          <fieldset id="resultado_busca">
          
          	  <div class="campos_resultado">
                  <label><span>Nome:</span><?php echo " ".$resultado['nome']; ?> </label>
              </div>             
              
              <div class="campos_resultado">
                  <label><span>Matricula:</span><?php echo " ".$resultado['matricula']; ?></label>
              </div>
              
              <div class="campos_resultado">
                  <label><span>Líder Familiar:</span><?php echo " ".$resultado['lider_familiar']; ?></label>
              </div>
              
              <div class="campos_resultado">
                  <label><span>Data Admissão:</span><?php echo " ".implode("/",array_reverse(explode("-",$resultado['data_admissao']))); ?></label>
              </div>
              
              <div id="acoes_resultado">
              	  <?php if($tipo == "atualizar"){ ?>
                  <a href="ficha_atualizacao.php?matricula=<?php echo " ".$resultado['matricula']; ?>"><img src="imagens/icons/black/funcao_atualizar_24px.png" alt="atualizar" class="action_button" /></a>
                  <?php }else if($tipo == "remover"){ ?>
                  <a href="remover_associado.php?matricula=<?php echo " ".$resultado['matricula']; ?>"><img src="imagens/icons/black/funcao_excluir_24px.png" alt="remover" class="action_button" /></a>
                  <?php }else if($tipo == "ficha" || $tipo == "cartao" || $tipo == "atividade" || $tipo == "transferencia"){ ?>
                  <a href="gerar_pdf.php?matricula=<?php echo $resultado['matricula']; ?>"><img src="imagens/icons/black/funcao_imprimir.png" alt="imprimir" id="action_button_imprime" /></a>
                  <?php } ?>
                  <a href="ficha_associado.php?matricula=<?php echo $resultado['matricula']; ?>&acao=<?php echo $tipo; ?>"><img src="imagens/icons/black/funcao_pesquisa_24px.png" alt="consultar" class="action_button" /></a>
                  
              </div> 
              
              
          </fieldset>
          <?php
							}
						}else{
							header("Location:busca.php?acao=".$tipo."&error=1");	
						
						}
					}
				}
			}
			?>
	</div>
        	
</body>
</html>