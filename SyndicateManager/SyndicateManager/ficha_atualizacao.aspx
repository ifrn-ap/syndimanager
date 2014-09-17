<%@ Page Title="" Language="C#" MasterPageFile="~/Master Page.Master" AutoEventWireup="true" CodeBehind="ficha_atualizacao.aspx.cs" Inherits="SyndicateManager.ficha_atualizacao" %>
<asp:Content ID="Content1" ContentPlaceHolderID="cphConteudo" runat="server">
    
    <div>
        <h2 id="cabecalho_pag" style="font-family: Corbel, Sans-Serif">
            Atualização de Cadastro</h2>
        <hr style="border-style: solid; color: #d1d1d1;" />
    </div>
    <div id="formulario">
        <div class="form_cadastro">
            <asp:Label ID="lblMatricula" runat="server" Text="Matricula" CssClass="label" Width="25%"></asp:Label>
            <asp:TextBox ID="txtMatricula" runat="server" ReadOnly="True" Font-Bold="True" CssClass="input"
                Width="100px "></asp:TextBox>
        </div>
        <div class="form_cadastro">
            <asp:Label ID="lblDataAdmissao" runat="server" Text="Data de Admissão" CssClass="label"
                Width="50%"></asp:Label>
            <asp:TextBox ID="txtDataAdmissao" runat="server" ReadOnly="True" Font-Bold="True"
                Width="100px" CssClass="input"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 100%">
            <asp:Label ID="lblNome" runat="server" Text="Nome" CssClass="label" Width="10%"></asp:Label>
            <asp:TextBox ID="txtNome" runat="server" Width="90%" CssClass="input" 
                Height="20px" MaxLength="100"></asp:TextBox>
        </div>
        <div class="form_cadastro">
            <asp:Label ID="lblEndereco" runat="server" Text="Endereço" CssClass="label" Width="25%"></asp:Label>
            <asp:TextBox ID="txtEndereco" runat="server" Width="180px" CssClass="input" 
                MaxLength="50"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 20%">
            <asp:Label ID="lblNumero" runat="server" Text="Numero" CssClass="label" Width="35%"></asp:Label>
            <asp:TextBox ID="txtNumero" runat="server" Width="55px" CssClass="input" 
                MaxLength="4"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 30%">
            <asp:Label ID="lblBairro" runat="server" Text="Bairro" CssClass="label" Width="15%"></asp:Label>
            <asp:TextBox ID="txtBairro" runat="server" CssClass="input" MaxLength="10"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 30%">
            <asp:Label ID="lblMunicipio" runat="server" Text="Municipio" CssClass="label" Width="32%"></asp:Label>
            <asp:DropDownList ID="ddlMunicipios" runat="server" Height="20px" Width="75%" 
                CssClass="input">
                <asp:ListItem Value="1" Selected="True">Caraúbas - RN</asp:ListItem>
            </asp:DropDownList>
        </div>
        <div class="form_cadastro" style="width: 25%">
            <asp:Label ID="lblDataNascimento" runat="server" Text="Data de Nascimento" CssClass="label"
                Width="90%"></asp:Label>
            
            <asp:TextBox ID="txtDataNascimento" runat="server" Width="129px" 
                CssClass="input" MaxLength="10"></asp:TextBox>
        </div>
        <div class="form_cadastro">
            <asp:Label ID="lblNaturalidade" runat="server" Text="Naturalidade" CssClass="label"
                Width="30%"></asp:Label>
            <asp:DropDownList ID="ddlNaturalidade" runat="server" DataTextFormatString="nome"
                Height="20px" Width="65%" CssClass="input">
                <asp:ListItem Value="1" Selected="True">Caraúbas - RN</asp:ListItem>
            </asp:DropDownList>
        </div>
        <div class="form_cadastro" style="width: 50%">
            <asp:Label ID="lblEstadoCivil" runat="server" Text="Estado Civil" CssClass="label"
                Width="35%"></asp:Label>
            <asp:DropDownList ID="ddlEstadoCivil" runat="server" Height="20px" Width="50%" 
                CssClass="input" >
                <asp:ListItem Value="1" Selected="True">1 - Solteiro (a)</asp:ListItem>
                <asp:ListItem Value="2">2 - Casado (a)</asp:ListItem>
                <asp:ListItem Value="3">3 - Divorciado (a)</asp:ListItem>
                <asp:ListItem Value="4">4 - Viúvo (a)</asp:ListItem>
            </asp:DropDownList>
        </div>
        <div class="form_cadastro">
            <asp:Label ID="lblEscolaridade" runat="server" Text="Grau de Escolaridade" CssClass="label"
                Width="60%"></asp:Label>
            <asp:DropDownList ID="ddlEscolaridade" runat="server" Height="20px" Width="60%" 
                CssClass="input">
                <asp:ListItem Value="1" Selected="True">1 - Nenhum</asp:ListItem>
                <asp:ListItem Value="2">2 - Primeiro Grau Incompleto</asp:ListItem>
                <asp:ListItem Value="3">3 - Primeiro Grau Completo</asp:ListItem>
                <asp:ListItem Value="4">4 - Segundo Grau Incompleto</asp:ListItem>
                <asp:ListItem Value="5">5 - Segundo Grau Completo</asp:ListItem>
                <asp:ListItem Value="6">6 - Terceiro Grau Incompleto</asp:ListItem>
                <asp:ListItem Value="7">7 - Terceiro Grau Completo</asp:ListItem>
                <asp:ListItem Value="8">8 - Pós-Graduado</asp:ListItem>
            </asp:DropDownList>
        </div>
        <div class="form_cadastro" style="width: 25%">
            <asp:Label ID="lblLocalTrabalho" runat="server" Text="Local de Trabalho" CssClass="label"
                Width="80%"></asp:Label>
            <asp:TextBox ID="txtLocalTrabalho" runat="server" Width="150px" 
                CssClass="input" MaxLength="50"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 19%">
            <asp:Label ID="lblNirf" runat="server" Text="Nirf" CssClass="label" Width="25%"></asp:Label>
            <asp:TextBox ID="txtNifr" runat="server" Width="100px" CssClass="input" 
                MaxLength="12"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 15%">
            <asp:Label ID="lblTotalHA" runat="server" Text="Total de Há" CssClass="label" Width="90%"></asp:Label>
            <asp:TextBox ID="txtTotalHA" runat="server" Width="50px" CssClass="input" 
                MaxLength="4"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 20%">
            <asp:Label ID="lblTipoTrabalho" runat="server" Text="Tipo de Trabalho" CssClass="label"
                Width="90%"></asp:Label>
            <asp:TextBox ID="txtTipoTrabalho" runat="server" Width="100px" CssClass="input" 
                MaxLength="10"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 18%">
            <asp:Label ID="lblAreaTrabalhada" runat="server" Text="Área Trabalhada" CssClass="label"
                Width="119%"></asp:Label>
            <asp:TextBox ID="txtAreaTrabalhada" runat="server" Width="50px" 
                CssClass="input" MaxLength="4"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 20%">
            <asp:Label ID="lblRG" runat="server" Text="RG" CssClass="label" Width="18%"></asp:Label>
            <asp:TextBox ID="txtRG" runat="server" Width="100px" CssClass="input" 
                MaxLength="10"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 20%">
            <asp:Label ID="lblCPF" runat="server" Text="CPF" CssClass="label" Width="10%"></asp:Label>
            <asp:TextBox ID="txtCPF" runat="server" Width="100px" CssClass="input" 
                MaxLength="14"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 20%">
            <asp:Label ID="lblTituloEleitor" runat="server" Text="Titulo de Eleitor" CssClass="label"></asp:Label>
            <asp:TextBox ID="txtTituloEleitor" runat="server" Width="130px" 
                CssClass="input" MaxLength="13"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 23%">
            <asp:Label ID="lblCarteiraProfissional" runat="server" Text="Carteira Profissional"
                CssClass="label" Width="150px"></asp:Label>
            <asp:TextBox ID="txtCarteiraProfissional" runat="server" Width="100px" 
                CssClass="input" MaxLength="6"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 15%">
            <asp:Label ID="lblSerie" runat="server" Text="Série" CssClass="label"></asp:Label>
            <asp:TextBox ID="txtSerie" runat="server" Width="80px" CssClass="input" 
                MaxLength="10"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 30%">
            <asp:Label ID="lblRegistroNascimento" runat="server" Text="Registro de Nascimento"
                CssClass="label" Width="177px"></asp:Label>
            <asp:TextBox ID="txtRegistroNascimento" runat="server" Width="50px" 
                CssClass="input" MaxLength="3"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 15%">
            <asp:Label ID="lblLivro" runat="server" Text="Livro" CssClass="label"></asp:Label>
            <asp:TextBox ID="txtLivro" runat="server" Width="60px" CssClass="input" 
                MaxLength="4"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 25%">
            <asp:Label ID="lvlFis" runat="server" Text="FIs" CssClass="label"></asp:Label>
            <asp:TextBox ID="txtFIs" runat="server" Width="150px" CssClass="input" 
                MaxLength="26"></asp:TextBox>
        </div>
        
        <div class="form_cadastro" style="width: 80%">
            <asp:Label ID="lblPai" runat="server" CssClass="label" Text="Pai"></asp:Label>
            <asp:TextBox ID="txtPai" runat="server" Width="79%" MaxLength="100"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="margin-top: 0px; width: 100%">
            <asp:CheckBox ID="chkAssociadoPai" runat="server" CssClass="label" Width="25%" Text="Associado?"
                AutoPostBack="True" OnCheckedChanged="chkAssociadoPai_CheckedChanged" />
            <asp:Label ID="lblMatriculaPai" runat="server" CssClass="label" Text="Matricula"
                Width="10%" Visible="False"></asp:Label>
            <asp:TextBox ID="txtMatriculaPai" runat="server" Width="100px"
                Visible="False" MaxLength="5"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="width: 80%">
            <asp:Label ID="lblMae" runat="server" CssClass="label" Text="Mãe"></asp:Label>
            <asp:TextBox ID="txtMae" runat="server" Width="79%" MaxLength="100"></asp:TextBox>
        </div>
        <div class="form_cadastro" style="margin-top: 0px; width: 100%">
            <asp:CheckBox ID="chkAssociadoMae" runat="server" CssClass="label" Width="25%" Text="Associada?"
                AutoPostBack="True" OnCheckedChanged="chkAssociadoMae_CheckedChanged" />
            <asp:Label ID="lblMatriculaMae" runat="server" CssClass="label" Text="Matricula"
                Width="10%" Visible="False"></asp:Label>
            <asp:TextBox ID="txtMatriculaMae" runat="server" Width="100px"
                Visible="False" MaxLength="5"></asp:TextBox>
        </div>
        <div class="botoes">
            <asp:Button ID="btnAtualizar" runat="server" Text="Atualizar" Width="75px" 
                CssClass="button" onclick="btnAtualizar_Click"  />
                <asp:Button ID="btnVoltar" runat="server" CssClass="button_remover" 
        PostBackUrl="~/atualizacao.aspx" Text="Voltar" />
            </div>

    </div>
</asp:Content>
