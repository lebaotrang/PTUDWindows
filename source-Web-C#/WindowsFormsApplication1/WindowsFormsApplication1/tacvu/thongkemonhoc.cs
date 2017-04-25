using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Microsoft.Reporting.WinForms;
using System.Windows.Forms;

namespace WindowsFormsApplication1.tacvu
{
    public partial class thongkemonhoc : UserControl
    {
        function func = new function();
        public thongkemonhoc()
        {
            InitializeComponent();
        }

        private void thongkemonhoc_Load(object sender, EventArgs e)
        {
            string sql = "select distinct dt_ten from daotao";
            DataTable data = func.getdata(sql);
            foreach (DataRow row in data.Rows)
            {
                cbdaotao.Items.Add(row["dt_ten"]);
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string dt = cbdaotao.SelectedItem.ToString();
            string sql = "select dt_id from daotao where dt_ten ='" + dt + "'";
            DataTable data = func.getdata(sql);
            int id = 0;
            foreach(DataRow row in data.Rows)
            {
                id = Convert.ToInt32(row["dt_id"]);
            }
            MessageBox.Show(""+id);
            sql = "select * from monhoc a, hknk_mon b, hockynienkhoa c where a.mh_id = b.m_id and b.hknkm_id = c.hknk_id and dt_id = "+id;
            data = func.getdata(sql);
            reportViewer1.LocalReport.ReportEmbeddedResource = "WindowsFormsApplication1.tacvu.monhoc.rdlc";
            reportViewer1.LocalReport.DataSources.Add(new ReportDataSource("DataSet1", data));
            reportViewer1.RefreshReport();
        }

        private void cbdaotao_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void label4_Click(object sender, EventArgs e)
        {

        }
    }
}
