<%@ Page Title="" Language="C#" MasterPageFile="~/Master Page.Master" AutoEventWireup="true" CodeBehind="remover_associado.aspx.cs" Inherits="SyndicateManager.Imagens.remover_associado" MaintainScrollPositionOnPostback="true" %>
<%@ PreviousPageType VirtualPath="~/remover.aspx" %>
<asp:Content ID="Content1" ContentPlaceHolderID="cphConteudo" runat="server">
<div style="text-align: center; margin:15px auto; ">
    <asp:Label ID="Label1" runat="server" 
        Text="Deseja remover permanentemente esse usuário ?" CssClass="label_remover"></asp:Label>
    
</div>
<fieldset class="remove">
    <div class="fieldset" style="width:18%">
        <asp:Label ID="lblMatricula" runat="server" CssClass="label" Text="Matricula: " Width="33%"></asp:Label>
        <asp:Label ID="lblMatriculaResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:30%">
        <asp:Label ID="lblNome" runat="server" CssClass="label" Text="Nome: " Width="14%"></asp:Label>
        <asp:Label ID="lblNomeResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:26%">
    <asp:Label ID="lblDataAdmissao" runat="server" CssClass="label" 
            Text="Data de Admissão: " Width="43%"></asp:Label>
    <asp:Label ID="lblDataAdmissaoResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

    <div class="fieldset" style="width:24%">
    <asp:Label ID="lblSituacao" runat="server" CssClass="label" Text="Situação: " Width="25%"></asp:Label>
    <asp:Label ID="lblSituacaoResposta" runat="server" CssClass="label_resposta"></asp:Label>
    </div>

</fieldset>

<div style="text-align: center; margin-top: 0px;">
    <asp:Button ID="btnRemover" runat="server" CssClass="button_remover" 
        onclick="btnRemover_Click" Text="Remover" />
    <asp:Button ID="btnVoltar" runat="server" CssClass="button_remover" 
        PostBackUrl="~/remover.aspx" Text="Voltar" />
</div>
</asp:Content>
