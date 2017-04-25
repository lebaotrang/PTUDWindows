using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class usertaikhoan : UserControl
    {
        function func = new function();
        public usertaikhoan()
        {
            InitializeComponent();
        }

        private void UserControl1_Load(object sender, EventArgs e)
        {
            String sql ="select nv_hoten, case WHEN nv_gioitinh =0 then 'Nam' ELSE 'Nữ' END as nv_gioitinh ,nv_dienthoai,nv_diachi, nv_email, q_ten from nhanvien a, quyennhanvien b, quyen c where a.nv_id = b.nv_id and b.q_id = c.q_id";
            DataTable data = func.getdata(sql);
            this.dataGridView2.DataSource = data;
        }
        
    }
}
