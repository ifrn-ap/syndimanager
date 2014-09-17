<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="login.aspx.cs" Inherits="SyndicateManager.login" MaintainScrollPositionOnPostback="true" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/style2.css" />
    <title>Login - SyndicateManager</title>
</head>
<body>
    <div id="header">
        <div id="logo_sm">
            <a href="#">
                <img src="../imagens/logo_sm.png" alt="logo_SydicateManager" /></a>
        </div>
    </div>
    <div id="content">
        <fieldset>
            <form id="frmSynManager" runat="server" autocomplete="off">
            <div class="text_box">
                <asp:Label ID="lblMatricula" runat="server" Text="Usuario" Font-Names="Verdana" Font-Size="Small"
                    CssClass="label"></asp:Label>
                <asp:TextBox ID="txtMatricula" runat="server" Height="16px" Width="130px" 
                    CssClass="input" MaxLength="50"></asp:TextBox>
            </div>
            <div class="text_box">
                <asp:Label ID="lblSenha" runat="server" Font-Names="Verdana" Font-Size="Small" Text="Senha"
                    CssClass="label"></asp:Label>
                <asp:TextBox ID="txtSenha" runat="server" Height="16px" TextMode="Password" Width="130px"
                    CssClass="input"></asp:TextBox>
            </div>
            <div id="falha">
                <asp:Label ID="lblFalhou" runat="server" Font-Bold="True" Font-Names="Corbel" ForeColor="#D22000"></asp:Label>
            </div>
            <div id="button">
                <asp:Button ID="btnLogin" runat="server" Text="Login" Width="60px" CssClass="button"
                    OnClick="btnLogin_Click" UseSubmitBehavior="False" />
                <asp:Button ID="btnLimpar" runat="server" Text="Limpar" Width="60px" CssClass="button"
                    OnClick="btnLimpar_Click" UseSubmitBehavior="False" />
            </div>
            </form>
        </fieldset>
    </div>
    <div id="footer">
        <img src="../imagens/footer_sistema.png" alt="rodape" id="rodape_site" />
    </div>
</body>
</html>
