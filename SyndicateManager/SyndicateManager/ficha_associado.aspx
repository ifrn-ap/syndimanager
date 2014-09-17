<%@ Page Title="" Language="C#" MasterPageFile="~/Master Page.Master" AutoEventWireup="true" CodeBehind="ficha_associado.aspx.cs" Inherits="SyndicateManager.ficha_associado" MaintainScrollPositionOnPostback="true" %>
<%@ PreviousPageType VirtualPath="~/consulta.aspx" %>

<asp:Content ID="Content1" ContentPlaceHolderID="cphConteudo" runat="server">
<fieldset class="sessoes">
    <legend>Dados Sindicais</legend>
    <div class="fieldset" style="width:24%">
        <asp:Label ID="lblMatricula" runat="server" CssClass="label" Text="Matricula: " Width="25%"></asp:Label>
        <asp:Label ID="lblMatriculaResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:25%">
    <asp:Label ID="lblGrupoFamiliar" runat="server" CssClass="label" 
            Text="Grupo Familiar: " Width="40%"></asp:Label>
    <asp:Label ID="lblGrupoFamiliarResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:24%">
    <asp:Label ID="lblDataAdmissao" runat="server" CssClass="label" 
            Text="Data de Admissão: " Width="43%"></asp:Label>
    <asp:Label ID="lblDataAdmissaoResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:24%">
    <asp:Label ID="lblSituacao" runat="server" CssClass="label" Text="Situação: " Width="25%"></asp:Label>
    <asp:Label ID="lblSituacaoResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:24%">
    <asp:Label ID="lblDataUltimoPagamento" runat="server" CssClass="label" 
            Text="Data do Último Pagamento: " Width="65%"></asp:Label>
    <asp:Label ID="lblDataUltimoPagamentoResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>
</fieldset>
    
<fieldset class="sessoes">
    <legend>Dados do Associado</legend>
    <div class="fieldset" style="width:30%">
        <asp:Label ID="lblNome" runat="server" CssClass="label" Text="Nome: " Width="14%"></asp:Label>
        <asp:Label ID="lblNomeResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:30%">
        <asp:Label ID="lblDataNascimento" runat="server" CssClass="label" 
            Text="Data de Nascimento: " Width="40%"></asp:Label>
        <asp:Label ID="lblDataNascimentoResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:30%">
        <asp:Label ID="lblNaturalidade" runat="server" CssClass="label" 
            Text="Naturalidade: " Width="28%"></asp:Label>
        <asp:Label ID="lblNaturalidadeResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:20%">
        <asp:Label ID="lblEstadoCivil" runat="server" CssClass="label" 
            Text="Estado Civil: " Width="35%"></asp:Label>
        <asp:Label ID="lblEstadoCivilResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:30%">
        <asp:Label ID="lblEscolaridade" runat="server" CssClass="label" 
            Text="Escolaridade: " Width="26%"></asp:Label>
        <asp:Label ID="lblEscolaridadeResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:19%">
        <asp:Label ID="lblCPF" runat="server" CssClass="label" 
            Text="CPF: " Width="15%"></asp:Label>
        <asp:Label ID="lblCPFResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:19%">
        <asp:Label ID="lblRG" runat="server" CssClass="label" 
            Text="RG: " Width="15%"></asp:Label>
        <asp:Label ID="lblRGResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

     <div class="fieldset" style="width:28%">
        <asp:Label ID="lblTituloEleitor" runat="server" CssClass="label" 
            Text="Titulo de Eleitor: " Width="35%"></asp:Label>
        <asp:Label ID="lblTituloEleitorResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:32%">
        <asp:Label ID="lblRegistroNascimento" runat="server" CssClass="label" 
            Text="Registro de Nascimento: " Width="44%"></asp:Label>
        <asp:Label ID="lblRegistroNascimentoResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:17%">
        <asp:Label ID="lblLivro" runat="server" CssClass="label" 
            Text="Livro: " Width="24%"></asp:Label>
        <asp:Label ID="lblLivroResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset">
        <asp:Label ID="lblFIs" runat="server" CssClass="label" 
            Text="FIs: " Width="10%"></asp:Label>
        <asp:Label ID="lblFIsResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>
