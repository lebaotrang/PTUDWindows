using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication1.tacvu
{
    public partial class timkiemctdt : UserControl
    {
        function func = new function();
        public timkiemctdt()
        {
            InitializeComponent();
        }

        

        private void textBox1_TextChanged(object sender, EventArgs e)
        {
            cbdaotao.Items.Clear();
            string ten = txtkey.Text;
            string sql = "select distinct dt_ten from daotao where dt_ten like '%" + ten + "%'";
            DataTable data = func.getdata(sql);
            foreach (DataRow row in data.Rows)
            {
                cbdaotao.Items.Add(row["dt_ten"]);
            }
        }

        private void cbdaotao_SelectedIndexChanged(object sender, EventArgs e)
        {
            string ten = cbdaotao.SelectedText;
            string sql = "select dt_ma,dt_ten,mh_ten,mh_tinchi from daotao a, monhoc b where a.dt_id = b.dt_id and dt_ten ='"+ten+"'";
            DataTable data = func.getdata(sql);
            dataGridView1.DataSource = data;
        }
    }
}
