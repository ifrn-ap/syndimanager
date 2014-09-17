using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using MySql.Data.MySqlClient;

namespace SyndicateManager.Css
{
    public partial class criar_conta : System.Web.UI.Page
    {
        public String strConn = "server=localhost;userid=root;password=25255454;database=sindicato";

        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void btnCriar_Click(object sender, EventArgs e)
        {
            if (txtLogin.Text != String.Empty && txtSenha.Text != String.Empty)
            {

                MySqlConnection bdConn = new MySqlConnection(strConn);
                MySqlCommand commVerifica = new MySqlCommand("SELECT * FROM usuario WHERE BINARY login ='" + txtLogin.Text + "';", bdConn);

                bdConn.Open();
                bool verifica = commVerifica.ExecuteReader().HasRows;


                bdConn.Close();
                if (verifica == false)
                {
                    bdConn.Open();
                    MySqlCommand commCriar = new MySqlCommand("INSERT INTO usuario(login, senha, id_acesso) values('" + txtLogin.Text + "','" + txtSenha.Text + "',3);", bdConn);
                    //try
                    //{
                        commCriar.ExecuteNonQuery();
                        ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Usuário criado com Sucesso!\");", true);
                    //}
                    //catch
                    //{
                    //
                    ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Não foi possivel cadastrar o usuário!\");", true);
                    //}

                    commCriar.Dispose();
                    bdConn.Close();
                    bdConn.Dispose();
                    txtLogin.Text = String.Empty;
                    txtSenha.Text = String.Empty;
                }

            }
            else
            {
                ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Há campos em branco, preencha-os!\");", true);
            }
        }
    }
}