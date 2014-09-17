using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using MySql.Data.MySqlClient;

namespace SyndicateManager
{
    public partial class ficha_atualizacao : System.Web.UI.Page
    {
        public String strConn = "server=localhost;userid=root;password=25255454;database=sindicato";
        public String associado;
        public String associada;

        protected void Page_Load(object sender, EventArgs e)
        {
            if (!IsPostBack)
            {
                String matricula = Session["matricula"].ToString();
                MySqlConnection bdConn = new MySqlConnection(strConn);
                MySqlCommand commConsultaAssociado = new MySqlCommand("SELECT * FROM associado WHERE matricula=" + matricula + ";", bdConn);
                MySqlDataAdapter bdAdapter = new MySqlDataAdapter(commConsultaAssociado);
                DataTable DT = new DataTable();

                bdConn.Open();
                bdAdapter.Fill(DT);

                txtMatricula.Text = DT.Rows[0]["matricula"].ToString();
                txtDataAdmissao.Text = DT.Rows[0]["data_admissao"].ToString().Substring(0, 10);
                txtNome.Text = DT.Rows[0]["nome"].ToString();
                ddlNaturalidade.SelectedValue = DT.Rows[0]["cidade_id"].ToString();
                txtDataNascimento.Text = DT.Rows[0]["data_nascimento"].ToString().Substring(0, 10);
                ddlEstadoCivil.SelectedValue = DT.Rows[0]["estado_civil_id"].ToString();
                ddlEscolaridade.SelectedValue = DT.Rows[0]["escolaridade_id"].ToString();
                txtLocalTrabalho.Text = DT.Rows[0]["local_trabalho"].ToString();
                txtNifr.Text = DT.Rows[0]["nirf"].ToString();
                txtTotalHA.Text = DT.Rows[0]["area_total"].ToString();
                txtTipoTrabalho.Text = DT.Rows[0]["tipo_trabalho"].ToString();
                txtAreaTrabalhada.Text = DT.Rows[0]["area_trabalhada"].ToString();
                txtRG.Text = DT.Rows[0]["rg"].ToString();
                txtCPF.Text = DT.Rows[0]["cpf"].ToString();
                txtTituloEleitor.Text = DT.Rows[0]["titulo_eleitor"].ToString();
                txtCarteiraProfissional.Text = DT.Rows[0]["cart_profissional"].ToString();
                txtSerie.Text = DT.Rows[0]["serie"].ToString();
                txtRegistroNascimento.Text = DT.Rows[0]["registro_nascimento"].ToString();
                txtLivro.Text = DT.Rows[0]["livro"].ToString();
                txtFIs.Text = DT.Rows[0]["Fis"].ToString();
                txtPai.Text = DT.Rows[0]["pai"].ToString();
                txtMae.Text = DT.Rows[0]["mae"].ToString();
                txtMatriculaMae.Text = DT.Rows[0]["matricula_mae"].ToString();
                txtMatriculaPai.Text = DT.Rows[0]["matricula_pai"].ToString();

                if (DT.Rows[0]["pai_associado"].ToString() == "Não")
                {
                    chkAssociadoPai.Checked = false;
                }
                else if (DT.Rows[0]["pai_associado"].ToString() == "Sim")
                {
                    chkAssociadoPai.Checked = true;
                }

                if (DT.Rows[0]["mae_associada"].ToString() == "Não")
                {
                    chkAssociadoPai.Checked = false;
                }
                else if (DT.Rows[0]["mae_associada"].ToString() == "Sim")
                {
                    chkAssociadoPai.Checked = true;
                }

                commConsultaAssociado.Dispose();
                DT.Clear();
                bdConn.Close();

                MySqlCommand commVerificaEndereco = new MySqlCommand("SELECT * FROM endereco AS end, associado AS ass WHERE end.id = ass.endereco_id;", bdConn);
                MySqlDataAdapter bdAdapter2 = new MySqlDataAdapter(commVerificaEndereco);

                bdConn.Open();
                bdAdapter2.Fill(DT);

                ddlMunicipios.SelectedValue = DT.Rows[0]["cidade_id"].ToString();
                txtEndereco.Text = DT.Rows[0]["logradouro"].ToString();
                txtNumero.Text = DT.Rows[0]["numero"].ToString();
                txtBairro.Text = DT.Rows[0]["bairro"].ToString();

                DT.Clear();
                commVerificaEndereco.Dispose();
                bdConn.Close();
                bdAdapter2.Dispose();
                bdAdapter.Dispose();
                bdConn.Dispose();

                txtMatriculaPai.Text = "null";
                txtMatriculaMae.Text = "null";
            }
        }

