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
    public partial class thongkeketqua : UserControl
    {
        function func = new function();
        public thongkeketqua()
        {
            InitializeComponent();
        }

        private void thongkeketqua_Load(object sender, EventArgs e)
        {
            string sql = "select distinct dt_ten from daotao ";
            DataTable data = func.getdata(sql);
            foreach (DataRow row in data.Rows)
            {
                cbdaotao.Items.Add(row["dt_ten"]);
            }
        }

        private void cbdaotao_SelectedIndexChanged(object sender, EventArgs e)
        {

            string sql = "select dt_id from daotao where dt_ten ='" + cbdaotao.SelectedItem + "'";
            int id = 0;
            DataTable data = func.getdata(sql);
            foreach (DataRow row in data.Rows)
            {
                id = Convert.ToInt32(row["dt_id"]);
            }
            sql = "select distinct sv_hoten from sinhvien a, dangky b where a.sv_id = b.sv_id and b.dt_id =" + id;
            data = func.getdata(sql);
            cbmonhoc.Items.Clear();
            foreach (DataRow row in data.Rows)
            {
                cbmonhoc.Items.Add(row["sv_hoten"]);
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {

            string sql = "select sv_id from sinhvien where sv_hoten ='" + cbmonhoc.SelectedItem + "'";
            int id = 0;
            DataTable data = func.getdata(sql);
            foreach (DataRow row in data.Rows)
            {
                id = Convert.ToInt32(row["sv_id"]);
            }
            sql = "select sv_hoten , case when sv_gioitinh =1 then 'Nam' else 'Nữ' end as sv_gioitinh , c.mh_ten,c.mh_tinchi,b.hocky,b.nienkhoa,d.kq_diemlan1,d.kq_diemlan2,d.kq_trungbinh,d.kq_tichluy from sinhvien a,  hockynienkhoa b, monhoc c, ketqua d, hknk_mon e where a.sv_id = d.sv_id and c.mh_id = d.m_id and c.mh_id = e.m_id and e.hknk_id = b.hknk_id and a.sv_id =" + id;
            data = func.getdata(sql);
            reportViewer1.LocalReport.ReportEmbeddedResource = "WindowsFormsApplication1.tacvu.thongkeketqua.rdlc";
            reportViewer1.LocalReport.DataSources.Add(new ReportDataSource("DataSet1", data));
            reportViewer1.RefreshReport();
        }
    }
}
