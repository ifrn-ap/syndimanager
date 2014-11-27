<?php 
	
	require 'conexao_bd.php';
	
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
	
	
	$sql_select_cidade = "SELECT id, cidade FROM cidade";
	$sql_select_escolaridade = "SELECT * FROM escolaridade";
	$sql_select_estado_civil = "SELECT * FROM estado_civil";
	
	$comm_cidade = mysql_query($sql_select_cidade);
	$comm_escolaridade = mysql_query($sql_select_escolaridade);
	$comm_estado_civil = mysql_query($sql_select_estado_civil);
	$comm_municipio = mysql_query($sql_select_cidade);
	
	
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
<script type="text/javascript" src="javascript/jquery/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="javascript/jquery/jquery.maskedinput-1.1.4.pack.js"></script>
<script type="text/javascript" src="javascript/scripts.js"></script>
<script type="text/javascript">
	jQuery(function($){
		   $("#txtLiderFamiliar").mask("999.999.999-99");
	       $("#txtDataNascimento").mask("99/99/9999");
		   $("#txtCPF").mask("999.999.999-99");
		   $("#txtRG").mask("999.999.999");
		   $("#txtTituloEleitor").mask("9999999999/99");
		   $("#txtNirf").mask("9.999.999-9");
		   $("#txtSerie").mask("99999-aa");
		   
	});
</script>
</head>