        protected void btnAtualizar_Click(object sender, EventArgs e)
        {
            String matricula = Session["matricula"].ToString();
            MySqlConnection bdConn = new MySqlConnection(strConn);
            MySqlCommand commConsultaAssociado = new MySqlCommand("UPDATE associado SET nome='" + txtNome.Text + "', cidade_id=" + ddlNaturalidade.SelectedValue + ", data_nascimento='" + txtDataNascimento.Text.Substring(6, 4) + "-" + txtDataNascimento.Text.Substring(3, 2) + "-" + txtDataNascimento.Text.Substring(0, 2) + "', estado_civil_id=" + ddlEstadoCivil.SelectedValue + ", escolaridade_id=" + ddlEscolaridade.SelectedValue + ", local_trabalho='" + txtLocalTrabalho.Text + "', nirf='" + txtNifr.Text +"', area_total='"+ txtTotalHA.Text +"', tipo_trabalho='"+ txtTipoTrabalho.Text +"', area_trabalhada='"+ txtAreaTrabalhada.Text +"', rg='"+ txtRG.Text +"', cpf='"+ txtCPF.Text +"', titulo_eleitor='"+ txtTituloEleitor.Text +"', cart_profissional='"+ txtCarteiraProfissional.Text +"', serie='"+ txtSerie.Text +"', registro_nascimento='"+ txtRegistroNascimento.Text +"', livro='"+ txtLivro.Text +"', Fis='" + txtFIs.Text +"', pai='"+ txtPai.Text + "', mae='"+ txtMae.Text  +"', pai_associado='"+ associado +"', mae_associada='"+ associada +"', matricula_pai="+ txtMatriculaPai.Text +",matricula_mae="+ txtMatriculaMae.Text +" WHERE matricula="+ matricula +";", bdConn);

            bdConn.Open();

            //try
            //{
                commConsultaAssociado.ExecuteNonQuery();
                ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Atualizado com Sucesso!\");", true);
            //}
            //catch
            //{
            //    ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Não foi possível realizar a atualização!\");", true);
            //}


        }

        protected void chkAssociadoPai_CheckedChanged(object sender, EventArgs e)
        {
            if (chkAssociadoPai.Checked == true)
            {
                lblMatriculaPai.Visible = true;
                txtMatriculaPai.Visible = true;
                associado = "Sim";
                txtMatriculaPai.Text = String.Empty;
            }
            else
            {
                lblMatriculaPai.Visible = false;
                txtMatriculaPai.Visible = false;
                associado = "Não";
                txtMatriculaPai.Text = "null";
            }


        }

        protected void chkAssociadoMae_CheckedChanged(object sender, EventArgs e)
        {
            if (chkAssociadoMae.Checked == true)
            {
                associada = "Sim";
                lblMatriculaMae.Visible = true;
                txtMatriculaMae.Visible = true;
                txtMatriculaMae.Text = String.Empty;
            }
            else
            {
                associada = "Não";
                txtMatriculaMae.Text = "null";
                lblMatriculaMae.Visible = false;
                txtMatriculaMae.Visible = false;
            }
        }

        
        
    }
}