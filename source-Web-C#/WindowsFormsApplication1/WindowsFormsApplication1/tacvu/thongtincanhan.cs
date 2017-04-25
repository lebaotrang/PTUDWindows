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
    public partial class thongtincanhan : UserControl
    {
        public int id;
        function func = new function();
        public thongtincanhan()
        {
            InitializeComponent();
        }

        private void thongtincanhan_Load(object sender, EventArgs e)
        {
            show_data();
        }

        private void NDongY_Click(object sender, EventArgs e)
        {
            string hoten = this.txthoten.Text;
            //var ngaysinh = this.txtmgaysinh.Value;
            string sdt = this.txtsdt.Text;
            int gioitinh =  (this.txtgioitinh.Text== "Nam")? 1 :0;
            string diachi = this.txtdiachi.Text;
            string email = this.txtemail.Text;
            string sql = "update nhanvien set nv_hoten = '" + hoten + "' , nv_gioitinh = " + gioitinh + ",";
            sql += " nv_dienthoai = '"+sdt+"', nv_email ='"+email+"', nv_diachi ='"+diachi+"' where nv_id ="+id;
            func.setdata(sql);
            MessageBox.Show("Cập nhật thành công!","Thành công");
            show_data();
        }
        public void show_data()
        {

            string sql = "select * from nhanvien where nv_id =" + id;
            DataTable data = func.getdata(sql);
            foreach (DataRow row in data.Rows)
            {
                this.txthoten.Text = row["nv_hoten"].ToString();
                this.txtsdt.Text = row["nv_dienthoai"].ToString();
                this.txtgioitinh.Text = (Convert.ToInt32(row["nv_gioitinh"]) == 1) ? "Nam" : "Nữ";
                this.txtdiachi.Text = row["nv_diachi"].ToString();
                this.txtemail.Text = row["nv_email"].ToString();
                this.txttaikhoan.Enabled = false;
                this.txttaikhoan.Text = row["nv_tentaikhoan"].ToString();
            }
        }
    }
}
