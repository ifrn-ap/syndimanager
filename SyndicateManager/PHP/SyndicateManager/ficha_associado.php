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
			  $sql_select_associado = "SELECT * FROM associado WHERE matricula=".$matricula;
			  $sql_select_naturalidade = "SELECT cidade,uf FROM associado AS ass, cidade AS cid WHERE ass.cidade_id = cid.id AND ass.matricula=".$matricula;
			  $sql_select_estado_civil = "SELECT estado_civil FROM associado AS ass, estado_civil AS ec WHERE ass.estado_civil_id = ec.id AND ass.matricula=".$matricula;
			  $sql_select_escolaridade = "SELECT escolaridade FROM associado AS ass, escolaridade AS esc WHERE ass.escolaridade_id = esc.id AND ass.matricula=".$matricula;
			  $sql_select_endereco = "SELECT logradouro,bairro,numero,cidade,uf FROM associado AS ass, endereco AS end, cidade AS cid WHERE ass.endereco_id = end.id AND end.cidade_id = cid.id AND ass.matricula=".$matricula;
							  
							  
							  
							  
		  }else if(isset($_COOKIE['dados'])){
			  if($_COOKIE['parametro'] == "matricula"){
				  
				  $matricula = $_COOKIE['dados'];
				  $sql_select_associado = "SELECT * FROM associado WHERE matricula=".$matricula;
				  $sql_select_naturalidade = "SELECT cidade,uf FROM associado AS ass, cidade AS cid WHERE ass.cidade_id = cid.id AND ass.matricula=".$matricula;
				  $sql_select_estado_civil = "SELECT estado_civil FROM associado AS ass, estado_civil AS ec WHERE ass.estado_civil_id = ec.id AND ass.matricula=".$matricula;
				  $sql_select_escolaridade = "SELECT escolaridade FROM associado AS ass, escolaridade AS esc WHERE ass.escolaridade_id = esc.id AND ass.matricula=".$matricula;
				  $sql_select_endereco = "SELECT logradouro,bairro,numero,cidade,uf FROM associado AS ass, endereco AS end, cidade AS cid WHERE ass.endereco_id = end.id AND end.cidade_id = cid.id AND ass.matricula=".$matricula;
				  
				  
				  
			  }else if($_COOKIE['parametro'] == "cpf"){
				  
				  $cpf = $_COOKIE['dados'];
				  $sql_select_associado = "SELECT * FROM associado WHERE cpf='".$cpf."'";
				  $sql_select_naturalidade = "SELECT cidade,uf FROM associado AS ass, cidade AS cid WHERE ass.cidade_id = cid.id AND ass.cpf='".$cpf."'";
				  $sql_select_estado_civil = "SELECT estado_civil FROM associado AS ass, estado_civil AS ec WHERE ass.estado_civil_id = ec.id AND ass.cpf='".$cpf."'";
				  $sql_select_escolaridade = "SELECT escolaridade FROM associado AS ass, escolaridade AS esc WHERE ass.escolaridade_id = esc.id AND ass.cpf='".$cpf."'";
				  $sql_select_endereco = "SELECT logradouro,bairro,numero,cidade,uf FROM associado AS ass, endereco AS end, cidade AS cid WHERE ass.endereco_id = end.id AND end.cidade_id = cid.id AND ass.cpf='".$cpf."'";
				  
			  }
		  }
		  
		  $sql_comm_associado = mysql_query($sql_select_associado);
		  $sql_comm_naturalidade = mysql_query($sql_select_naturalidade);
		  $sql_comm_estado_civil = mysql_query($sql_select_estado_civil);
		  $sql_comm_escolaridade = mysql_query($sql_select_escolaridade);
		  $sql_comm_endereco = mysql_query($sql_select_endereco);
		  
		  
		  if($dados_associado =  mysql_fetch_array($sql_comm_associado)){
			  if($dados_naturalidade =  mysql_fetch_array($sql_comm_naturalidade)){
				  if($dados_estado_civil =  mysql_fetch_array($sql_comm_estado_civil)){
					  if($dados_escolaridade =  mysql_fetch_array($sql_comm_escolaridade)){
						  if($dados_endereco =  mysql_fetch_array($sql_comm_endereco)){
		
		
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
    	<div id="cabecalho">
    		<h2 id="cabecalho_pag">Dados do Associado</h2>
      	</div>
        
        <div>
          <fieldset class="sessoes">
              <legend>Dados Sindicais</legend>
              <div class="campos_cadastro">
                  <label><span>Matricula:</span><?php echo " ".$dados_associado['matricula']; ?></label>
              </div>
              
              <div class="campos_cadastro">
                  <label><span>Líder Familiar:</span><?php echo " ".$dados_associado['lider_familiar']; ?></label>
              </div>
              
              <div class="campos_cadastro">
                  <label><span>Data Admissão:</span><?php echo " ".implode("/",array_reverse(explode("-",$dados_associado['data_admissao']))); ?></label>
              </div>
              
              <div class="campos_cadastro">
                  <label><span>Situação:</span><?php echo " ".setSituacao(implode("-",array_reverse(explode("-",$dados_associado['data_pagamento'])))); ?></label>
              </div>
              
              <div class="campos_cadastro">
                  <label><span>Data do Último Pagamento:</span><?php echo " ".implode("/",array_reverse(explode("-",$dados_associado['data_pagamento']))); ?></label>
              </div>            
          </fieldset>
         
          
          <fieldset class="sessoes">
              <legend>Dados do Associado</legend>
              <div class="campos_cadastro">
                  <label><span>Nome:</span><?php echo " ".$dados_associado['nome']; ?></label>
              </div>
              
              <div class="campos_cadastro">
                  <label><span>Data de Nascimento:</span><?php echo " ".implode("/",array_reverse(explode("-",$dados_associado['data_nascimento']))); ?></label>
              </div>
              
              <div class="campos_cadastro">  
                  <label><span>Naturalidade:</span><?php echo " ".$dados_naturalidade['cidade']."-".$dados_naturalidade['uf']; ?></label>
              </div>
              
              <div class="campos_cadastro"> 
                  <label><span>Estado Civil:</span><?php echo " ".$dados_estado_civil['estado_civil']; ?></label>
              </div>
              
              <div class="campos_cadastro">  
                  <label><span>Escolaridade:</span><?php echo " ".$dados_escolaridade['escolaridade']; ?></label>
              </div>
      
              <div class="campos_cadastro">
                  <label><span>CPF:</span><?php echo " ".$dados_associado['cpf']; ?></label>
              </div>
              
              <div class="campos_cadastro">
                  <label><span>RG:</span><?php echo " ".$dados_associado['rg']; ?></label>
              </div>
              
              <div class="campos_cadastro">
                  <label><span>Titulo de Eleitor:</span><?php echo " ".$dados_associado['titulo_eleitor']; ?></label>
              </div>
      
              <div class="campos_cadastro">
                  <label><span>Registro de Nascimento:</span><?php echo " ".$dados_associado['registro_nascimento']; ?></label>
              </div>
              
              <div class="campos_cadastro">
                  <label><span>Livro:</span><?php echo " ".$dados_associado['livro']; ?> </label>
              </div>
              
              <div class="campos_cadastro">
                  <label><span>Folhas:</span><?php echo " ".$dados_associado['Fis']; ?></label>
              </div>
              
              <div class="campos_cadastro">
                  <label><span>Cartório:</span><?php echo " ".$dados_associado['cartorio']; ?></label>
              </div>
              
           </fieldset>
              
           <fieldset class="sessoes">
              <legend>Localização</legend>
              <div class="campos_cadastro">
                  <label><span>Endereço:</span><?php echo " ".$dados_endereco['logradouro']; ?></label>
              </div>
                  
              <div class="campos_cadastro">
                  <label><span>Número:</span><?php echo " ".$dados_endereco['numero']; ?></label>
              </div>
                  
              <div class="campos_cadastro">
                  <label><span>Bairro:</span><?php echo " ".$dados_endereco['bairro']; ?></label>
              </div>
               
              <div class="campos_cadastro">    
                  <label><span>Municipio:</span><?php echo " ".$dados_endereco['cidade']."-".$dados_endereco['uf']; ?></label>
              </div>
              
          </fieldset>
               
          <fieldset class="sessoes">
              <legend>Dados de Trabalho</legend>
              <div class="campos_cadastro">
                  <label><span>Local de Trabalho:</span><?php echo " ".$dados_associado['local_trabalho']; ?></label>
              </div>
                  
              <div class="campos_cadastro">
                  <label><span>Nirf:</span><?php echo " ".$dados_associado['nirf']; ?></label>
              </div>
                 
              <div class="campos_cadastro">
                  <label><span>Área Total (em Ha):</span><?php echo " ".$dados_associado['area_total']." ha"; ?></label>
              </div>
                 
              <div class="campos_cadastro">
                  <label><span>Tipo de Trabalho:</span><?php echo " ".$dados_associado['tipo_trabalho']; ?></label>
              </div>
                  
              <div class="campos_cadastro">
                  <label><span>Área Trabalhada (em Ha):</span><?php echo " ".$dados_associado['area_trabalhada']." ha"; ?></label>
              </div>
                 
              <div class="campos_cadastro">
                  <label><span>Carteira Profissional:</span><?php echo " ".$dados_associado['cart_profissional']; ?></label>
              </div>
                  
              <div class="campos_cadastro">
                  <label><span>Serie:</span><?php echo " ".$dados_associado['serie']; ?></label>
              </div>
          </fieldset>
        </div>
        
        <div class="botoes">
        	<?php
        		if(isset($_COOKIE['tipo'])){
			
			?>
            <a href="busca.php?acao=<?php echo $_COOKIE['tipo']; ?>" class="button" id="btnVoltar">Voltar</a> 
            <?php }else if(isset($_GET['acao'])){ ?>	     
            <a href="busca.php?acao=<?php echo $_COOKIE['tipo']; ?>" class="button" id="btnVoltar">Voltar</a> 
            <?php }else if($_COOKIE['pagina'] == "pagamentos"){ ?>
            <a href="pagamentos_atrasados.php" class="button" id="btnVoltar">Voltar</a>
            <?php }else if($_COOKIE['pagina'] == "grupo_familiar"){ ?>
            <a href="grupo_familiar.php" class="button" id="btnVoltar">Voltar</a>
            <?php }else if($_COOKIE['pagina'] == "associado"){ ?>
            <a href="home.php" class="button" id="btnVoltar">Voltar</a>
            <?php } ?>
        </div>   
        <?php 
						
						  
						  }
					  }
				  }
			  }
		  }else{
			  header("Location:busca.php?acao=".$_COOKIE['tipo']."&error=1");	
		  }
		}
					
		?>
	</div>
        	
</body>
</html>