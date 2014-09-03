using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Text;
using System.Web.UI;
using System.Web.UI.WebControls;
using SyndicateManager.classes;

namespace SyndicateManager.paginas
{
    public partial class WebForm1 : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void btnLimpar_Click(object sender, EventArgs e)
        {
            txtMatricula.Text = "";
            txtSenha.Text = "";
            Response.Write("Hey Limpou");
        }

        protected void btnLogar_Click(object sender, EventArgs e)
        {
            
        }

    }
}