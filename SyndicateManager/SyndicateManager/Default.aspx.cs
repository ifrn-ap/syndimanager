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
    public partial class WebForm1 : System.Web.UI.Page
    {
        private MySqlConnection bdConn;
        private DataSet bdDataSet;
        private MySqlDataAdapter bdAdapter;

        void conexaoBD()
        {
            bdDataSet = new DataSet();
            bdConn = new MySqlConnection("Persist Security Info=false;server=localhost;database=sindicato;userid=root;pwd=25255454");

            try
            {
                bdConn.Open();
            }
            catch (System.Exception ex)
            {
                Label1.Text = ex.Message.ToString();
            }
        }

        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            conexaoBD();
            if (bdConn.State == ConnectionState.Open)
            {
                MySqlDataAdapter commS = new MySqlDataAdapter("INSERT INTO usuario(login,senha,id_acesso) VALUES('" + TextBox1.Text + "','" + TextBox2.Text + "',3)", bdConn);
                commS.Fill(bdDataSet, "usuario");              
                Label1.Text = "Cadastrado Com Sucesso!";
            }
        }
    }
}