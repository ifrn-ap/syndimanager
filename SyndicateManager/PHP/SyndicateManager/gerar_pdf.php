<?php

	
	include 'mPDF/mpdf.php';
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
	
					if($_COOKIE['tipo'] == "ficha"){
					  
					  $html = "<html>
				<head>
					<meta charset='utf-8' />
					<link rel='stylesheet' type='text/css' href='css/style_components.css' />
					<link rel='stylesheet' type='text/css' href='css/style_pdf.css' />
				</head>
				
				<body>
					<h2>Ficha do Associado</h2>
					<div id='content'>
						<fieldset class='sessoes'>
							<legend>Dados Sindicais</legend>
							<div class='campos_cadastro'>
								<label><span>Matricula:</span> ".$dados_associado['matricula']." </label>
							</div>
							
							<div class='campos_cadastro'>
								<label><span>Líder Familiar:</span>".$dados_associado['lider_familiar']."</label>
							</div>
							
							<div class='campos_cadastro'>
								<label><span>Data Admissão:</span> ".implode("/",array_reverse(explode("-",$dados_associado['data_admissao'])))." </label>
							</div>
							
							<div class='campos_cadastro'>
								<label><span>Data do Último Pagamento:</span> ".implode("/",array_reverse(explode("-",$dados_associado['data_admissao'])))." </label>
							</div>            
						</fieldset>
					   
						
						<fieldset class='sessoes'>
							<legend>Dados do Associado</legend>
							<div class='campos_cadastro'>
								<label><span>Nome:</span> ".$dados_associado['nome']." </label>
							</div>
							
							<div class='campos_cadastro'>
								<label><span>Data de Nascimento:</span> ".implode("/",array_reverse(explode("-",$dados_associado['data_nascimento'])))." </label>
							</div>
							
							<div class='campos_cadastro'>  
								<label><span>Naturalidade:</span> ".$dados_naturalidade['cidade']."-".$dados_naturalidade['uf']." </label>
							</div>
							
							<div class='campos_cadastro'> 
								<label><span>Estado Civil:</span> ".$dados_estado_civil['estado_civil']." </label>
							</div>
							
							<div class='campos_cadastro'>  
								<label><span>Escolaridade:</span> ".$dados_escolaridade['escolaridade']." </label>
							</div>
					
							<div class='campos_cadastro'>
								<label><span>CPF:</span> ".$dados_associado['cpf']."</label>
							</div>
							
							<div class='campos_cadastro'>
								<label><span>RG:</span> ".$dados_associado['rg']." </label>
							</div>
							
							<div class='campos_cadastro'>
								<label><span>Titulo de Eleitor:</span> ".$dados_associado['titulo_eleitor']." </label>
							</div>
					
							<div class='campos_cadastro'>
								<label><span>Registro de Nascimento:</span> ".$dados_associado['registro_nascimento']." </label>
							</div>
							
							<div class='campos_cadastro'>
								<label><span>Livro:</span> ".$dados_associado['livro']." </label>
							</div>
							
							<div class='campos_cadastro'>
								<label><span>Folhas:</span> ".$dados_associado['Fis']." </label>
							</div>
							
							<div class='campos_cadastro'>
								<label><span>Cartório:</span> ".$dados_associado['cartorio']." </label>
							</div>
							
						 </fieldset>
							
						 <fieldset class='sessoes'>
							<legend>Localização</legend>
							<div class='campos_cadastro'>
								<label><span>Endereço:</span> ".$dados_endereco['logradouro']." </label>
							</div>
								
							<div class='campos_cadastro'>
								<label><span>Número:</span> ".$dados_endereco['numero']." </label>
							</div>
								
							<div class='campos_cadastro'>
								<label><span>Bairro:</span> ".$dados_endereco['bairro']." </label>
							</div>
							 
							<div class='campos_cadastro'>    
								<label><span>Municipio:</span> ".$dados_endereco['cidade']."-".$dados_endereco['uf']."</label>
							</div>
							
						</fieldset>
							 
						<fieldset class='sessoes'>
							<legend>Dados de Trabalho</legend>
							<div class='campos_cadastro'>
								<label><span>Local de Trabalho:</span> ".$dados_associado['local_trabalho']." </label>
							</div>
								
							<div class='campos_cadastro'>
								<label><span>Nirf:</span> ".$dados_associado['nirf']." </label>
							</div>
							   
							<div class='campos_cadastro'>
								<label><span>Área Total (em Ha):</span> ".$dados_associado['area_total']." ha</label>
							</div>
							   
							<div class='campos_cadastro'>
								<label><span>Tipo de Trabalho:</span> ".$dados_associado['tipo_trabalho']." </label>
							</div>
								
							<div class='campos_cadastro'>
								<label><span>Área Trabalhada (em Ha):</span> ".$dados_associado['area_trabalhada']." ha</label>
							</div>
							   
							<div class='campos_cadastro'>
								<label><span>Carteira Profissional:</span> ".$dados_associado['cart_profissional']." </label>
							</div>
								
							<div class='campos_cadastro'>
								<label><span>Serie:</span> ".$dados_associado['serie']."</label>
							</div>
						</fieldset>
						
						<p id='direita'>Caraúbas/RN, ". date('d') ." de ". retornaMes(date('m')) ." de ". date('Y') .".</p>
						<p id='assinatura'>_______________________________</p>
						<p id='texto_assinatura'>PRESIDENTE</p>
						
					</div>			
				</body>
			</html>";
					  
					  
					  $mpdf=new mPDF();
					  $mpdf->WriteHTML($html);
					  $mpdf->Output("ficha_".$dados_associado['matricula'].".pdf","I");
					  exit();
					  
					}else if($_COOKIE['tipo'] == "cartao"){
						
						
						
					}else if($_COOKIE['tipo'] == "atividade"){
						
						$html = "<html>
								  <head>
									  <meta charset='utf-8' />
									  <link rel='stylesheet' type='text/css' href='css/style_pdf.css' />
								  </head>
								  
								  <body>
									  <div id='content'>
										  <div id='img_cabecalho'>
											  <img src='imagens/fichas/cabecalho_pdf.jpg' />
										  </div>
											  
										  <div id='texto'>
											  <h3>Declaração de Atividade</h3>
											  
											  <p>	EU, José Maria Junior, brasileiro, divorciado, residente e domiciliado no Sitio Sabe Muito, municipio de Caraúbas/RN, portador da cedula de Identidade nº. RG 941.319 CPF: 625.964.544 - 91 Presidente deste Sindicato; declaro para os devidos fins que o(a) senhor(a)  ".  $dados_associado['nome'] .", brasileiro(a), solteiro(a), agricultor(a) portador(a) do RG. ". $dados_associado['rg'] ." e CPF. ". $dados_associado['cpf'] .", residente e domiciliado(a) no(a) ".  $dados_endereco['logradouro'] .", desenvolve a atividade agricola no imóvel rural ".  $dados_associado['local_trabalho'] ." cadastrado na Receita Federal sob nº ".  $dados_associado['nirf'] .", medindo ".  $dados_associado['area_total'] ." ha, localizada neste municipio de Caraúbas-RN, de propriedade do senhor Jose Diniz Sales. Portanto enquadrando-se nos moldes da agricultura familiar.</p>
											  
											  <p>A presente declaração está sendo prestada sob as penais da lei, respondendo o seu declarante por qualquer ato que decorra de sua falsidade ideológica.</p>
											  <p id='direita'>Caraúbas/RN, ". date('d') ." de ". retornaMes(date('m')) ." de ". date('Y') .".</p>
											  <p id='assinatura'>_______________________________</p>
											  <p id='texto_assinatura'><span>Nome:</span> ". $dados_associado['nome'] ."</p>
											  <p id='texto_assinatura'><span>CPF:</span> ". $dados_associado['cpf'] ."</p>
										  </div>
										  
										  <div id='img_rodape'>
											  <img src='imagens/fichas/rodape_pdf.jpg' />
										  </div>
									  </div>			
								  </body>
							  </html>";
							  
							  $mpdf=new mPDF();
							  $mpdf->WriteHTML($html);
							  $mpdf->Output("atividade_".$dados_associado['matricula'].".pdf","I");
							  exit();
							  
							  
						
					}else if($_COOKIE['tipo'] == "transferencia"){
						
						$html = "<html>
								  <head>
									  <meta charset='utf-8' />
									  <link rel='stylesheet' type='text/css' href='css/style_pdf.css' />
								  </head>
								  
								  <body>
									  <div id='content'>
										  <div id='img_cabecalho'>
											  <img src='imagens/fichas/cabecalho_pdf.jpg' />
										  </div>
											  
										  <div id='texto'>
											  <h3>Solicitação de Transferência</h3>
											  
											  <p style='text-indent: 0'>Ilmo. Sr. Ismar Vicente dos Santos <br />
											  	 M.D. Presidente do STR de Upanema-RN<br />
												 Neste</p>
											  
											  <p>Através do presente expediente encaminhando a Vossa Senhoria a solicitação de transferência e simultaneamente o pedido de filiação do(a) senhor(a) ".  $dados_associado['nome'] .", brasileiro(a), solteiro(a), CPF. ".  $dados_associado['cpf'] ." residente e domiciliado(a) neste municipio de Upanema-RN; o(a) mesmo(a) filiou-se a esta entidade sindical com Matricula nº. ".  $dados_associado['matricula'] ." em ".  substr(implode("/",array_reverse(explode("-",$dados_associado['data_admissao']))),0,2) ." de ". retornaMes(substr(implode("/",array_reverse(explode("-",$dados_associado['data_admissao']))),3,2)) ." de ".  substr(implode("/",array_reverse(explode("-",$dados_associado['data_admissao']))),6,4) .", época em que residia neste municipio de Caraúbas-RN; o(a) mesmo(a) contribuiu com esta entidade sindical  até o mes de ". retornaMes(substr(implode("/",array_reverse(explode("-",$dados_associado['data_pagamento']))),3,2)) ." do ano de ". substr(implode("/",array_reverse(explode("-",$dados_associado['data_pagamento']))),6,4) .", como consta em nossos arquivos.</p>
											  
											  <p>Sendo o que tínhamos para o momento solicitamos pronto atendimento ao nosso pleito ao mesmo tempo em que renovamos votos de estima e apreço.</p>
											  <p>Saudações sindicais;</p>
											  <p id='texto_assinatura'>José Maria Junior</p>
											  <p id='texto_assinatura'>Presidente</p>
										  </div>
										  
										  <div id='img_rodape'>
											  <img src='imagens/fichas/rodape_pdf.jpg' />
										  </div>
									  </div>			
								  </body>
							  </html>";
							  
							  $mpdf=new mPDF();
							  $mpdf->WriteHTML($html);
							  $mpdf->Output("transferencia_".$dados_associado['matricula'].".pdf","I");
							  exit();
						
						
						
							}
						  }
					  }
				  }
				}
			}else{
						header("Location:busca.php?acao=".$_COOKIE['tipo']."&error=1");	
			}
		}
		
		
		
		
		
		
		
		
		
		
?>