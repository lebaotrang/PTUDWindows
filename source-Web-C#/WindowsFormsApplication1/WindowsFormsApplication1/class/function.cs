using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data;
using MySql.Data.MySqlClient;
using System.Data;

namespace WindowsFormsApplication1
{
    class function 
    {
        MySqlConnection con = new MySqlConnection("server=localhost; user=root;database=quanlydaotao;charset=utf8;");
        MySqlDataAdapter da;
        MySqlCommand cm;
        public DataTable getdata(String sql)
        {
            da = new MySqlDataAdapter(sql, con);
            DataTable dt = new DataTable();
            da.Fill(dt);
            return dt;
        }

        public void setdata(String sql)
        {
            con.Open();
            cm = new MySqlCommand(sql, con);
            cm.ExecuteNonQuery();
            con.Close();

        }

    }
}
