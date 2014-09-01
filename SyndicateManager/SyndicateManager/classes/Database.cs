using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using MySql.Data.MySqlClient;

namespace SyndicateManager.classes
{
    public class Database
    {
        public void conexaoBD()
        {
            MySqlConnection bdConn = new MySqlConnection("Persist Security Info=false;server=localhost;database=sindicato;userid=root;pwd=25255454");

            try
            {
                bdConn.Open();
            }
            catch (System.Exception ex)
            {
            }

        }
    }
}