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

namespace WindowsFormsApplication1
{
    public partial class thongketotnghiep : UserControl
    {
        function func = new function();
        public thongketotnghiep()
        {
            InitializeComponent();
        }

        private void thongketotnghiep_Load(object sender, EventArgs e)
        {
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string sql = "select SUM(kq_tichluy) as tichluy, a.sv_hoten, case when a.sv_gioitinh =1 then 'Nam' else 'Nữ' end as sv_gioitinh,a.sv_ngaysinh, a.sv_diachi from sinhvien a, ketqua b where a.sv_id = b.sv_id GROUP by  a.sv_hoten,a.sv_gioitinh,a.sv_ngaysinh, a.sv_diachi HAVING tichluy >2";
            DataTable data = func.getdata(sql);
            reportViewer1.LocalReport.ReportEmbeddedResource = "WindowsFormsApplication1.bangtotnghiep.rdlc";
            reportViewer1.LocalReport.DataSources.Add(new ReportDataSource("DataSet1", data));
            reportViewer1.RefreshReport();

        }
    }
}
