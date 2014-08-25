<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="Default.aspx.cs" Inherits="SyndicateManager.WebForm1" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <link rel="Stylesheet" type="text/css" href="StyleSheet1.css" />
    <title>Login - SyndicateManager</title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        Login<br />
        <asp:TextBox ID="TextBox1" runat="server" Width="190px"></asp:TextBox>
        <br />
        <br />
        Senha<br />
        <asp:TextBox ID="TextBox2" runat="server" Width="190px"></asp:TextBox>
        <br />
        <br />
        <asp:Label ID="Label1" runat="server" Font-Bold="True" Font-Names="Corbel" 
            ForeColor="Red"></asp:Label>
        <br />
        <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <asp:Button ID="Button1" runat="server" onclick="Button1_Click" 
             Text="Cadastrar" />
    
    </div>
    </form>
</body>
</html>
