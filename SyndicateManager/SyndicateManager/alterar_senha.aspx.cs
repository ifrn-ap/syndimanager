using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using MySql.Data.MySqlClient;

namespace SyndicateManager
{
    public partial class alterar_senha : System.Web.UI.Page
    {

        public String strConn = "server=localhost;userid=root;password=25255454;database=sindicato";

        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void btnAlterarSenha_Click(object sender, EventArgs e)
        {
            if (txtSenhaAtual.Text != String.Empty && txtNovaSenha.Text != String.Empty && txtConfirmaSenha.Text != String.Empty)
            {
                String usuario = Session["usuario"].ToString();
                String senha = Session["senha"].ToString();
                MySqlConnection bdConn = new MySqlConnection(strConn);
                MySqlCommand comm = new MySqlCommand("SELECT * FROM usuario WHERE login='" + usuario + "' AND senha='"+ senha +"';", bdConn);

                bdConn.Open();

                

                
                if (txtSenhaAtual.Text == senha)
                {
                    if (txtNovaSenha.Text.ToString() == txtConfirmaSenha.Text.ToString())
                    {
                        

                        MySqlCommand comm2 = new MySqlCommand("UPDATE usuario SET senha='" + txtNovaSenha.Text + "';", bdConn);
                        comm2.ExecuteNonQuery();
                        ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Senha alterada com sucesso!\");", true);
                        comm.Dispose();
                        bdConn.Close();
                        bdConn.Dispose();

                       
                    }
                    else
                    {
                        ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Senhas não conferem!\");", true);
                    }

                }
                else
                {
                    ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Senha Atual Incorreta!\");", true);
                }
            }
            else
            {
                ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Preencha os campos!\");", true);
            }
            
        }

        
    }
}