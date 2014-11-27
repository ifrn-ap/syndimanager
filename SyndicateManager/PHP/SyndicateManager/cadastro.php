<?php 
	
	require 'conexao_bd.php';
	include 'funcoes.php';
	
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
	
	
	$sql_select_cidade = "SELECT id, cidade FROM cidade";
	$sql_select_escolaridade = "SELECT * FROM escolaridade";
	$sql_select_estado_civil = "SELECT * FROM estado_civil";
	
	$comm_cidade = mysql_query($sql_select_cidade);
	$comm_escolaridade = mysql_query($sql_select_escolaridade);
	$comm_estado_civil = mysql_query($sql_select_estado_civil);
	$comm_municipio = mysql_query($sql_select_cidade);
	
	if(isset($_GET['error'])){
		if($_GET['error'] == 1)
			echo "<script type='text/javascript'> window.alert('Não foi possível cadastrar') </script>";
	}else if(isset($_GET['sucesso'])){
		if($_GET['sucesso'] == 1)
			echo "<script type='text/javascript'> window.alert('Associado Cadastrado com Sucesso!') </script>";

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

<body >
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
    	<div id="cabecalho_pag">
    		<h2>Cadastro de Associados</h2>
      	</div>
        
        
        <form nome="frmCadastraAssociado" method="post" action="cadastra_associado.php" autocomplete="off">
          <fieldset class="sessoes">
              <legend>Dados Sindicais</legend>
              <div class="campos_cadastro">
                  <label>Matricula:
                      <input type="text" name="txtMatricula" id="txtMatricula" class="input" size="7" maxlength="7" value="<?php echo setCampoMatricula() ?>" readonly />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Líder Familiar:
                      <input type="text" name="txtLiderFamiliar" id="txtGrupoFamiliar" class="input" size="14" maxlength="14" autofocus />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Data Admissão:
                      <input type="text" name="txtDataAdmissao" id="txtDataAdmissao"  class="input" size="10" maxlength="10" value="<?php echo date("d/m/Y") ?>" readonly />
                  </label>
              </div>            
          </fieldset>
          
          
          <fieldset class="sessoes">
              <legend>Dados do Associado</legend>
              <div class="campos_cadastro">
                  <label>Nome:
                      <input name="txtNome" id="txtNome" type="text" class="input" size="50" maxlength="50" />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Data de Nascimento:
                      <input name="txtDataNascimento" id="txtDataNascimento" type="text" class="input" size="10" maxlength="10" />
                  </label>
              </div>
              
              <div class="campos_cadastro">  
                  <label>Naturalidade:
                      <select name="ddlNaturalidade" class="input" style="width:35%">
                      <?php
					  		while($cidade = mysql_fetch_array($comm_cidade)){
					  		
					  ?>
                          <option value="<?php echo $cidade['id']; ?>"><?php echo $cidade['cidade']; ?></option>
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
                          <option value="<?php echo $estado_civil['id']; ?>"><?php echo $estado_civil['estado_civil']; ?></option>
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
                          <option value="<?php echo $escolaridade['id']; ?>"><?php echo $escolaridade['escolaridade']; ?></option>
                      <?php } ?>
                      </select>
                  </label>
              </div>
      
              <div class="campos_cadastro">
                  <label>CPF:
                      <input name="txtCPF" id="txtCPF" type="text" class="input" size="14" maxlength="14"  />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>RG:
                      <input name="txtRG" id="txtRG" type="text" class="input" size="11" maxlength="11" />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Titulo de Eleitor:
                      <input name="txtTituloEleitor" id="txtTituloEleitor" type="text" class="input" size="12" maxlength="12" />
                  </label>
              </div>
      
              <div class="campos_cadastro">
                  <label>Registro de Nascimento:
                      <input name="txtRegistroNascimento" id="txtRegistroNascimento" type="text" class="input" size="5" maxlength="5" />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Livro:
                      <input name="txtLivro" id="txtLivro" type="text" class="input" size="6" maxlength="6" />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Folhas:
                      <input name="txtFolhas" id="txtFolhas" type="text" class="input" size="4" maxlength="6" />
                  </label>
              </div>
              
              <div class="campos_cadastro">
                  <label>Cartório:
                      <input name="txtCartorio" id="txtCartorio" type="text" class="input" size="25" maxlength="25" />
                  </label>
              </div>
              
           </fieldset>
              
           <fieldset class="sessoes">
              <legend>Localização</legend>
              <div class="campos_cadastro">
                  <label>Endereço:
                      <input name="txtEndereco" id="txtEndereco" type="text" class="input" size="40" maxlength="40" />
                  </label>
              </div>
                  
              <div class="campos_cadastro">
                  <label>Número:
                      <input name="txtNumero" id="txtNumero" type="text" class="input" size="7" maxlength="5" />
                  </label>
              </div>
                  
              <div class="campos_cadastro">
                  <label>Bairro:
                      <input name="txtBairro" id="txtBairro" type="text" class="input" size="25" maxlength="25" />
                  </label>
              </div>
               
              <div class="campos_cadastro">
              	<label> Municipio: 
                  <select name="ddlMunicipio" class="input" style="width:35%">
                	<?php
					  		while($municipio = mysql_fetch_array($comm_municipio)){
					  		
					?>
                          <option value="<?php echo $municipio['id']; ?>"><?php echo $municipio['cidade']; ?></option>
                    <?php } ?> 
                  </select>
                </label>  
              </div>
              
          </fieldset>
               
          <fieldset class="sessoes">
              <legend>Dados de Trabalho</legend>
              <div class="campos_cadastro">
                  <label>Local de Trabalho:
                      <input name="txtLocalTrabalho" id="txtLocalTrabalho" type="text" class="input" size="25" maxlength="25" />
                  </label>
              </div>
                  
              <div class="campos_cadastro">
                  <label>Nirf:
                      <input name="txtNirf" id="txtNirf" type="text" class="input" size="11" maxlength="11" />
                  </label>
              </div>
                 
              <div class="campos_cadastro">
                  <label>Área Total (em ha):
                      <input name="txtTotalHA" id="txtTotalHA" type="text" class="input" size="5" maxlength="5" />
                  </label>
              </div>
                 
              <div class="campos_cadastro">
                  <label>Tipo de Trabalho:
                      <input name="txtTipoTrabalho" id="txtTipoTrabalho" type="text" class="input" size="15" maxlength="15" />
                  </label>
              </div>
                  
              <div class="campos_cadastro">
                  <label>Área Trabalhada (em ha)	:
                      <input name="txtAreaTrabalhada" id="txtAreaTrabalhada" type="text" class="input" size="5" maxlength="5" />
                  </label>
              </div>
                 
              <div class="campos_cadastro">
                  <label>Carteira Profissional:
                      <input name="txtCarteiraProfissional" id="txtCarteiraProfissional" type="text" class="input" size="7" maxlength="7" />
                  </label>
              </div>
                  
              <div class="campos_cadastro">
                  <label>Serie:
                      <input name="txtSerie" id="txtSerie" type="text" class="input" size="8" maxlength="8"   />
                  </label>
              </div>
          </fieldset>
          
          <div class="botoes">
              <input type="submit" name="btnCadastrar" id="btnCadastrar" value="Cadastrar" class="button" onclick="return valida_campos()" />
              <input type="reset" name="btnLimpar" id="btnLimpar" value="Limpar" class="button" />          
          </div>      
        
        </form>       
	</div>
        	
</body>
</html>