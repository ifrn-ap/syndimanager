<%@ Page Title="" Language="C#" MasterPageFile="~/Master Page.Master" AutoEventWireup="true" CodeBehind="consulta.aspx.cs" Inherits="SyndicateManager.consulta" MaintainScrollPositionOnPostback="true" %>
<asp:Content ID="Content1" ContentPlaceHolderID="cphConteudo" runat="server">
<h2 id="cabecalho_pag" style="font-family: Corbel, Sans-Serif">
            Consultar Associado</h2>
        <hr style="border-style: solid; color: #d1d1d1;" />
<div class="pesquisa">


    <asp:Label ID="lblMatricula" runat="server" CssClass="label" Text="Matricula" 
        Width="13%" ></asp:Label>


    <asp:TextBox ID="txtMatricula" runat="server" Width="130px"></asp:TextBox>
    <asp:ImageButton ID="ibtnPesquisar" runat="server" AlternateText="Pesquisar" 
        CssClass="img_button" Height="21px" 
        ImageUrl="~/Imagens/Icones/icon_pesquisa_vermelho.png" Width="17px" 
        onclick="ibtnPesquisar_Click" />


</div>

</asp:Content>
