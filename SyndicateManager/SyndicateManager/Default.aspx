<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="Default.aspx.cs" Inherits="SyndicateManager.paginas.WebForm1" %>

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
				<a href="#"><img src="../imagens/logo_sm.png" alt="logo_SydicateManager" /></a>
			</div>
    </div>
		
        <div id="content">
		    <div id="login_box">
                <form id="frmSynManager" runat="server">
                &nbsp;<br />
&nbsp;&nbsp;
                <asp:Label ID="lblMatricula" runat="server" Text="Matricula do Usuario" 
                Font-Names="Verdana" Font-Size="Small"></asp:Label>
&nbsp;&nbsp;
                <asp:TextBox ID="txtMatricula" runat="server" Height="16px" Width="133px"></asp:TextBox>
                <br />
                <br />
&nbsp;&nbsp; <asp:Label ID="lblSenha" runat="server" Font-Names="Verdana" 
                Font-Size="Small" Text="Senha"></asp:Label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:TextBox ID="txtSenha" runat="server" Height="16px" TextMode="Password" 
                Width="133px"></asp:TextBox>
                <br />
                <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:Label ID="lblFalhou" runat="server" Font-Bold="True" Font-Names="Corbel" 
                ForeColor="#FF3300"></asp:Label>
                <br />
                <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;<asp:Button ID="btnLogin" runat="server" Text="Login" Width="60px" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:Button ID="btnLimpar" runat="server" Text="Limpar" Width="60px" />
                </form>
		    </div>
        </div>
		
		<div id="footer">
			<img src="../imagens/footer_sistema.png" alt="rodape" id="rodape_site" />
		</div>
</body>
</html>
