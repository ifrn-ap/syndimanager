using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using MySql.Data.MySqlClient;

namespace SyndicateManager.Imagens
{
    public partial class remover_associado : System.Web.UI.Page
    {

        public void setSituacao(DateTime data)
        {
            DateTime data_pagamento = data;
            DateTime data_agora = DateTime.Now;
            Double dias = data_agora.Subtract(data_pagamento).Days;
            Int32 total_dias = Convert.ToInt32(dias);
            if (total_dias > 30)
            {
                lblSituacaoResposta.Text = "Inadimplente";
                lblSituacaoResposta.CssClass = "label_situacao_inadimplente";
            }
            else
            {
                lblSituacaoResposta.Text = "Em Dia";
                lblSituacaoResposta.CssClass = "label_situacao_em_dia";
            }
        }       

        protected void Page_Load(object sender, EventArgs e)
        {
            if (!IsPostBack)
            {
                String strConn = "server=localhost;userid=root;password=25255454;database=sindicato";
                String matricula = Session["matricula"].ToString();
                MySqlConnection bdConn = new MySqlConnection(strConn);
                MySqlCommand comm = new MySqlCommand("SELECT matricula,nome,data_admissao,data_pagamento FROM associado WHERE matricula=" + matricula + ";", bdConn);
                MySqlDataAdapter bdAdapter = new MySqlDataAdapter(comm);
                DataTable DT = new DataTable();
                bdConn.Open();
                bdAdapter.Fill(DT);

                lblMatriculaResposta.Text = DT.Rows[0]["matricula"].ToString();
                lblNomeResposta.Text = DT.Rows[0]["nome"].ToString();
                lblDataAdmissaoResposta.Text = DT.Rows[0]["data_admissao"].ToString().Substring(0, 10);
                DateTime data_pagamento = DateTime.Parse(DT.Rows[0]["data_pagamento"].ToString().Substring(0, 10));

                setSituacao(data_pagamento);
                comm.Dispose();
                bdAdapter.Dispose();
                bdConn.Close();
                bdConn.Dispose();
            }
        }

        protected void btnRemover_Click(object sender, EventArgs e)
        {
            String strConn = "server=localhost;userid=root;password=25255454;database=sindicato";
            MySqlConnection bdConn = new MySqlConnection(strConn);
            MySqlCommand comm = new MySqlCommand("DELETE FROM associado,endereco USING associado INNER JOIN endereco WHERE matricula=" + lblMatriculaResposta.Text + " AND associado.endereco_id = endereco.id;", bdConn);
            bdConn.Open();
            
            try
            {
                comm.ExecuteNonQuery();
                comm.Dispose();
                bdConn.Close();
                bdConn.Dispose();
                ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Associado removido com sucesso!\");", true);
                
            }
            catch
            {
                ScriptManager.RegisterStartupScript(this, GetType(), "ServerControlScript", "alert(\"Não foi possível remover o associado!\");", true);
            }

        }

           
    }
}