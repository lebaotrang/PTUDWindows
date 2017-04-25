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
    public partial class trangthaisinhvien : UserControl
    {
        function func = new function();
        public trangthaisinhvien()
        {
            InitializeComponent();
        }

        private void trangthaisinhvien_Load(object sender, EventArgs e)
        {
            load();
        }

        private void load()
        {
            string sql = "select dk_id, sv_hoten, case when sv_gioitinh = 0 then 'Nam' else 'Nữ' end as sv_gioitinh, sv_dienthoai, dt_ten, dk_trangthai from sinhvien a , dangky b , daotao c where a.sv_id = b.sv_id and b.dt_id = c.dt_id";
            DataTable data = func.getdata(sql);
            dataGridView1.DataSource = data;
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            txthoten.Text = dataGridView1.SelectedRows[0].Cells["hoten"].Value.ToString();
            txtgioitinh.Text = dataGridView1.SelectedRows[0].Cells["gioitinhsv"].Value.ToString();
            txtsdt.Text = dataGridView1.SelectedRows[0].Cells["sdtsv"].Value.ToString();
            txtdaotao.Text = dataGridView1.SelectedRows[0].Cells["daotao"].Value.ToString();
            cbtrangthai.Text = dataGridView1.SelectedRows[0].Cells["trangthai"].Value.ToString();
        }

        private void NDongY_Click(object sender, EventArgs e)
        {

            DialogResult check = MessageBox.Show("Bạn muốn thay đổi?", "Thông báo", MessageBoxButtons.YesNo);
            if (check == DialogResult.Yes)
            {
                int id =Convert.ToInt32(dataGridView1.SelectedRows[0].Cells["iddk"].Value.ToString());
                string trangthai = cbtrangthai.Text;
                string sql = "update dangky set dk_trangthai ='"+trangthai+"' where dk_id = '" + id + "'";
                func.setdata(sql);
                MessageBox.Show("Đã xong", "Thông báo");
                load();
            }

        }
    }
}
