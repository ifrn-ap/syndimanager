using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using SyndicateManager;
using MySql.Data.MySqlClient;

namespace SyndicateManager
{
    public partial class login : System.Web.UI.Page
    {


        public void limpar_Click()
        {
            txtMatricula.Text = String.Empty;
            txtSenha.Text = String.Empty;
            lblFalhou.Text = String.Empty;
        }

        protected void Page_Load(object sender, EventArgs e)
        {
            Session.Clear();
        }

        protected void btnLimpar_Click(object sender, EventArgs e)
        {
            limpar_Click();
        }

        protected void btnLogin_Click(object sender, EventArgs e)
        {
            if (txtMatricula.Text == string.Empty || txtSenha.Text == string.Empty)
            {
                lblFalhou.Text = "Há campos em branco, preencha-os!";
            }
            else
            {
                string login = txtMatricula.Text;
                string senha = txtSenha.Text;

                MySqlConnection Conexao = new MySqlConnection("server=localhost;database=sindicato;userid=root;pwd=25255454");
                MySqlCommand query = new MySqlCommand("SELECT login,senha FROM usuario WHERE BINARY login = '" + login + "' AND BINARY senha = '" + senha + "'", Conexao);
                Conexao.Open();                

                if (Conexao.State == System.Data.ConnectionState.Open)
                {
                    MySqlDataAdapter bdAdapter = new MySqlDataAdapter(query);
                    DataTable data = new DataTable();
                    bdAdapter.Fill(data);
                    query.ExecuteNonQuery();
                    bool validacao = query.ExecuteReader().HasRows;

                    if (validacao == true)
                    {

                        Session["usuario"] = data.Rows[0]["login"].ToString();
                        Session["senha"] = data.Rows[0]["senha"].ToString();
                        Server.Transfer("home.aspx");                 
                    }
                    else
                    {
                        lblFalhou.Text = "Nome e/ou Senha Incorreto(s)!";
                    }
                    
                    Conexao.Close();
                }
                else
                {
                    lblFalhou.Text = "Conexão com banco de dados falhou!";
                }
            }
        }
    }
}