using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using WindowsFormsApplication1.tacvu;

namespace WindowsFormsApplication1
{
    public partial class index : Form
    {

        public String id ;
        public String hoten ;
        public int [] quyen;
        public index()
        {
            InitializeComponent();
        }

        public void getdata(string a, string b, int [] c)
        {
            this.id = a;
            this.hoten = b;
            this.quyen = c;

            foreach (int e in this.quyen)
            {
                if (e == 1)
                {
                    this.btnNhanVien.Enabled = true;
                }
                if (e == 2)
                {
                    this.btndaotao.Enabled = true;
                    this.btnmonhoc.Enabled = true;
                    this.btnsinhvien.Enabled = true;
                    this.btntrangthaisinhvien.Enabled = true;
                    this.btntimkiemmonhoc.Enabled = true;
                    this.btntimkiemdaotao.Enabled = true;

                    this.btnthongkebangtotnghiep.Enabled = true;
                    this.btnthongkeketqua.Enabled = true;
                }
                if (e == 3)
                {

                    this.btntimkiemmonhoc.Enabled = true;
                    this.btntimkiemdaotao.Enabled = true;
                    this.btnsinhvienketqua.Enabled = true;

                    this.btnthongkemonhoc.Enabled = true;
                    this.btnthongkesinhvien.Enabled = true;
                }
            }
            this.lb_name.Text = hoten;
        }
     

        private void index_Load(object sender, EventArgs e)
        {

            panel1.Controls.Clear();
            usertaikhoan user = new usertaikhoan();
            user.Dock = DockStyle.Fill;
            panel1.Controls.Add(user);
        }

        private void btnDangXuat_Click(object sender, EventArgs e)
        {
            DialogResult h = MessageBox.Show("Bạn có chắc muốn thoát không? ", "Error", MessageBoxButtons.OKCancel, MessageBoxIcon.Warning);
            if (h == DialogResult.OK)
            {
                login log = new login();
                log.Show();
                this.Close();
            }
        }

        private void btnthemtaikhoan_Click(object sender, EventArgs e)
        {
            panel1.Controls.Clear();
            thongtincanhan user = new thongtincanhan();
            user.id = Convert.ToInt32(id);
            user.Dock = DockStyle.Fill;
            panel1.Controls.Add(user);
        }

        private void btnNhanVien_Click(object sender, EventArgs e)
        {
            panel1.Controls.Clear();
            nhanvien user = new nhanvien();
            user.Dock = DockStyle.Fill;
            panel1.Controls.Add(user);
        }

        private void btndaotao_Click(object sender, EventArgs e)
        {
            panel1.Controls.Clear();
            daotao user = new daotao();
            user.Dock = DockStyle.Fill;
            panel1.Controls.Add(user);
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void menuStrip2_ItemClicked(object sender, ToolStripItemClickedEventArgs e)
        {

        }

        private void btnDoiMatKhau_Click(object sender, EventArgs e)
        {
            panel1.Controls.Clear();
            doimatkhau form = new doimatkhau();
            form.Dock = DockStyle.Fill;
            form.Show();
        }

        private void btnPhongBan_Click(object sender, EventArgs e)
        {
            panel1.Controls.Clear();
            daotao user = new daotao();
            user.Dock = DockStyle.Fill;
            panel1.Controls.Add(user);
        }

        private void trạngTháiToolStripMenuItem_Click(object sender, EventArgs e)
        {
            panel1.Controls.Clear();
            trangthaisinhvien form = new trangthaisinhvien();
            form.Dock = DockStyle.Fill;
            panel1.Controls.Add(form);
        }

        protected override void OnFormClosing(FormClosingEventArgs e)
        {
        }

        private void toolStripMenuItem4_Click(object sender, EventArgs e)
        {

        }

        private void btndoimatkhau_Click_1(object sender, EventArgs e)
        {
            panel1.Controls.Clear();
            doimatkhau form = new doimatkhau();
            form.iduser = Convert.ToInt32(id);
            form.Dock = DockStyle.Fill;
            panel1.Controls.Add(form);

        }

        private void btnmonhoc_Click(object sender, EventArgs e)
        {
            panel1.Controls.Clear();
            monhoc form = new monhoc();
            form.Dock = DockStyle.Fill;
            panel1.Controls.Add(form);
        }

        private void btnsinhvienketqua_Click(object sender, EventArgs e)
        {
            panel1.Controls.Clear();
            capnhatketqua form = new capnhatketqua();
            form.Dock = DockStyle.Fill;
            panel1.Controls.Add(form);
        }

        private void btntimkiemmonhoc_Click(object sender, EventArgs e)
        {
            panel1.Controls.Clear();
            ketqua form = new ketqua();
            form.Dock = DockStyle.Fill;
            panel1.Controls.Add(form);
        }

        private void btntimkiemdaotao_Click(object sender, EventArgs e)
        {

            panel1.Controls.Clear();
            timkiemctdt form = new timkiemctdt();
            form.Dock = DockStyle.Fill;
            panel1.Controls.Add(form);
        }

        private void btnthongkebangtotnghiep_Click(object sender, EventArgs e)
        {

            panel1.Controls.Clear();
            thongketotnghiep form = new thongketotnghiep();
            form.Dock = DockStyle.Fill;
            panel1.Controls.Add(form);
        }

        private void btnthongkemonhoc_Click(object sender, EventArgs e)
        {

            panel1.Controls.Clear();
            thongkemonhoc form = new thongkemonhoc();
            form.Dock = DockStyle.Fill;
            panel1.Controls.Add(form);
        }

        private void btnthongkesinhvien_Click(object sender, EventArgs e)
        {

            panel1.Controls.Clear();
            thongkesinhvien form = new thongkesinhvien();
            form.Dock = DockStyle.Fill;
            panel1.Controls.Add(form);
        }

        private void btnthongkeketqua_Click(object sender, EventArgs e)
        {

            panel1.Controls.Clear();
            thongkeketqua form = new thongkeketqua();
            form.Dock = DockStyle.Fill;
            panel1.Controls.Add(form);
        }
    }
}
