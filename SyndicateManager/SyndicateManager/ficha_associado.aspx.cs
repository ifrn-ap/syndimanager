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
    public partial class ficha_associado : System.Web.UI.Page
    {
        public void setSituacao()
        {
            DateTime data_pagamento = DateTime.Parse(lblDataUltimoPagamentoResposta.Text);
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
            String strConn = "server=localhost;userid=root;password=25255454;database=sindicato";
            String matricula = Session["matricula"].ToString();
            MySqlConnection bdConn = new MySqlConnection(strConn);
            MySqlCommand comm = new MySqlCommand("SELECT * FROM associado WHERE matricula=" + matricula + ";", bdConn);
            MySqlDataAdapter bdAdapter = new MySqlDataAdapter(comm);
            DataTable DT = new DataTable();

            bdAdapter.Fill(DT);

            lblMatriculaResposta.Text = DT.Rows[0]["matricula"].ToString();
            lblDataAdmissaoResposta.Text = DT.Rows[0]["data_admissao"].ToString().Substring(0,10);
            lblDataUltimoPagamentoResposta.Text = DT.Rows[0]["data_pagamento"].ToString().Substring(0, 10);
            lblNomeResposta.Text = DT.Rows[0]["nome"].ToString();
            lblDataNascimentoResposta.Text = DT.Rows[0]["data_nascimento"].ToString().Substring(0, 10);
            lblCPFResposta.Text = DT.Rows[0]["cpf"].ToString();
            lblRGResposta.Text = DT.Rows[0]["rg"].ToString();
            lblTituloEleitorResposta.Text = DT.Rows[0]["titulo_eleitor"].ToString();
            lblRegistroNascimentoResposta.Text = DT.Rows[0]["registro_nascimento"].ToString();
            lblLivroResposta.Text = DT.Rows[0]["livro"].ToString();
            lblFIsResposta.Text = DT.Rows[0]["Fis"].ToString();
            lblPaiResposta.Text = DT.Rows[0]["pai"].ToString();
            lblMaeResposta.Text = DT.Rows[0]["mae"].ToString();
            lblAssociadoResposta.Text = DT.Rows[0]["pai_associado"].ToString();
            lblAssociadaResposta.Text = DT.Rows[0]["mae_associada"].ToString();
            lblMatriculaPaiResposta.Text = DT.Rows[0]["matricula_pai"].ToString();
            lblMatriculaMaeResposta.Text = DT.Rows[0]["matricula_mae"].ToString();
            lblLocalTrabalhoResposta.Text = DT.Rows[0]["local_trabalho"].ToString();
            lblNirfResposta.Text = DT.Rows[0]["nirf"].ToString();
            lblTotalHAResposta.Text = DT.Rows[0]["area_total"].ToString();
            lblTipoTrabalhoResposta.Text = DT.Rows[0]["tipo_trabalho"].ToString();
            lblAreaTrabalhadaReposta.Text = DT.Rows[0]["area_trabalhada"].ToString();
            lblCarteiraProfissionalResposta.Text = DT.Rows[0]["cart_profissional"].ToString();
            lblSerieResposta.Text = DT.Rows[0]["serie"].ToString();
            DT.Clear();
            comm.Dispose();
            bdAdapter.Dispose();


            MySqlCommand comm2 = new MySqlCommand("SELECT cidade,uf FROM associado AS ass, cidade AS cid WHERE ass.cidade_id = cid.id;", bdConn);
            MySqlDataAdapter bdAdapter2 = new MySqlDataAdapter(comm2);
            bdAdapter2.Fill(DT);            
            lblNaturalidadeResposta.Text = DT.Rows[0]["cidade"].ToString() +"-" + DT.Rows[0]["uf"].ToString();
            DT.Clear();
            comm2.Dispose();
            bdAdapter2.Dispose();

            MySqlCommand comm3 = new MySqlCommand("SELECT estado_civil FROM associado AS ass, estado_civil AS ec WHERE ass.estado_civil_id = ec.id;", bdConn);
            MySqlDataAdapter bdAdapter3 = new MySqlDataAdapter(comm3);
            bdAdapter3.Fill(DT);
            lblEstadoCivilResposta.Text = DT.Rows[0]["estado_civil"].ToString();
            DT.Clear();
            comm3.Dispose();
            bdAdapter3.Dispose();

            MySqlCommand comm4 = new MySqlCommand("SELECT escolaridade FROM associado AS ass, escolaridade AS esc WHERE ass.escolaridade_id = esc.id;", bdConn);
            MySqlDataAdapter bdAdapter4 = new MySqlDataAdapter(comm4);
            bdAdapter4.Fill(DT);
            lblEscolaridadeResposta.Text = DT.Rows[0]["escolaridade"].ToString();
            DT.Clear();
            comm4.Dispose();
            bdAdapter4.Dispose();

            MySqlCommand comm5 = new MySqlCommand("SELECT logradouro,bairro,numero,cidade,uf FROM associado AS ass, endereco AS end, cidade AS cid WHERE ass.endereco_id = end.id AND end.cidade_id = cid.id;", bdConn);
            MySqlDataAdapter bdAdapter5 = new MySqlDataAdapter(comm5);
            bdAdapter5.Fill(DT);
            lblEnderecoResposta.Text = DT.Rows[0]["logradouro"].ToString();
            lblBairroResposta.Text = DT.Rows[0]["bairro"].ToString();
            lblNumeroResposta.Text = DT.Rows[0]["numero"].ToString();
            lblMunicipioResposta.Text = DT.Rows[0]["cidade"].ToString() + "-" + DT.Rows[0]["uf"].ToString();
            DT.Clear();
            comm5.Dispose();
            bdAdapter5.Dispose();

            
            setSituacao();
        }

        protected void btnVoltar_Click(object sender, EventArgs e)
        {
            
            
        }
    }
}