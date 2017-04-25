using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Security.Cryptography;


namespace WindowsFormsApplication1
{
    public partial class login : Form
    {
        function func = new function();
        public login()
        {
            InitializeComponent();
        }

        private void btnexit_Click(object sender, EventArgs e)
        {
            DialogResult h = MessageBox.Show("Bạn có chắc muốn thoát không? ", "Error", MessageBoxButtons.OKCancel, MessageBoxIcon.Warning);
            if (h == DialogResult.OK)
                Application.Exit();
        }

        private void btnlogin_Click(object sender, EventArgs e)
        {
            #region Nhan bien nguoi dung nhap
            txtusername.Focus();
            string username = txtusername.Text;
            string password = txtpassword.Text;
            #endregion

            #region Kiem tra gia tri nhap vao
            if (string.IsNullOrEmpty(username))
            {
                MessageBox.Show("Nhập tên đăng nhập!", "Cảnh báo", MessageBoxButtons.OKCancel, MessageBoxIcon.Warning);
                txtusername.Focus();
                return;
            }
            if (string.IsNullOrEmpty(password))
            {
                MessageBox.Show("Nhập mật khẩu!", "Cảnh báo", MessageBoxButtons.OKCancel, MessageBoxIcon.Warning);
                txtpassword.Focus();
                return;
            }
            #endregion

            #region Ket noi CSDL va truy van
            String  sql = "select * from nhanvien a, quyennhanvien b where  a.nv_id = b.nv_id and nv_tentaikhoan ='"+username+"' and nv_matkhau ='"+mahoa(password)+"'";
            String sql2 = "select * from nhanvien where nv_tentaikhoan ='" + username + "' and nv_matkhau ='" + mahoa(password) + "'";

            DataTable data = func.getdata(sql);
            DataTable data2 = func.getdata(sql2);
            if (data.Rows.Count >0)
            {
                int tongquyen = data.Rows.Count;
                int[] quyen = new int[tongquyen];
                int i = 0;
                foreach (DataRow row in data.Rows)
                {
                    quyen[i] = Convert.ToInt32(row["q_id"]);
                    i++;
                }
                foreach (DataRow row2 in data2.Rows)
                {
                    index index_ = new index();
                    index_.getdata(row2["nv_id"].ToString(),row2["nv_hoten"].ToString(),quyen);
                    
                    index_.Show();
                    this.Hide();
                }
            }
            else
            {
                MessageBox.Show("Đăng nhập thất bại!", "Error", MessageBoxButtons.OKCancel, MessageBoxIcon.Error);
            }
            #endregion

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
