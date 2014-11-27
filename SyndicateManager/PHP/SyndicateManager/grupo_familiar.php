<?php 
	
	setcookie("pagina","grupo_familiar", time() + 60*60*24);
	
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
		  jQuery(function($){
			  $("#txtLiderFamiliar").mask("999.999.999-99");
		  });

</script>
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
    	<div id="cabecalho">
    		<h2 id="cabecalho_pag">Grupo Familiar</h2>
            <hr />
      	</div>
        
        <div id="pesquisa">            	  
          <form nome="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" autocomplete="off">
              
                 
              
              <div id="campo_pesquisa">    
              	<input type="text" name="txtLiderFamiliar" id="txtLiderFamiliar" placeholder="Líder Familiar" />
                <input type="image" name="btnFiltrar" id="btnFiltrar" src="imagens/icons/black/funcao_pesquisa_24px.png"  />
              </div>
          </form>
        </div>
        
      <div id="tabela">  
        <table class="tabela">
            <tr>
                <th width="28%" class="coluna_id"><a href="grupo_familiar.php?ordem=nome">Associados Atrasados</a></th>
                <th width="16%" class="coluna_id"><a href="grupo_familiar.php?ordem=matricula">Matricula</th>
                <th width="15%" class="coluna_id"><a href="grupo_familiar.php?ordem=lider_familiar">Líder Familiar</th>
                <th width="17%" class="coluna_id"><a href="grupo_familiar.php?ordem=cpf">CPF</th>
                <th width="16%" class="coluna_id"><a href="grupo_familiar.php?ordem=data_pagamento">Último Pagamento</th>
            </tr>
            <?php
            	
				require 'conexao_bd.php';
	
				if(isset($_POST['txtLiderFamiliar'])){
					$lider_familiar = $_POST['txtLiderFamiliar'];			
				}else{
					$lider_familiar = "";	
				}
					if(isset($_GET['ordem'])){
						$ordem = $_GET['ordem'];		
					}else{
						$ordem = "matricula";		
					}
	
					$sql_select = "SELECT * FROM associado WHERE lider_familiar='".$lider_familiar."' ORDER BY ".$ordem;					

					$sql_comm = mysql_query($sql_select);
				
				
					if($sql_comm){
						while($dados = mysql_fetch_array($sql_comm)){            
			?>
            <tr>
                <td class="coluna"><?php echo $dados['nome'];?></td>
                <td class="coluna"><?php echo $dados['matricula'];?></td>
                <td class="coluna"><?php echo $dados['lider_familiar'];?></td>
                <td class="coluna"><?php echo $dados['cpf'];?></td>
                <td class="coluna"><?php echo implode("/",array_reverse(explode("-",$dados['data_pagamento'])));?></td>
                <td width="2%" class="col_acao"><a href="ficha_associado.php?matricula=<?php echo $dados['matricula'];?>"><img src="imagens/icons/black/funcao_pesquisa_24px.png" alt="consultar" class="action_button" /></a></td>              
            </tr>           
            <?php
							}
					}else{
						mysql_error();	
					}
			?>
            <tr id="total">
                <td colspan="5" class="coluna">Número de Registros:<?php echo " ".mysql_num_rows($sql_comm); ?></td>
            </tr> 
        </table>
      </div>
    </div>
        	
</body>
</html>