<?php
	//Inicio a sessão corrente
	session_start();
	
	if(isset($_SESSION['logado'])){
		if($_SESSION['logado'])
			header("Location:home.php");
		else
			session_destroy();	
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_login.css" />
<link rel="icon" href="imagens/icons/black/icone_navegador.png" type="image/png" />
<link rel="shortcut icon" href="imagens/icons/black/icone_navegador.png" type="image/png" />
<script type="text/javascript" src="javascript/scripts.js"></script>
<title>Login - SyndicateManager</title>
</head>

<body>
	 

	<div id="header">
    	<div id="logo_sm">
			<a href="index.php"><img src="imagens/logo_sm.png" alt="logo_syndicatemanager" /></a>
        </div>
    </div>
    
    <div id="content">
      <fieldset>
		  <form name="frmLogin" id="frmLogin" action="valida_login.php" method="post" autocomplete="off">
            	<div class="text_box">
                	<input name="txtUsuario" type="text" id="txtUsuario" placeholder="Usuário" class="input" autofocus />
                </div>
                
                <div class="text_box">
                	<input name="txtSenha" type="password" id="txtSenha" placeholder="Senha" class="input" />
                </div>
                
                <div class="text_box">
                	<label><input name="chkContinuaLogado" id="chkContinuaLogado" type="checkbox" value="true"  /><span id="chkLogado">Mantenha-me Logado</span></label>
                </div>
                
                <div id="falha">
                	<label class="label">
                    <?php						
						  
						if(isset($_GET['error'])){
							if($_GET['error'] == 1){
								echo "Usuário e/ou Senha Incorreto(s)!";
							}else if ($_GET['error'] == 2){
								echo "Você precisa estar logado!";									
							}else if ($_GET['error'] == 3){
								echo "O tempo da sessão expirou!";	
							}
						}else if(isset($_GET['warning'])){
							if ($_GET['warning'] == 1){
								echo "Faça login para validar sua nova senha!";
							}	
						}

 		 			?>                    
                    </label>
                </div>
                
                <div id="button">
                	<input type="submit" name="btnLogar" id="btnLogar" value="Logar" class="button" onclick="return valida_login()"/>
   					<input type="reset" name="btnLimpar" id="btnLimpar" value="Limpar"  class="button" onclick="limpa_url()" />
           	  	</div>
                
	    </form>
	  </fieldset>
      
      
</div>



</body>
</html>