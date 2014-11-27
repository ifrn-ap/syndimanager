<?php

require 'conexao_bd.php';
require 'funcoes.php';

$lider_familiar = $_POST['txtLiderFamiliar'];
$nome = retira_maiusculo($_POST['txtNome']);
$data_nascimento = implode("-",array_reverse(explode("/",$_POST['txtDataNascimento'])));
$naturalidade = $_POST['ddlNaturalidade'];
$estado_civil = $_POST['ddlEstadoCivil'];
$escolaridade = $_POST['ddlEscolaridade'];
$cpf = $_POST['txtCPF'];
$rg = $_POST['txtRG'];
$titulo_eleitor = $_POST['txtTituloEleitor'];
$registro_nascimento = $_POST['txtRegistroNascimento'];
$livro = $_POST['txtLivro'];
$folhas = $_POST['txtFolhas'];
$cartorio = retira_maiusculo($_POST['txtCartorio']);
$endereco = retira_maiusculo($_POST['txtEndereco']);
$numero = $_POST['txtNumero'];
$bairro = retira_maiusculo($_POST['txtBairro']);
$municipio = $_POST['ddlMunicipio'];
$local_trabalho = retira_maiusculo($_POST['txtLocalTrabalho']);
$nirf = $_POST['txtNirf'];
$area_total = $_POST['txtTotalHA'];
$tipo_trabalho = retira_maiusculo($_POST['txtTipoTrabalho']);
$area_trabalhada = $_POST['txtAreaTrabalhada'];
$carteira_profissional = $_POST['txtCarteiraProfissional'];
$serie = strtoupper($_POST['txtSerie']);
$endereco_id = $_POST['hdnEnderecoID'];

$sql_insert_associado = "UPDATE  associado SET nome= '".$nome."', data_nascimento='".$data_nascimento."',cidade_id=".$naturalidade.",estado_civil_id=".$estado_civil.",escolaridade_id=".$escolaridade.",cpf='".$cpf."',rg='".$rg."',titulo_eleitor='".$titulo_eleitor."',registro_nascimento='".$registro_nascimento."',livro='".$livro."',fis='".$folhas."',cartorio='".$cartorio."',local_trabalho='".$local_trabalho."',nirf='".$nirf."',area_total='".$area_total."',tipo_trabalho='".$tipo_trabalho."',area_trabalhada='".$area_trabalhada."',cart_profissional='".$carteira_profissional."',serie='".$serie."', lider_familiar='".$lider_familiar."' WHERE matricula=".$_POST['txtMatricula'];

$sql_insert_endereco = "UPDATE endereco SET logradouro='".$endereco."',numero='".$numero."',bairro='".$bairro."',cidade_id=".$municipio." WHERE id=".$endereco_id;

if($sql_comm_associado = mysql_query($sql_insert_associado)){
	if($sql_comm_endereco = mysql_query($sql_insert_endereco)){
		header("Location:busca.php?acao=atualizar&sucesso=1");
	}else{
		echo mysql_error();
	}
}else{
	echo mysql_error();
	//header("Location:ficha_atualizacao.php?error=1");
}

?>