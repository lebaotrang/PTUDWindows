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
using WindowsFormsApplication1.tacvu;

namespace WindowsFormsApplication1.tacvu
{
    public partial class doimatkhau : UserControl
    {
        public int iduser;
        function func = new function();
        public doimatkhau()
        {
            InitializeComponent();
        }

        private void btnChange_Click(object sender, EventArgs e)
        {
            string matkhau = txtMatKhauCu.Text;
            string matkhaumoi2 = txtNhapLai.Text;
            string matkhaumoi = txtNhapLai.Text;
            string sql = "Select * from nhanvien where nv_matkhau ='" + mahoa(matkhau) + "' and nv_id =" + iduser ;
            DataTable data = func.getdata(sql);
            if(data.Rows.Count > 0)
            {
                if(matkhaumoi == matkhaumoi2 )
                {
                    sql = "update nhanvien set nv_matkhau ='"+mahoa(matkhaumoi2)+"' where nv_id = "+iduser;
                    func.setdata(sql);
                    MessageBox.Show("Đổi mật khẩu thành công", "Thành công");
                    
                }
                else
                {
                    MessageBox.Show("Mật khẩu mới không chính xác", "Lỗi");
                }
            }
            else
            {
                MessageBox.Show("Mật khẩu không chính xác","Lỗi");
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