</fieldset>

<fieldset class="sessoes">
    <legend>Localização</legend>
    <div class="fieldset">
        <asp:Label ID="lblEndereco" runat="server" CssClass="label" 
            Text="Endereço: " Width="30%"></asp:Label>
        <asp:Label ID="lblEnderecoResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset">
        <asp:Label ID="lblNumero" runat="server" CssClass="label" 
            Text="Número: " Width="27%"></asp:Label>
        <asp:Label ID="lblNumeroResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset">
        <asp:Label ID="lblBairro" runat="server" CssClass="label" 
            Text="Bairro: " Width="21%"></asp:Label>
        <asp:Label ID="lblBairroResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset">
        <asp:Label ID="lblMunicipio" runat="server" CssClass="label" 
            Text="Município: " Width="29%"></asp:Label>
        <asp:Label ID="lblMunicipioResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>
</fieldset>

<fieldset class="sessoes">
    <legend>Filiação</legend>
    <div class="fieldset">
        <asp:Label ID="lblPai" runat="server" CssClass="label" 
            Text="Pai: " Width="12%"></asp:Label>
        <asp:Label ID="lblPaiResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset">
        <asp:Label ID="lblAssociado" runat="server" CssClass="label" 
            Text="Associado? " Width="32%"></asp:Label>
        <asp:Label ID="lblAssociadoResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:50%">
        <asp:Label ID="lblMatriculaPai" runat="server" CssClass="label" 
            Text="Matricula: " Width="12%"></asp:Label>
        <asp:Label ID="lblMatriculaPaiResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>
    
    <div class="fieldset" >
        <asp:Label ID="lblMae" runat="server" CssClass="label" 
            Text="Mãe: " Width="15%"></asp:Label>
        <asp:Label ID="lblMaeResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset">
        <asp:Label ID="lblAssociada" runat="server" CssClass="label" 
            Text="Associada? " Width="32%"></asp:Label>
        <asp:Label ID="lblAssociadaResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset">
        <asp:Label ID="lblMatriculaMae" runat="server" CssClass="label" 
            Text="Matricula: " Width="28%"></asp:Label>
        <asp:Label ID="lblMatriculaMaeResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

</fieldset>

<fieldset class="sessoes">
    <legend>Dados de Trabalho</legend>
    <div class="fieldset" style="width:30%">
        <asp:Label ID="lblLocalTrabalho" runat="server" CssClass="label" 
            Text="Local de Trabalho: " Width="35%"></asp:Label>
        <asp:Label ID="lblLocalTrabalhoResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:20%">
        <asp:Label ID="lblNirf" runat="server" CssClass="label" 
            Text="Nirf: " Width="15%"></asp:Label>
        <asp:Label ID="lblNirfResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:45%">
        <asp:Label ID="lblTotalHA" runat="server" CssClass="label" 
            Text="Total de Há: " Width="16%"></asp:Label>
        <asp:Label ID="lblTotalHAResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:32%">
        <asp:Label ID="lblTipoTrabalho" runat="server" CssClass="label" 
            Text="Tipo de Trabalho: " Width="32%"></asp:Label>
        <asp:Label ID="lblTipoTrabalhoResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>
    <div class="fieldset" style="width:63%">
        <asp:Label ID="lblAreaTrabalhada" runat="server" CssClass="label" 
            Text="Área Trabalhada: " Width="16%"></asp:Label>
        <asp:Label ID="lblAreaTrabalhadaReposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:38%">
        <asp:Label ID="lblCarteiraProfissional" runat="server" CssClass="label" 
            Text="Carteira Profissional: " Width="32%"></asp:Label>
        <asp:Label ID="lblCarteiraProfissionalResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>
    <div class="fieldset" style="width:18%">
        <asp:Label ID="lblSerie" runat="server" CssClass="label" 
            Text="Serie: " Width="20%"></asp:Label>
        <asp:Label ID="lblSerieResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>
</fieldset>

<div style="text-align: center;">
    <asp:Button ID="btnVoltar" runat="server" Text="Voltar" CssClass="button" 
        onclick="btnVoltar_Click" PostBackUrl="consulta.aspx" />
</div>

</asp:Content>
