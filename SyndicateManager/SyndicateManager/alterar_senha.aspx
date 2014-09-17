<%@ Page Title="" Language="C#" MasterPageFile="~/Master Page.Master" AutoEventWireup="true" CodeBehind="alterar_senha.aspx.cs" Inherits="SyndicateManager.alterar_senha" %>
<asp:Content ID="Content1" ContentPlaceHolderID="cphConteudo" runat="server">
<div>
        <h2 id="cabecalho_pag" style="font-family: Corbel, Sans-Serif">
            Alterar Senha</h2>
        <hr style="border-style: solid; color: #d1d1d1;" />
    </div>
<fieldset id="fieldset" 
        style="border-style: none; border-color: inherit; border-width: medium; top: 0px; left: 0px;">
        <div class="text_box" style="margin-top: 10px">
                <asp:Label ID="lblSenhaAtual" runat="server" Text="Senha Atual" Font-Names="Verdana" Font-Size="Small"
                    CssClass="label"></asp:Label>
                <asp:TextBox ID="txtSenhaAtual" runat="server" Height="16px" Width="130px" 
                    CssClass="input" MaxLength="50" TextMode="Password"  ></asp:TextBox>
            </div>
            <div class="text_box" style="margin-top: 10px">
                <asp:Label ID="lblNovaSenha" runat="server" Font-Names="Verdana" 
                    Font-Size="Small" Text="Nova Senha"
                    CssClass="label" Width="138px"></asp:Label>
                <asp:TextBox ID="txtNovaSenha" runat="server" Height="16px" TextMode="Password" Width="130px"
                    CssClass="input"></asp:TextBox>
            </div>

            <div class="text_box" style="margin-top: 10px">
                <asp:Label ID="lblConfirmaSenha" runat="server" Font-Names="Verdana" 
                    Font-Size="Small" Text="Confirme a Senha"
                    CssClass="label" Width="138px"></asp:Label>
                <asp:TextBox ID="txtConfirmaSenha" runat="server" Height="16px" 
                    TextMode="Password" Width="130px"
                    CssClass="input"></asp:TextBox>
            </div>

            <div id="button" style="height: 116px; text-align:center">
                <asp:Button ID="btnAlterarSenha" runat="server" Text="Alterar Senha" 
                    Width="97px" CssClass="button"
                UseSubmitBehavior="False" onclick="btnAlterarSenha_Click" />

            </div>
</fieldset>
</asp:Content>
