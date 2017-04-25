namespace WindowsFormsApplication1
{
    partial class index
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            this.lblUserOnline = new System.Windows.Forms.ToolStripLabel();
            this.btnNhanVien = new System.Windows.Forms.ToolStripMenuItem();
            this.btnQuanLy = new System.Windows.Forms.ToolStripMenuItem();
            this.btndaotao = new System.Windows.Forms.ToolStripMenuItem();
            this.btnmonhoc = new System.Windows.Forms.ToolStripMenuItem();
            this.btnsinhvien = new System.Windows.Forms.ToolStripMenuItem();
            this.btntrangthaisinhvien = new System.Windows.Forms.ToolStripMenuItem();
            this.btnsinhvienketqua = new System.Windows.Forms.ToolStripMenuItem();
            this.btnThongKe = new System.Windows.Forms.ToolStripMenuItem();
            this.btntimkiemmonhoc = new System.Windows.Forms.ToolStripMenuItem();
            this.btntimkiemdaotao = new System.Windows.Forms.ToolStripMenuItem();
            this.mnTroGiup = new System.Windows.Forms.ToolStripMenuItem();
            this.label2 = new System.Windows.Forms.Label();
            this.lblTimeNow = new System.Windows.Forms.ToolStripLabel();
            this.panel1 = new System.Windows.Forms.Panel();
            this.tabControl1 = new System.Windows.Forms.TabControl();
            this.panel2 = new System.Windows.Forms.Panel();
            this.toolStrip2 = new System.Windows.Forms.ToolStrip();
            this.lb_name = new System.Windows.Forms.ToolStripLabel();
            this.menuStrip2 = new System.Windows.Forms.MenuStrip();
            this.toolStripMenuItem1 = new System.Windows.Forms.ToolStripMenuItem();
            this.btndoimatkhau = new System.Windows.Forms.ToolStripMenuItem();
            this.toolStripMenuItem2 = new System.Windows.Forms.ToolStripSeparator();
            this.btnthemtaikhoan = new System.Windows.Forms.ToolStripMenuItem();
            this.btnDangXuat = new System.Windows.Forms.ToolStripMenuItem();
            this.thốngKêToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.btnthongkebangtotnghiep = new System.Windows.Forms.ToolStripMenuItem();
            this.btnthongkemonhoc = new System.Windows.Forms.ToolStripMenuItem();
            this.btnthongkesinhvien = new System.Windows.Forms.ToolStripMenuItem();
            this.btnthongkeketqua = new System.Windows.Forms.ToolStripMenuItem();
            this.timer1 = new System.Windows.Forms.Timer(this.components);
            this.panel2.SuspendLayout();
            this.toolStrip2.SuspendLayout();
            this.menuStrip2.SuspendLayout();
            this.SuspendLayout();
            // 
            // lblUserOnline
            // 
            this.lblUserOnline.Name = "lblUserOnline";
            this.lblUserOnline.Size = new System.Drawing.Size(61, 22);
            this.lblUserOnline.Text = "Chào Bạn:";
            // 
            // btnNhanVien
            // 
            this.btnNhanVien.Enabled = false;
            this.btnNhanVien.Name = "btnNhanVien";
            this.btnNhanVien.Size = new System.Drawing.Size(129, 22);
            this.btnNhanVien.Text = "Nhân Viên";
            this.btnNhanVien.Click += new System.EventHandler(this.btnNhanVien_Click);
            // 
            // btnQuanLy
            // 
            this.btnQuanLy.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.btnNhanVien,
            this.btndaotao,
            this.btnmonhoc,
            this.btnsinhvien});
            this.btnQuanLy.Name = "btnQuanLy";
            this.btnQuanLy.Size = new System.Drawing.Size(62, 20);
            this.btnQuanLy.Text = "Quản Lý";
            // 
            // btndaotao
            // 
            this.btndaotao.Enabled = false;
            this.btndaotao.Name = "btndaotao";
            this.btndaotao.Size = new System.Drawing.Size(129, 22);
            this.btndaotao.Text = "Đào Tạo";
            this.btndaotao.Click += new System.EventHandler(this.btnPhongBan_Click);
            // 
            // btnmonhoc
            // 
            this.btnmonhoc.Enabled = false;
            this.btnmonhoc.Name = "btnmonhoc";
            this.btnmonhoc.Size = new System.Drawing.Size(129, 22);
            this.btnmonhoc.Text = "Môn Học";
            this.btnmonhoc.Click += new System.EventHandler(this.btnmonhoc_Click);
            // 
            // btnsinhvien
            // 
            this.btnsinhvien.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.btntrangthaisinhvien,
            this.btnsinhvienketqua});
            this.btnsinhvien.Enabled = false;
            this.btnsinhvien.Name = "btnsinhvien";
            this.btnsinhvien.Size = new System.Drawing.Size(129, 22);
            this.btnsinhvien.Text = "Sinh Viên";
            // 
            // btntrangthaisinhvien
            // 
            this.btntrangthaisinhvien.Enabled = false;
            this.btntrangthaisinhvien.Name = "btntrangthaisinhvien";
            this.btntrangthaisinhvien.Size = new System.Drawing.Size(130, 22);
            this.btntrangthaisinhvien.Text = "Trạng Thái";
            this.btntrangthaisinhvien.Click += new System.EventHandler(this.trạngTháiToolStripMenuItem_Click);
            // 
            // btnsinhvienketqua
            // 
            this.btnsinhvienketqua.Enabled = false;
            this.btnsinhvienketqua.Name = "btnsinhvienketqua";
            this.btnsinhvienketqua.Size = new System.Drawing.Size(130, 22);
            this.btnsinhvienketqua.Text = "Kết Quả";
            this.btnsinhvienketqua.Click += new System.EventHandler(this.btnsinhvienketqua_Click);
            // 
            // btnThongKe
            // 
            this.btnThongKe.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.btntimkiemmonhoc,
            this.btntimkiemdaotao});
            this.btnThongKe.Name = "btnThongKe";
            this.btnThongKe.Size = new System.Drawing.Size(70, 20);
            this.btnThongKe.Text = "Tìm Kiếm";
            // 
            // btntimkiemmonhoc
            // 
            this.btntimkiemmonhoc.Enabled = false;
            this.btntimkiemmonhoc.Name = "btntimkiemmonhoc";
            this.btntimkiemmonhoc.Size = new System.Drawing.Size(124, 22);
            this.btntimkiemmonhoc.Text = "Môn Học";
            this.btntimkiemmonhoc.Click += new System.EventHandler(this.btntimkiemmonhoc_Click);
            // 
            // btntimkiemdaotao
            // 
            this.btntimkiemdaotao.Enabled = false;
            this.btntimkiemdaotao.Name = "btntimkiemdaotao";
            this.btntimkiemdaotao.Size = new System.Drawing.Size(124, 22);
            this.btntimkiemdaotao.Text = "Đào Tạo";
            this.btntimkiemdaotao.Click += new System.EventHandler(this.btntimkiemdaotao_Click);
            // 
            // mnTroGiup
            // 
            this.mnTroGiup.Name = "mnTroGiup";
            this.mnTroGiup.Size = new System.Drawing.Size(64, 20);
            this.mnTroGiup.Text = "Trợ Giúp";
            // 
            // label2
            // 
            this.label2.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(920, 5);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(0, 13);
            this.label2.TabIndex = 34;
            // 
            // lblTimeNow
            // 
            this.lblTimeNow.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right;
            this.lblTimeNow.Name = "lblTimeNow";
            this.lblTimeNow.Size = new System.Drawing.Size(0, 22);
            // 
            // panel1
            // 
            this.panel1.Dock = System.Windows.Forms.DockStyle.Top;
            this.panel1.Location = new System.Drawing.Point(0, 24);
            this.panel1.Name = "panel1";
            this.panel1.Padding = new System.Windows.Forms.Padding(5, 0, 0, 0);
            this.panel1.Size = new System.Drawing.Size(984, 500);
            this.panel1.TabIndex = 38;
            this.panel1.Paint += new System.Windows.Forms.PaintEventHandler(this.panel1_Paint);
            // 
            // tabControl1
            // 
            this.tabControl1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tabControl1.DrawMode = System.Windows.Forms.TabDrawMode.OwnerDrawFixed;
            this.tabControl1.Location = new System.Drawing.Point(0, 0);
            this.tabControl1.Name = "tabControl1";
            this.tabControl1.SelectedIndex = 0;
            this.tabControl1.Size = new System.Drawing.Size(984, 412);
            this.tabControl1.TabIndex = 0;
            // 
            // panel2
            // 
            this.panel2.Controls.Add(this.tabControl1);
            this.panel2.Dock = System.Windows.Forms.DockStyle.Fill;
            this.panel2.Location = new System.Drawing.Point(0, 24);
            this.panel2.Name = "panel2";
            this.panel2.Size = new System.Drawing.Size(984, 412);
            this.panel2.TabIndex = 39;
            // 
            // toolStrip2
            // 
            this.toolStrip2.BackColor = System.Drawing.SystemColors.Control;
            this.toolStrip2.Dock = System.Windows.Forms.DockStyle.Bottom;
            this.toolStrip2.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.lblUserOnline,
            this.lblTimeNow,
            this.lb_name});
            this.toolStrip2.Location = new System.Drawing.Point(0, 436);
            this.toolStrip2.Name = "toolStrip2";
            this.toolStrip2.Size = new System.Drawing.Size(984, 25);
            this.toolStrip2.TabIndex = 37;
            this.toolStrip2.Text = "toolStrip2";
            // 
            // lb_name
            // 
            this.lb_name.Name = "lb_name";
            this.lb_name.Size = new System.Drawing.Size(86, 22);
            this.lb_name.Text = "toolStripLabel1";
            // 
            // menuStrip2
            // 
            this.menuStrip2.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.toolStripMenuItem1,
            this.btnQuanLy,
            this.btnThongKe,
            this.thốngKêToolStripMenuItem,
            this.mnTroGiup});
            this.menuStrip2.Location = new System.Drawing.Point(0, 0);
            this.menuStrip2.Name = "menuStrip2";
            this.menuStrip2.Size = new System.Drawing.Size(984, 24);
            this.menuStrip2.TabIndex = 36;
            this.menuStrip2.Text = "menuStrip1";
            this.menuStrip2.ItemClicked += new System.Windows.Forms.ToolStripItemClickedEventHandler(this.menuStrip2_ItemClicked);
            // 
            // toolStripMenuItem1
            // 
            this.toolStripMenuItem1.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.btndoimatkhau,
            this.toolStripMenuItem2,
            this.btnthemtaikhoan,
            this.btnDangXuat});
            this.toolStripMenuItem1.Name = "toolStripMenuItem1";
            this.toolStripMenuItem1.Size = new System.Drawing.Size(72, 20);
            this.toolStripMenuItem1.Text = "Hệ Thống";
            // 
            // btndoimatkhau
            // 
            this.btndoimatkhau.Name = "btndoimatkhau";
            this.btndoimatkhau.Size = new System.Drawing.Size(178, 22);
            this.btndoimatkhau.Text = "Đổi Mật Khẩu";
            this.btndoimatkhau.Click += new System.EventHandler(this.btndoimatkhau_Click_1);
            // 
            // toolStripMenuItem2
            // 
            this.toolStripMenuItem2.Name = "toolStripMenuItem2";
            this.toolStripMenuItem2.Size = new System.Drawing.Size(175, 6);
            // 
            // btnthemtaikhoan
            // 
            this.btnthemtaikhoan.Name = "btnthemtaikhoan";
            this.btnthemtaikhoan.Size = new System.Drawing.Size(178, 22);
            this.btnthemtaikhoan.Text = "Thông Tin Cá Nhân";
            this.btnthemtaikhoan.Click += new System.EventHandler(this.btnthemtaikhoan_Click);
            // 
            // btnDangXuat
            // 
            this.btnDangXuat.Name = "btnDangXuat";
            this.btnDangXuat.Size = new System.Drawing.Size(178, 22);
            this.btnDangXuat.Text = "Đăng Xuất";
            this.btnDangXuat.Click += new System.EventHandler(this.btnDangXuat_Click);
            // 
            // thốngKêToolStripMenuItem
            // 
            this.thốngKêToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.btnthongkebangtotnghiep,
            this.btnthongkemonhoc,
            this.btnthongkesinhvien,
            this.btnthongkeketqua});
            this.thốngKêToolStripMenuItem.Name = "thốngKêToolStripMenuItem";
            this.thốngKêToolStripMenuItem.Size = new System.Drawing.Size(70, 20);
            this.thốngKêToolStripMenuItem.Text = "Thống Kê";
            // 
            // btnthongkebangtotnghiep
            // 
            this.btnthongkebangtotnghiep.Enabled = false;
            this.btnthongkebangtotnghiep.Name = "btnthongkebangtotnghiep";
            this.btnthongkebangtotnghiep.Size = new System.Drawing.Size(164, 22);
            this.btnthongkebangtotnghiep.Text = "Bằng Tốt Nghiệp";
            this.btnthongkebangtotnghiep.Click += new System.EventHandler(this.btnthongkebangtotnghiep_Click);
            // 
            // btnthongkemonhoc
            // 
            this.btnthongkemonhoc.Enabled = false;
            this.btnthongkemonhoc.Name = "btnthongkemonhoc";
            this.btnthongkemonhoc.Size = new System.Drawing.Size(164, 22);
            this.btnthongkemonhoc.Text = "Môn Học";
            this.btnthongkemonhoc.Click += new System.EventHandler(this.btnthongkemonhoc_Click);
            // 
            // btnthongkesinhvien
            // 
            this.btnthongkesinhvien.Enabled = false;
            this.btnthongkesinhvien.Name = "btnthongkesinhvien";
            this.btnthongkesinhvien.Size = new System.Drawing.Size(164, 22);
            this.btnthongkesinhvien.Text = "Sinh Viên";
            this.btnthongkesinhvien.Click += new System.EventHandler(this.btnthongkesinhvien_Click);
            // 
            // btnthongkeketqua
            // 
            this.btnthongkeketqua.Enabled = false;
            this.btnthongkeketqua.Name = "btnthongkeketqua";
            this.btnthongkeketqua.Size = new System.Drawing.Size(164, 22);
            this.btnthongkeketqua.Text = "Kết Quả";
            this.btnthongkeketqua.Click += new System.EventHandler(this.btnthongkeketqua_Click);
            // 
            // timer1
            // 
            this.timer1.Enabled = true;
            this.timer1.Interval = 1000;
            // 
            // index
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.AutoSize = true;
            this.ClientSize = new System.Drawing.Size(984, 461);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.panel1);
            this.Controls.Add(this.panel2);
            this.Controls.Add(this.toolStrip2);
            this.Controls.Add(this.menuStrip2);
            this.Name = "index";
            this.Text = "index";
            this.Load += new System.EventHandler(this.index_Load);
            this.panel2.ResumeLayout(false);
            this.toolStrip2.ResumeLayout(false);
            this.toolStrip2.PerformLayout();
            this.menuStrip2.ResumeLayout(false);
            this.menuStrip2.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private System.Windows.Forms.ToolStripLabel lblUserOnline;
        private System.Windows.Forms.ToolStripMenuItem btnNhanVien;
        private System.Windows.Forms.ToolStripMenuItem btnQuanLy;
        private System.Windows.Forms.ToolStripMenuItem btndaotao;
        private System.Windows.Forms.ToolStripMenuItem btnsinhvien;
        private System.Windows.Forms.ToolStripMenuItem btnThongKe;
        private System.Windows.Forms.ToolStripMenuItem mnTroGiup;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.ToolStripLabel lblTimeNow;
        private System.Windows.Forms.TabControl tabControl1;
        private System.Windows.Forms.Panel panel2;
        private System.Windows.Forms.ToolStrip toolStrip2;
        private System.Windows.Forms.MenuStrip menuStrip2;
        private System.Windows.Forms.Timer timer1;
        private System.Windows.Forms.ToolStripMenuItem toolStripMenuItem1;
        private System.Windows.Forms.ToolStripSeparator toolStripMenuItem2;
        private System.Windows.Forms.ToolStripMenuItem btnDangXuat;
        private System.Windows.Forms.ToolStripMenuItem btnthemtaikhoan;
        private System.Windows.Forms.ToolStripLabel lb_name;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.ToolStripMenuItem btntrangthaisinhvien;
        private System.Windows.Forms.ToolStripMenuItem btnsinhvienketqua;
        private System.Windows.Forms.ToolStripMenuItem btntimkiemmonhoc;
        private System.Windows.Forms.ToolStripMenuItem btntimkiemdaotao;
        private System.Windows.Forms.ToolStripMenuItem thốngKêToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem btnthongkebangtotnghiep;
        private System.Windows.Forms.ToolStripMenuItem btnthongkemonhoc;
        private System.Windows.Forms.ToolStripMenuItem btnthongkesinhvien;
        private System.Windows.Forms.ToolStripMenuItem btnthongkeketqua;
        private System.Windows.Forms.ToolStripMenuItem btnmonhoc;
        private System.Windows.Forms.ToolStripMenuItem btndoimatkhau;
    }
}