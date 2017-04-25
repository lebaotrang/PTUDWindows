using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using Microsoft.Reporting.WinForms;


namespace WindowsFormsApplication1.tacvu
{
    public partial class thongkesinhvien : UserControl
    {
        function func = new function();
        public thongkesinhvien()
        {
            InitializeComponent();
        }

        private void thongkesinhvien_Load(object sender, EventArgs e)
        {
            string sql = "select distinct dt_ten from daotao ";
            DataTable data = func.getdata(sql);
            foreach(DataRow row in data.Rows)
            {
                cbdaotao.Items.Add(row["dt_ten"]);
            }
        }

        private void cbdaotao_SelectedIndexChanged(object sender, EventArgs e)
        {
            string sql = "select dt_id from daotao where dt_ten ='" + cbdaotao.SelectedItem + "'";
            int id = 0;
            DataTable data = func.getdata(sql);
            foreach(DataRow row in data.Rows)
            {
                id = Convert.ToInt32(row["dt_id"]);
            }
            sql = "select distinct mh_ten from monhoc where dt_id =" + id;
            data = func.getdata(sql);
            cbmonhoc.Items.Clear();
            foreach (DataRow row in data.Rows)
            {
                cbmonhoc.Items.Add(row["mh_ten"]);
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string sql = "select mh_id from monhoc where mh_ten ='" + cbmonhoc.SelectedItem + "'";
            int id = 0;
            DataTable data = func.getdata(sql);
            foreach (DataRow row in data.Rows)
            {
                id = Convert.ToInt32(row["mh_id"]);
            }
            sql = "select sv_hoten , sv_diachi, hocky, nienkhoa ,sv_ngaysinh , case when sv_gioitinh =1 then 'Nam' else 'Nữ' end as sv_gioitinh from sinhvien a, dangkymonhoc b, hockynienkhoa c where a.sv_id = b.sv_id and b.hknk_id = c.hknk_id and mh_id =" + id;
            data = func.getdata(sql);
            reportViewer1.LocalReport.ReportEmbeddedResource = "WindowsFormsApplication1.tacvu.thongkesinhvien.rdlc";
            reportViewer1.LocalReport.DataSources.Add(new ReportDataSource("DataSet1", data));
            reportViewer1.RefreshReport();
        }
    }
}
