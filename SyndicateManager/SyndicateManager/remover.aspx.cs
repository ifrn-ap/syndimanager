using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using MySql.Data.MySqlClient;

namespace SyndicateManager
{
    public partial class remover : System.Web.UI.Page
    {
        public String strConn = "server=localhost;userid=root;password=25255454;database=sindicato";
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void ibtnPesquisar_Click(object sender, ImageClickEventArgs e)
        {
            if (txtMatricula.Text != String.Empty)
            {
                MySqlConnection bdConn = new MySqlConnection(strConn);
                MySqlCommand comm = new MySqlCommand("SELECT matricula FROM associado WHERE matricula=" + txtMatricula.Text + ";", bdConn);

                bdConn.Open();

                bool verifica = comm.ExecuteReader().HasRows;
                if (verifica)
                {
                    Session["matricula"] = txtMatricula.Text;
                    Response.Redirect("remover_associado.aspx");
                    comm.Dispose();
                    bdConn.Close();
                    bdConn.Dispose();

                }
                else
                {
                    ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Associado não encontrado!\");", true);
                }
            }
            else
            {
                ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Preencha o campo da matrícula!\");", true);
            }
        }
    }
}