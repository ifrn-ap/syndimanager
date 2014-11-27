<?php 
	
	//Importando a conexão com banco de dados do arquivo 'conexao_bd.php'
	require "conexao_bd.php";
	
	//Inicio a sessão
	session_start();
	
	//Definindo as variaveis que receberão dados passados do formulário
	$usuario = trim($_POST['txtUsuario']);
	$senha = $_POST['txtSenha'];
	$logado = (bool) $_POST['chkContinuaLogado'];
	
	//Definindo o comando de busca no banco de dados
	$sql_select = "SELECT * FROM usuario WHERE BINARY login='".$usuario."' AND BINARY senha='".sha1($senha)."'";
	
	//Executando o comando
	$sql_comm = mysql_query($sql_select);
	
	//Verificando se o comando está correto e se retornou algum dado
	if (mysql_num_rows($sql_comm) > 0){
		
		//Se estiver tudo correto, $dados se transformará num array com os dados obtidos na consulta
		$dados = mysql_fetch_array($sql_comm);
		
		//Definindo os valores das variáveis de sessão e zero o contador de tempo
		$_SESSION['usuario'] = $usuario;
		$_SESSION['senha'] = $senha;
		$_SESSION['acesso'] = $dados['id_acesso'];
		$_SESSION['hora_acessou'] = time();
		$_SESSION['logado'] = $logado;
		
		if($dados['associado_matricula'] != NULL || $dados['associado_matricula'] != ""){
			$_SESSION['matricula'] = $dados['associado_matricula'];
		}
		
		//Redirecionando para a pagina 'home.php'
		header("Location:home.php");			
	}else{
		
		//Se o comando não estiver correto ou os dados não existirem,
		//a navegação será redirecionada para a pagina 'index.html' com valor de erro = 1
		header("Location:index.php?error=1");
	}

?>