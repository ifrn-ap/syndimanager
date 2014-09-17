using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using MySql.Data.MySqlClient;
using System.Data;

namespace SyndicateManager
{
    public partial class cadastro : System.Web.UI.Page
    {
        public String strConn = "server=localhost;userid=root;password=25255454;database=sindicato";
        public String associado = "Não";
        public String associada = "Não";

        
        public void LimparCampos()
        {
            foreach (Control ctrl in Page.Master.FindControl("cphConteudo").Controls)
            {
                if (ctrl.GetType() == typeof(TextBox) && ctrl.ID != "txtMatricula" && ctrl.ID != "txtDataAdmissao")
                {
                    ((TextBox)ctrl).Text = String.Empty;
                }

            }

            chkAssociadoMae.Checked = false;

            chkAssociadoPai.Checked = false;
            
        }

        public void setCampos()
        {
            MySqlConnection conn = new MySqlConnection(strConn);
            MySqlCommand command = new MySqlCommand("SELECT matricula FROM associado ORDER BY matricula DESC LIMIT 1", conn);
            MySqlDataAdapter bdAdapter = new MySqlDataAdapter(command);
            DataTable table = new DataTable();
            bdAdapter.Fill(table);

            int matricula = 0;

            if (table.Rows.Count > 0)
            {
                string recup = table.Rows[0]["matricula"].ToString();
                matricula = Convert.ToInt32(recup) + 1;

            }
            else
            {
                matricula = 1;
            }


            txtMatricula.Text = matricula.ToString();
            txtDataAdmissao.Text = DateTime.Now.ToShortDateString();
            if (chkAssociadoPai.Checked == false)
            {
                txtMatriculaPai.Text = "null";
            }
            if (chkAssociadoMae.Checked == false)
            {
                txtMatriculaMae.Text = "null";
            }

        }

