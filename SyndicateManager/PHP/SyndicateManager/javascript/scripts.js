// Scripts do Projeto

//Script de Filtro

function limpa_url(){
   var url = window.location.href;
   if (url.indexOf("?") > -1 ){
     url = url.substr(0,url.indexOf("?")).toLowerCase();
   }
   window.location = url;
}

function valida_login(){
	var usuario = document.getElementById("txtUsuario").value;
	var senha = document.getElementById("txtSenha").value;
	
	if(usuario != ""){
		if(senha != ""){
			return true;
		}else{
			window.alert("Preencha o campo Senha!");
			return false;
		}
	}else{
		window.alert("Preencha o campo Usuário!");
		return false;
	}	
}

function valida_campos(){
	
	//Obtem valor dos campos obrigatórios
	
	var nome = document.getElementById("txtNome").value;
	var data_nascimento = document.getElementById("txtDataNascimento").value;
	var cpf = document.getElementById("txtCPF").value; 
	var rg = document.getElementById("txtRG").value;
	var registro_nascimento = document.getElementById("txtRegistroNascimento").value;
	var livro = document.getElementById("txtLivro").value;
	var folhas = document.getElementById("txtFolhas").value; 
	var cartorio = document.getElementById("txtCartorio").value;
	var endereco = document.getElementById("txtEndereco").value;
	var numero = document.getElementById("txtNumero").value;
	var bairro = document.getElementById("txtBairro").value; 
	var local_trabalho = document.getElementById("txtLocalTrabalho").value;
	var nirf = document.getElementById("txtNirf").value;
	var area_total = document.getElementById("txtTotalHA").value;
	var tipo_trabalho = document.getElementById("txtTipoTrabalho").value;
	var area_trabalhada = document.getElementById("txtAreaTrabalhada").value;
	
	
	if(nome != ""){
		if(data_nascimento != ""){
			if(cpf != ""){
				if(rg != ""){
					if(registro_nascimento != ""){
						if(livro != ""){
							if(folhas != ""){
								if(cartorio != ""){
									if(endereco != ""){
										if(numero != ""){
											if(bairro != ""){
												if(local_trabalho != ""){
													if(nirf != ""){
														if(area_total != ""){
															if(tipo_trabalho != ""){
																if(area_trabalhada != ""){
																	if(parseInt(area_total) > parseInt(area_trabalhada)){	
																		return true;
																	}else{
																		window.alert("A área trabalhada não pode ser maior que a área total!");
																		return false;
																	}
																}else{
																	window.alert("Preencha o campo Área Trabalhada!");
																	return false;
																}
															}else{
																window.alert("Preencha o campo Tipo de Trabalho!");
																return false;
															}
														}else{
															window.alert("Preencha o campo Área Total!");
															return false;
														}
													}else{
														window.alert("Preencha o campo Nirf!");
														return false;	
													}
												}else{
													window.alert("Preencha o campo Local de Trabalho!");
													return false;	
												}
											}else{
												window.alert("Preencha o campo Bairro!");
												return false;	
											}
										}else{
											window.alert("Preencha o campo Número!");
											return false;	
										}
									}else{
										window.alert("Preencha o campo Endereço!");
										return false;	
									}
								}else{
									window.alert("Preencha o campo Cartório!");
									return false;	
								}
							}else{
								window.alert("Preencha o campo Folhas!");
								return false;
							}
						}else{
							window.alert("Preencha o campo Livro!");
							return false;	
						}
					}else{
						window.alert("Preencha o campo Registro de Nascimento!");
						return false;	
					}
				}else{
					window.alert("Preencha o campo RG!");
					return false;	
				}
			}else{
				window.alert("Preencha o campo CPF!");
				return false;	
			}
		}else{
			window.alert("Preencha o campo Data de Nascimento!");
			return false;	
		}
	}else{
		window.alert("Preencha o campo Nome!");
		return false;	
	}
}

						
			

function valida_busca(){
	var filtro = document.getElementById("txtFiltro").value;
	
	if(filtro != ""){
		return true;
	}else{
		if(document.getElementById("rdMatricula").checked){
			window.alert("Preencha o campo Matricula!");
			return false;
		}else if(document.getElementById("rdNome").checked){
			window.alert("Preencha o campo Nome!");
			return false;
		}else if(document.getElementById("rdCPF").checked){
			window.alert("Preencha o campo CPF!");
			return false;
		}else{
			window.alert("Preencha o campo Líder Familiar!");
			return false;
		}
	}
}

function valida_senha(){
	
	var senha_atual = document.getElementById("txtSenhaAtual").value;
	var nova_senha = document.getElementById("txtNovaSenha").value;
	var confirma_nova_senha = document.getElementById("txtConfirmarNovaSenha").value;

	
	if(senha_atual != ""){
		if(nova_senha != ""){
			if(confirma_nova_senha != "" ){
				if(confirma_nova_senha == nova_senha){
					return true;				
				}else{
					window.alert("As senhas não coincidem!");
					return false;					
				}
				
			}else {
				window.alert("Preencha o campo Confirmar Nova Senha!");
				return false;
			}
		}else{
			window.alert("Preencha o campo Nova Senha!");
			return false;
		}
	}else{
		window.alert("Preencha o campo Senha!");
		return false;
	}	
}

function valida_conta(){
	var usuario = document.getElementById("txtUsuario").value;
	var senha = document.getElementById("txtSenha").value;
	var confirmar_senha = document.getElementById("txtConfirmarSenha").value;
	
	
	if(usuario != ""){
		if(senha != ""){
			if(confirmar_senha != ""){
				if(senha == confirmar_senha){
					return true;
				}else{
					window.alert("As senhas não coincidem!");
					return false;	
				}
			}else{
				window.alert("Preencha o campo Confirmar Senha!");
				return false;
			}
		}else{
			window.alert("Preencha o campo Senha!");
			return false;
		}
	}else{
		window.alert("Preencha o campo Usuário!");
		return false;
	}	
}

function verifica_filtro(){

	if(document.getElementById("rdMatricula").checked){
		document.getElementById("txtFiltro").placeholder = "Matricula";
		document.getElementById("txtFiltro").value = "";
	}else if(document.getElementById("rdNome").checked){
		document.getElementById("txtFiltro").placeholder = "Nome";
		document.getElementById("txtFiltro").value = "";
	}else if(document.getElementById("rdCPF").checked){
		document.getElementById("txtFiltro").placeholder = "CPF";
		document.getElementById("txtFiltro").value = "";
	}else{
		document.getElementById("txtFiltro").placeholder = "Líder Familiar";
		document.getElementById("txtFiltro").value = "";
	}
		
}


