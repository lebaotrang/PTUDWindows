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
    public partial class daotao : UserControl
    {
        function func = new function();
        public daotao()
        {
            InitializeComponent();
        }

        private void daotao_Load(object sender, EventArgs e)
        {
            load();
        }


        private void load()
        {
            string sql = "select dt_ma, dt_ten,dt_mota, k_ten from  daotao a, khoa b where a.k_id = b.k_id";
            DataTable data = func.getdata(sql);
            dataGridView1.DataSource = data;
            string sql2 = "select * from khoa ";
            DataTable data2 = func.getdata(sql2);
            foreach (DataRow row in data2.Rows)
            {
                cbkhoa.Items.Add(row["k_ten"]);
            }
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            txtmadt.Text = dataGridView1.SelectedRows[0].Cells["madaotao"].Value.ToString();
            txtmota.Text = dataGridView1.SelectedRows[0].Cells["mota"].Value.ToString();
            txtten.Text = dataGridView1.SelectedRows[0].Cells["ten"].Value.ToString();
            cbkhoa.Text = dataGridView1.SelectedRows[0].Cells["tenkhoa"].Value.ToString();
        }

        private void button2_Click(object sender, EventArgs e)
        {

            string ten = txtten.Text;
            string mota = txtmota.Text;
            string ma = txtmadt.Text;
            string khoa = cbkhoa.Text;
            string sql = "select * from khoa where k_ten ='" + khoa + "'";
            DataTable data = func.getdata(sql);
            int id_khoa = 0;
            foreach (DataRow row in data.Rows)
            {
                id_khoa = Convert.ToInt32(row["k_id"]);
            }
                sql = "update daotao set dt_ten = '" + ten + "', dt_mota ='" + mota+ "', k_id =" + id_khoa + " where dt_ma = '" + ma + "'";
                func.setdata(sql);

            MessageBox.Show("Chương trình đào tạo đã cập nhật", "Lỗi");
            load();
        }

        private void button1_Click(object sender, EventArgs e)
        {

            txtmadt.Text ="";
            txtten.Text ="";
            cbkhoa.Text ="";
            txtmota.Text ="";
            dataGridView1.Enabled = false;
            btnChange.Enabled = true;

        }

        private void btnChange_Click(object sender, EventArgs e)
        {

            string ma = txtmadt.Text;
            string ten = txtten.Text;
            string khoa = cbkhoa.Text;
            string mota = txtmota.Text;
            string sql = "select * from khoa where k_ten ='" + khoa + "'";
            DataTable data = func.getdata(sql);
            int id_khoa = 0;
            foreach (DataRow row in data.Rows)
            {
                id_khoa = Convert.ToInt32(row["k_id"]);
            }
            sql = "select * from daotao where dt_ma ='" + ma + "'";
            DataTable data2 = func.getdata(sql);
            if (data2.Rows.Count > 0)
            {
                MessageBox.Show("Chương trình đào tạo này đã tồn tại", "Lỗi");
            }
            else
            {
                sql = "insert into daotao (dt_ma, dt_ten , dt_mota, dt_trangthai, k_id) values ('" + ma + "','" + ten + "','" + mota + "',1," + id_khoa + ")";
                func.setdata(sql);
                MessageBox.Show("Thêm thành công!", "Thành công");
                load();

                dataGridView1.Enabled = true;
                btnChange.Enabled = false;
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            DialogResult check =  MessageBox.Show("Bạn muốn xóa?", "Thông báo", MessageBoxButtons.YesNo);
            if(check == DialogResult.Yes)
            {
                string ma = txtmadt.Text;
                string sql = "delete from daotao where dt_ma = '" + ma + "'";
                func.setdata(sql);
                MessageBox.Show("Đã xoá","Thông báo");
                load();
            }
            
        }
    }
}