        public void cadastrar(MySqlConnection conexao)
        {
            try
            {
                String pai_associado = associado;
                String mae_associada = associada;
                MySqlCommand comm1 = new MySqlCommand("INSERT INTO associado(matricula,nome,data_nascimento,cidade_id,estado_civil_id,escolaridade_id,cpf,rg,titulo_eleitor,registro_nascimento,livro,fis,pai,pai_associado,matricula_pai,mae,mae_associada,matricula_mae,local_trabalho,nirf,area_total,tipo_trabalho,area_trabalhada,cart_profissional,serie,data_admissao,data_pagamento) values(" + txtMatricula.Text + ",'" + txtNome.Text + "','" + txtDataNascimento.Text.Substring(6, 4) + "-" + txtDataNascimento.Text.Substring(3, 2) + "-" + txtDataNascimento.Text.Substring(0, 2) + "'," + ddlNaturalidade.SelectedValue + "," + ddlEstadoCivil.SelectedValue + "," + ddlEscolaridade.SelectedValue + ",'" + txtCPF.Text + "','" + txtRG.Text + "','" + txtTituloEleitor.Text + "','" + txtRegistroNascimento.Text + "','" + txtLivro.Text + "','" + txtFIs.Text + "','" + txtPai.Text + "','" + pai_associado + "'," + txtMatriculaPai.Text + ",'" + txtMae.Text + "','" + mae_associada + "'," + txtMatriculaMae.Text + ",'" + txtLocalTrabalho.Text + "','" + txtNifr.Text + "','" + txtTotalHA.Text + "','" + txtTipoTrabalho.Text + "','" + txtAreaTrabalhada.Text + "','" + txtCarteiraProfissional.Text + "','" + txtSerie.Text + "','" + txtDataAdmissao.Text.Substring(6, 4) + "-" + txtDataAdmissao.Text.Substring(3, 2) + "-" + txtDataAdmissao.Text.Substring(0, 2) + "','" + txtDataAdmissao.Text.Substring(6, 4) + "-" + txtDataAdmissao.Text.Substring(3, 2) + "-" + txtDataAdmissao.Text.Substring(0, 2) + "');", conexao);
                comm1.ExecuteNonQuery();
                comm1.Dispose();

                MySqlCommand comm2 = new MySqlCommand("INSERT INTO endereco(logradouro,numero,bairro,cidade_id) values('" + txtEndereco.Text + "','" + txtNumero.Text + "','" + txtBairro.Text + "'," + ddlMunicipios.SelectedValue + ");", conexao);
                comm2.ExecuteNonQuery();
                comm2.Dispose();

                ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Cadastrado com Sucesso!\");", true);
            }
            catch
            {
                ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Não foi possivel realizar o cadastro!\");", true);
            }

            
        }

        protected void Page_Load(object sender, EventArgs e)
        {
            setCampos();
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

        protected void btnLimpar_Click(object sender, EventArgs e)
        {
            LimparCampos();
        }

        protected void btnCadastrar_Click(object sender, EventArgs e)
        {
            foreach (Control ctlr in Page.Master.FindControl("cphConteudo").Controls)
            {
                if (txtNome.Text != String.Empty && txtDataNascimento.Text != String.Empty && txtNome.Text != String.Empty && txtLocalTrabalho.Text != String.Empty && txtNifr.Text != String.Empty && txtCPF.Text != String.Empty && txtRG.Text != String.Empty && txtTotalHA.Text != String.Empty && txtTipoTrabalho.Text != String.Empty && txtAreaTrabalhada.Text != String.Empty && txtRegistroNascimento.Text != String.Empty && txtEndereco.Text != String.Empty && txtBairro.Text != String.Empty && txtNumero.Text != String.Empty)
                {
                    MySqlConnection bdConn = new MySqlConnection(strConn);
                    MySqlCommand commVerifica = new MySqlCommand("SELECT matricula,titulo_eleitor,cpf,rg FROM associado WHERE matricula=" + txtMatricula.Text + " OR titulo_eleitor='" + txtTituloEleitor.Text + "' OR cpf='" + txtCPF.Text + "' OR rg='" + txtRG.Text + "';", bdConn);
                    bdConn.Open();

                    if (bdConn.State == ConnectionState.Open)
                    {
                        bool verifica = commVerifica.ExecuteReader().HasRows;
                        bdConn.Close();
                        if (verifica == false)
                        {
                            bdConn.Open();
                            if (chkAssociadoPai.Checked == true)
                            {
                                if (txtMatriculaPai.Text != String.Empty)
                                {
                                    MySqlCommand comm = new MySqlCommand("SELECT matricula FROM associado WHERE matricula=" + txtMatriculaPai.Text + ";", bdConn);
                                    bool verificaPai = comm.ExecuteReader().HasRows;
                                    bdConn.Close();
                                    if (verificaPai == true)
                                    {
                                        if (chkAssociadoMae.Checked == true)
                                        {
                                            if (txtMatriculaMae.Text != String.Empty)
                                            {
                                                bdConn.Open();
                                                MySqlCommand comm2 = new MySqlCommand("SELECT matricula FROM associado WHERE matricula=" + txtMatriculaMae.Text + ";", bdConn);
                                                bool verificaMae = comm2.ExecuteReader().HasRows;
                                                bdConn.Close();
                                                if (verificaMae == true)
                                                {
                                                    bdConn.Open();
                                                    cadastrar(bdConn);
                                                    LimparCampos();
                                                    setCampos();
                                                    commVerifica.Dispose();
                                                    comm.Dispose();
                                                    comm2.Dispose();
                                                    bdConn.Close();
                                                    bdConn.Dispose();
                                                }
                                                else
                                                {
                                                    ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Matricula da Mãe não econtrada!\");", true);
                                                }
                                            }
                                            else
                                            {
                                                ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Por favor, informe a matricula da mãe!\");", true);
                                            }
                                        }
                                        else
                                        {
                                            bdConn.Open();
                                            cadastrar(bdConn);
                                            LimparCampos();
                                            setCampos();
                                            commVerifica.Dispose();
                                            comm.Dispose();
                                            bdConn.Close();
                                            bdConn.Dispose();
                                        }
                                    }
                                    else
                                    {
                                        ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Matricula do Pai não encontrada!\");", true);
                                    }
                                }
                                else
                                {
                                    ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Por favor, informe a matricula do pai!\");", true);
                                }
                            }
                            else
                            {
                                bdConn.Close();
                                if (chkAssociadoMae.Checked == true)
                                {
                                    if (txtMatriculaMae.Text != String.Empty)
                                    {
                                        bdConn.Open();
                                        MySqlCommand comm = new MySqlCommand("SELECT matricula FROM associado WHERE matricula=" + txtMatriculaMae.Text + ";", bdConn);
                                        bool verificaMae = comm.ExecuteReader().HasRows;
                                        bdConn.Close();
                                        if (verificaMae == true)
                                        {
                                            bdConn.Open();
                                            cadastrar(bdConn);
                                            LimparCampos();
                                            setCampos();
                                            commVerifica.Dispose();
                                            comm.Dispose();
                                            bdConn.Close();
                                            bdConn.Dispose();
                                        }
                                        else
                                        {
                                            ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Matricula da Mãe não econtrada!\");", true);
                                        }
                                    }
                                    else
                                    {
                                        ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Por favor, informe a matricula da mãe!\");", true);
                                    }
                                }
                                else
                                {
                                    bdConn.Open();
                                    cadastrar(bdConn);
                                    LimparCampos();
                                    setCampos();
                                    commVerifica.Dispose();
                                    bdConn.Close();
                                    bdConn.Dispose();
                                }
                            }
                        }
                        else
                        {
                            ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Esse associado já foi cadastrado!\");", true);
                        }
                    }

                }
                else
                {
                    ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Há campos em branco, preencha-os!\");", true);
                }
            }
        }

    }
}