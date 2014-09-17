<%@ Page Title="" Language="C#" MasterPageFile="~/Master Page.Master" AutoEventWireup="true" CodeBehind="criar_conta.aspx.cs" Inherits="SyndicateManager.Css.criar_conta" %>
<asp:Content ID="Content1" ContentPlaceHolderID="cphConteudo" runat="server">
<div>
        <h2 id="cabecalho_pag" style="font-family: Corbel, Sans-Serif">
            Criar Conta de Usuário</h2>
        <hr style="border-style: solid; color: #d1d1d1;" />
    </div>
<fieldset id="fieldset" style="border: none;">
            <div class="text_box" style="margin-top: 10px;">
                <asp:Label ID="lblMatricula" runat="server" Text="Usuario" Font-Names="Verdana" Font-Size="Small"
                    CssClass="label"></asp:Label>
                <asp:TextBox ID="txtLogin" runat="server" Height="16px" Width="130px" 
                    CssClass="input" MaxLength="50"></asp:TextBox>
            </div>
            <div class="text_box" style="margin-top: 10px;">
                <asp:Label ID="lblSenha" runat="server" Font-Names="Verdana" Font-Size="Small" Text="Senha"
                    CssClass="label"></asp:Label>
                <asp:TextBox ID="txtSenha" runat="server" Height="16px" TextMode="Password" Width="130px"
                    CssClass="input"></asp:TextBox>
            </div>
            <div id="button" style="text-align:center">
                <asp:Button ID="btnCriar" runat="server" Text="Criar" Width="60px" CssClass="button"
                     UseSubmitBehavior="False" onclick="btnCriar_Click" />
                
            </div>
        </fieldset>
</asp:Content>