<body>
	<?php
		
		include 'funcoes.php';
		
		if(isset($_COOKIE['pagina'])){
			if(isset($_GET['matricula'])){
				$matricula = $_GET['matricula'];
				
				$sql_select_associado = "SELECT * FROM associado WHERE matricula=".$matricula;
				$sql_select_endereco = "SELECT * FROM endereco AS end, associado AS ass WHERE end.id = ass.endereco_id AND matricula=".$matricula;
				
				
			}else if(isset($_COOKIE['dados'])){
				if($_COOKIE['parametro'] == "matricula"){
					$matricula = $_COOKIE['dados'];
					
					$sql_select_associado = "SELECT * FROM associado WHERE matricula=".$matricula;
					$sql_select_endereco = "SELECT * FROM endereco AS end, associado AS ass WHERE end.id = ass.endereco_id AND matricula=".$matricula;
				
				}else if($_COOKIE['parametro'] == "cpf") {
					$cpf = $_COOKIE['dados'];
					
					$sql_select_associado = "SELECT * FROM associado WHERE cpf='".$cpf."'";
					$sql_select_endereco = "SELECT * FROM endereco AS end, associado AS ass WHERE end.id = ass.endereco_id AND cpf='".$cpf."'";
				
				}
			}
			
			$sql_comm_associado = mysql_query($sql_select_associado);
			$sql_comm_endereco = mysql_query($sql_select_endereco);
			
			if($dados_associado = mysql_fetch_array($sql_comm_associado)){
				if($dados_endereco = mysql_fetch_array($sql_comm_endereco)){
		
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
        	<br />
    		<h2 id="cabecalho_pag">Atualização de Cadastro</h2>
      	</div>
        
        
        <form nome="frmCadastraAssociado" method="post" action="atualiza_associado.php" autocomplete="off">
          <fieldset class="sessoes">
              <legend>Dados Sindicais</legend>
              <div class="campos_cadastro">
                  <label>Matricula:
                      <input type="text" name="txtMatricula" id="txtMatricula" class="input" size="7" maxlength="7" value="<?php echo $dados_associado['matricula']; ?>" readonly />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Grupo Familiar:
                      <input type="text" name="txtGrupoFamiliar" id="txtLiderFamiliar" class="input" size="14" maxlength="14" value="<?php echo $dados_associado['lider_familiar']; ?>" autofocus />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Data Admissão:
                      <input type="text" name="txtDataAdmissao" id="txtDataAdmissao"  class="input" size="10" maxlength="10" value="<?php echo implode("/",array_reverse(explode("-",$dados_associado['data_admissao']))); ?>" readonly />
                  </label>
              </div>            
          </fieldset>
          
          
          <fieldset class="sessoes">
              <legend>Dados do Associado</legend>
              <div class="campos_cadastro">
                  <label>Nome:
                      <input name="txtNome" id="txtNome" type="text" class="input" size="50" maxlength="50" value="<?php echo $dados_associado['nome']; ?>" />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Data de Nascimento:
                      <input name="txtDataNascimento" id="txtDataNascimento" type="text" class="input" size="10" maxlength="10" value="<?php echo implode("/",array_reverse(explode("-",$dados_associado['data_nascimento']))); ?>" />
                  </label>
              </div>
              
              <div class="campos_cadastro">  
                  <label>Naturalidade:
                      <select name="ddlNaturalidade" class="input" style="width:35%">
                      <?php
					  		while($cidade = mysql_fetch_array($comm_cidade)){
					  		
					  ?>
                          <option value="<?php echo $cidade['id']; ?>" <?php if($cidade['id'] == $dados_associado['cidade_id']){echo "selected";} ?>><?php echo $cidade['cidade']; ?></option>
                      <?php } ?>                      
                      </select>
                  </label>
              </div>
              
              <div class="campos_cadastro"> 
                  <label> Estado Civil: 
                      <select name="ddlEstadoCivil" class="input" style="width:35%">
                      <?php
					  		while($estado_civil = mysql_fetch_array($comm_estado_civil)){
					  		
					  ?>
                          <option value="<?php echo $estado_civil['id']; ?>" <?php if($estado_civil['id'] == $dados_associado['estado_civil_id']){echo "selected";} ?>><?php echo $estado_civil['estado_civil']; ?></option>
                      <?php } ?> 
                      </select>
                  </label>
              </div>
              
              <div class="campos_cadastro">  
                  <label>Escolaridade:
                      <select name="ddlEscolaridade" class="input" style="width:35%">
                      <?php
					  		while($escolaridade = mysql_fetch_array($comm_escolaridade)){
					  		
					  ?>
                          <option value="<?php echo $escolaridade['id']; ?>"  <?php if($escolaridade['id'] == $dados_associado['escolaridade_id']){echo "selected";} ?>><?php echo $escolaridade['escolaridade']; ?></option>
                      <?php } ?>
                      </select>
                  </label>
              </div>
      
              <div class="campos_cadastro">
                  <label>CPF:
                      <input name="txtCPF" id="txtCPF" type="text" class="input" size="14" maxlength="14" value="<?php echo $dados_associado['cpf']; ?>" />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>RG:
                      <input name="txtRG" id="txtRG" type="text" class="input" size="11" maxlength="11" value="<?php echo $dados_associado['rg']; ?>" />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Titulo de Eleitor:
                      <input name="txtTituloEleitor" id="txtTituloEleitor" type="text" class="input" size="12" maxlength="12" value="<?php echo $dados_associado['titulo_eleitor']; ?>" />
                  </label>
              </div>
      
              <div class="campos_cadastro">
                  <label>Registro de Nascimento:
                      <input name="txtRegistroNascimento" id="txtRegistroNascimento" type="text" class="input" size="5" maxlength="5" value="<?php echo $dados_associado['registro_nascimento']; ?>" />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Livro:
                      <input name="txtLivro" id="txtLivro" type="text" class="input" size="6" maxlength="6" value="<?php echo $dados_associado['livro']; ?>" />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Folhas:
                      <input name="txtFolhas" id="txtFolhas" type="text" class="input" size="4" maxlength="6" value="<?php echo $dados_associado['Fis']; ?>" />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Cartório:
                      <input name="txtCartorio" id="txtCartorio" type="text" class="input" size="25" maxlength="25" value="<?php echo $dados_associado['cartorio']; ?>" />
                  </label>
              </div>
              
           </fieldset>
              
           <fieldset class="sessoes">
              <legend>Localização</legend>
              <div class="campos_cadastro">
                  <label>Endereço:
                      <input name="txtEndereco" id="txtEndereco" type="text" class="input" size="40" maxlength="40" value="<?php echo $dados_endereco['logradouro']; ?>" />
                  </label>
              </div>
                  
              <div class="campos_cadastro">
                  <label>Número:
                      <input name="txtNumero" id="txtNumero" type="text" class="input" size="7" maxlength="5" value="<?php echo $dados_endereco['numero']; ?>" />
                  </label>
              </div>
                  
              <div class="campos_cadastro">
                  <label>Bairro:
                      <input name="txtBairro" id="txtBairro" type="text" class="input" size="25" maxlength="25" value="<?php echo $dados_endereco['bairro']; ?>" />
                  </label>
              </div>
               
              <div class="campos_cadastro">
              	<label> Municipio: 
                  <select name="ddlMunicipio" class="input" style="width:35%">
                	<?php
					  		while($municipio = mysql_fetch_array($comm_municipio)){
					  		
					?>
                          <option value="<?php echo $municipio['id']; ?>" <?php if($municipio['id'] == $dados_associado['cidade_id']){echo "selected";} ?> ><?php echo $municipio['cidade']; ?></option>
                    <?php } ?> 
                  </select>
                </label>  
              </div>
              
          </fieldset>
               
          <fieldset class="sessoes">
              <legend>Dados de Trabalho</legend>
              <div class="campos_cadastro">
                  <label>Local de Trabalho:
                      <input name="txtLocalTrabalho" id="txtLocalTrabalho" type="text" class="input" size="25" maxlength="25" value="<?php echo $dados_associado['local_trabalho']; ?>" />
                  </label>
              </div>
                  
              <div class="campos_cadastro">
                  <label>Nirf:
                      <input name="txtNirf" id="txtNirf" type="text" class="input" size="11" maxlength="11" value="<?php echo $dados_associado['nirf']; ?>" />
                  </label>
              </div>
                 
              <div class="campos_cadastro">
                  <label>Área Total (em ha):
                      <input name="txtTotalHA" id="txtTotalHA" type="text" class="input" size="5" maxlength="5" value="<?php echo $dados_associado['area_total']; ?>" />
                  </label>
              </div>
                 
              <div class="campos_cadastro">
                  <label>Tipo de Trabalho:
                      <input name="txtTipoTrabalho" id="txtTipoTrabalho" type="text" class="input" size="15" maxlength="15" value="<?php echo $dados_associado['tipo_trabalho']; ?>" />
                  </label>
              </div>
                  
              <div class="campos_cadastro">
                  <label>Área Trabalhada (em ha)	:
                      <input name="txtAreaTrabalhada" id="txtAreaTrabalhada" type="text" class="input" size="5" maxlength="5" value="<?php echo $dados_associado['area_trabalhada']; ?>" />
                  </label>
              </div>
                 
              <div class="campos_cadastro">
                  <label>Carteira Profissional:
                      <input name="txtCarteiraProfissional" id="txtCarteiraProfissional" type="text" class="input" size="7" maxlength="7" value="<?php echo $dados_associado['cart_profissional']; ?>" />
                  </label>
              </div>
                  
              <div class="campos_cadastro">
                  <label>Serie:
                      <input name="txtSerie" id="txtSerie" type="text" class="input" size="8" maxlength="8" value="<?php echo $dados_associado['serie']; ?>"  />
                  </label>
              </div>
          </fieldset>
          
          <input type="hidden" name="hdnEnderecoID" value="<?php echo $dados_associado['endereco_id']; ?>"  />
          
          <div class="botoes">
              <input type="submit" name="btnAtualizar" id="btnAtualizar" value="Atualizar" class="button" onclick="return valida_campos()" />
              <a href="busca.php?acao=atualizar" class="button" id="btnCancelar">Cancelar</a>       
          </div>      
        
        </form>         
	</div>
    	<?php
		
				}
			}else{
						echo mysql_error();
						//header("Location:busca.php?acao=atualizar&error=1");	
			}
		}
            
        ?>
</body>
</html>