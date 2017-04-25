using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Security.Cryptography;

namespace WindowsFormsApplication1
{
    public partial class nhanvien : UserControl
    {
        function func = new function();
        public nhanvien()
        {
            InitializeComponent();
        }

        private void nhanvien_Load(object sender, EventArgs e)
        {
            load();
        }

        private void load()
        {
            string sql = "select nv_hoten, nv_ngaysinh,case when nv_gioitinh =1 then 'Nam' else 'Nữ' end as nv_gioitinh, nv_diachi, nv_dienthoai, nv_email, k_ten from nhanvien a, khoa b where a.k_id = b.k_id";
            DataTable data = func.getdata(sql);
            dataGridView1.DataSource = data;
            string sql2 = "select * from khoa ";
            DataTable data2 = func.getdata(sql2);
            foreach (DataRow row in data2.Rows)
            {
                txtkhoa.Items.Add(row["k_ten"]);
            }
        }
        private void dataGridView1_SelectionChanged(object sender, EventArgs e)
        {

        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            txtemail.Text = dataGridView1.SelectedRows[0].Cells["data_email"].Value.ToString();
            txthoten.Text = dataGridView1.SelectedRows[0].Cells["data_hoten"].Value.ToString();
            txtgioitinh.Text = dataGridView1.SelectedRows[0].Cells["data_gioitinh"].Value.ToString();
            txtngaysinh.Text = dataGridView1.SelectedRows[0].Cells["data_ngaysinh"].Value.ToString();
            txtsdt.Text = dataGridView1.SelectedRows[0].Cells["data_sdt"].Value.ToString();
            txtdiachi.Text = dataGridView1.SelectedRows[0].Cells["data_diachi"].Value.ToString();
            txtkhoa.Text = dataGridView1.SelectedRows[0].Cells["data_khoa"].Value.ToString();
        }

        private void dataGridView1_ColumnStateChanged(object sender, DataGridViewColumnStateChangedEventArgs e)
        {
        }

        private void button2_Click(object sender, EventArgs e)
        {
            string email = txtemail.Text;
            string hoten = txthoten.Text;
            int gioitinh = (txtgioitinh.Text == "Nam") ? 1 : 0;
            string ngaysinh = txtngaysinh.Value.ToString();
            string sdt = txtsdt.Text;
            string diachi = txtdiachi.Text;
            string khoa = txtkhoa.Text;
            string sql = "select * from khoa where k_ten ='" + khoa+ "'";
            DataTable data = func.getdata(sql);
            int id_khoa =0;
            foreach (DataRow row in data.Rows)
            {
                id_khoa = Convert.ToInt32(row["k_id"]);
            }
            sql = "update nhanvien set nv_hoten = '"+hoten+"',nv_gioitinh = "+gioitinh+", nv_diachi ='"+diachi+"', nv_dienthoai = '"+sdt+"', k_id ="+id_khoa+" where nv_tentaikhoan ='"+email+"'";
            func.setdata(sql);
            load();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            txtemail.Text = "";
            txtmatkhau.Text = "";
            txtmatkhau2.Text = "";
            txthoten.Text = "";
            txtgioitinh.Text = "";
            txtdiachi.Text = "";
            txtsdt.Text = "";
            txtngaysinh.Text = "";
            txtemail.Enabled = true;
            dataGridView1.Enabled = false;
            btnChange.Enabled = true;
        }

        private void btnChange_Click(object sender, EventArgs e)
        {
            string email = txtemail.Text;
            string matkhau = txtmatkhau.Text;
            string matkhau2 = txtmatkhau2.Text;
            string hoten = txthoten.Text;
            int gioitinh = (txtgioitinh.Text == "Nam") ? 1 : 0;
            string ngaysinh = txtngaysinh.Value.ToString();
            string sdt = txtsdt.Text;
            string diachi = txtdiachi.Text;
            string khoa = txtkhoa.Text;
            string sql = "select * from khoa where k_ten ='" + khoa + "'";
            DataTable data = func.getdata(sql);
            int id_khoa = 0;
            foreach (DataRow row in data.Rows)
            {
                id_khoa = Convert.ToInt32(row["k_id"]);
            }
            if(matkhau != matkhau2)
            {
                MessageBox.Show("Mật khẩu không trùng khớp","Lỗi");
            }
            else
            {
                sql = "insert into nhanvien  (nv_hoten, nv_gioitinh,nv_diachi,nv_dienthoai,nv_tentaikhoan,nv_email,nv_matkhau,k_id) values ('" + hoten + "'," + gioitinh + ", '" + diachi + "','" + sdt + "','" + email + "','" + email + "','" + mahoa(matkhau2) + "'," + id_khoa + ")";
                func.setdata(sql);
                load();
                txtemail.Enabled = false;
                dataGridView1.Enabled = true;
                btnChange.Enabled = false;
            }
        }


        private void button3_Click(object sender, EventArgs e)
        {
            DialogResult check = MessageBox.Show("Bạn muốn xóa?", "Thông báo", MessageBoxButtons.YesNo);
            if (check == DialogResult.Yes)
            {
                string email = txtemail.Text;
                string sql = "delete from nhanvien where nv_tentaikhoan ='" + email + "'";
                func.setdata(sql);
                MessageBox.Show("Đã xoá", "Thông báo");
                load();
            }
        }

        public String mahoa(String str)
        {
            MD5CryptoServiceProvider md5 = new MD5CryptoServiceProvider();

            byte[] bHash = md5.ComputeHash(Encoding.UTF8.GetBytes(str));

            StringBuilder sbHash = new StringBuilder();

            foreach (byte b in bHash)
            {

                sbHash.Append(String.Format("{0:x2}", b));

            }

            return sbHash.ToString();
        }

    }
}
