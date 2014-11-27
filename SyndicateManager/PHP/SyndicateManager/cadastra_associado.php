<?php

require 'conexao_bd.php';
require 'funcoes.php';

$lider_familiar = $_POST['txtLiderFamiliar'];
$data_admissao = date("Y-m-d");
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
$endereco_id = setCampoEndereco();

$rg_sem_mascara = retira_mascara($rg,".") ;
$data_sem_mascara = retira_mascara($_POST['txtDataNascimento'],"/");

$sql_insert_associado = "INSERT INTO associado(nome,data_nascimento,cidade_id,estado_civil_id,escolaridade_id,endereco_id,cpf,rg,titulo_eleitor,registro_nascimento,livro,fis,cartorio,local_trabalho,nirf,area_total,tipo_trabalho,area_trabalhada,cart_profissional,serie,data_admissao,data_pagamento, lider_familiar) VALUES('".$nome."','".$data_nascimento."',".$naturalidade.",".$estado_civil.",".$escolaridade.",".$endereco_id.",'".$cpf."','".$rg."','".$titulo_eleitor."','".$registro_nascimento."','".$livro."','".$folhas."','".$cartorio."','".$local_trabalho."','".$nirf."','".$area_total."','".$tipo_trabalho."','".$area_trabalhada."','".$carteira_profissional."','".$serie."','".$data_admissao."','".$data_admissao."','".$lider_familiar."')";

$sql_insert_endereco = "INSERT INTO endereco(logradouro,numero,bairro,cidade_id) VALUES('".$endereco."','".$numero."','".$bairro."',".$municipio.")";
$sql_insert_usuario = "INSERT INTO usuario(login, senha, id_acesso, associado_matricula) VALUES('".$rg_sem_mascara."','".sha1($data_sem_mascara)."',0,".setCampoMatricula().")";

if($sql_comm_associado = mysql_query($sql_insert_associado)){
	if($sql_comm_endereco = mysql_query($sql_insert_endereco)){
		if($sql_comm_usuario = mysql_query($sql_insert_usuario)){
			header("Location:cadastro.php?sucesso=1");
		}
	}
}else{
	echo mysql_error();
	header("Location:cadastro.php?error=1");
}

?>