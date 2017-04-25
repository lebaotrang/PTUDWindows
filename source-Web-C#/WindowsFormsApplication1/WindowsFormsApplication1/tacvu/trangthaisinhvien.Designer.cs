namespace WindowsFormsApplication1
{
    partial class trangthaisinhvien
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

        #region Component Designer generated code

        /// <summary> 
        /// Required method for Designer support - do not modify 
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.cbtrangthai = new System.Windows.Forms.ComboBox();
            this.NDongY = new System.Windows.Forms.Button();
            this.TieuDe = new System.Windows.Forms.Label();
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.txtsdt = new System.Windows.Forms.TextBox();
            this.txthoten = new System.Windows.Forms.TextBox();
            this.TaiKhoan = new System.Windows.Forms.Label();
            this.DiaChi = new System.Windows.Forms.Label();
            this.SDT = new System.Windows.Forms.Label();
            this.GioiTinh = new System.Windows.Forms.Label();
            this.txtgioitinh = new System.Windows.Forms.TextBox();
            this.txtdaotao = new System.Windows.Forms.TextBox();
            this.label1 = new System.Windows.Forms.Label();
            this.hoten = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.gioitinhsv = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.sdtsv = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.daotao = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.trangthai = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.iddk = new System.Windows.Forms.DataGridViewTextBoxColumn();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.SuspendLayout();
            // 
            // cbtrangthai
            // 
            this.cbtrangthai.FormattingEnabled = true;
            this.cbtrangthai.Items.AddRange(new object[] {
            "Có ý thích",
            "Đăng ký",
            "Tạm hoãn"});
            this.cbtrangthai.Location = new System.Drawing.Point(141, 274);
            this.cbtrangthai.Name = "cbtrangthai";
            this.cbtrangthai.Size = new System.Drawing.Size(90, 21);
            this.cbtrangthai.TabIndex = 79;
            this.cbtrangthai.Text = "Nam";
            // 
            // NDongY
            // 
            this.NDongY.Location = new System.Drawing.Point(482, 372);
            this.NDongY.Name = "NDongY";
            this.NDongY.Size = new System.Drawing.Size(75, 23);
            this.NDongY.TabIndex = 77;
            this.NDongY.Text = "Thay đổi";
            this.NDongY.UseVisualStyleBackColor = true;
            this.NDongY.Click += new System.EventHandler(this.NDongY_Click);
            // 
            // TieuDe
            // 
            this.TieuDe.AutoSize = true;
            this.TieuDe.Font = new System.Drawing.Font("Times New Roman", 30F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.TieuDe.Location = new System.Drawing.Point(328, 25);
            this.TieuDe.Name = "TieuDe";
            this.TieuDe.Size = new System.Drawing.Size(383, 45);
            this.TieuDe.TabIndex = 76;
            this.TieuDe.Text = "Trạng Thái Sinh Viên";
            // 
            // dataGridView1
            // 
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.hoten,
            this.gioitinhsv,
            this.sdtsv,
            this.daotao,
            this.trangthai,
            this.iddk});
            this.dataGridView1.Location = new System.Drawing.Point(311, 91);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dataGridView1.Size = new System.Drawing.Size(611, 229);
            this.dataGridView1.TabIndex = 75;
            this.dataGridView1.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dataGridView1_CellContentClick);
            // 
            // txtsdt
            // 
            this.txtsdt.Location = new System.Drawing.Point(141, 143);
            this.txtsdt.Name = "txtsdt";
            this.txtsdt.Size = new System.Drawing.Size(114, 20);
            this.txtsdt.TabIndex = 74;
            // 
            // txthoten
            // 
            this.txthoten.Location = new System.Drawing.Point(141, 91);
            this.txthoten.Name = "txthoten";
            this.txthoten.Size = new System.Drawing.Size(114, 20);
            this.txthoten.TabIndex = 73;
            // 
            // TaiKhoan
            // 
            this.TaiKhoan.AutoSize = true;
            this.TaiKhoan.Location = new System.Drawing.Point(62, 94);
            this.TaiKhoan.Name = "TaiKhoan";
            this.TaiKhoan.Size = new System.Drawing.Size(46, 13);
            this.TaiKhoan.TabIndex = 72;
            this.TaiKhoan.Text = "Họ Tên:";
            // 
            // DiaChi
            // 
            this.DiaChi.AutoSize = true;
            this.DiaChi.Location = new System.Drawing.Point(62, 277);
            this.DiaChi.Name = "DiaChi";
            this.DiaChi.Size = new System.Drawing.Size(59, 13);
            this.DiaChi.TabIndex = 71;
            this.DiaChi.Text = "Trạng Thái";
            // 
            // SDT
            // 
            this.SDT.AutoSize = true;
            this.SDT.Location = new System.Drawing.Point(62, 146);
            this.SDT.Name = "SDT";
            this.SDT.Size = new System.Drawing.Size(29, 13);
            this.SDT.TabIndex = 70;
            this.SDT.Text = "SĐT";
            // 
            // GioiTinh
            // 
            this.GioiTinh.AutoSize = true;
            this.GioiTinh.Location = new System.Drawing.Point(62, 121);
            this.GioiTinh.Name = "GioiTinh";
            this.GioiTinh.Size = new System.Drawing.Size(47, 13);
            this.GioiTinh.TabIndex = 69;
            this.GioiTinh.Text = "Giới tính";
            // 
            // txtgioitinh
            // 
            this.txtgioitinh.Location = new System.Drawing.Point(141, 118);
            this.txtgioitinh.Name = "txtgioitinh";
            this.txtgioitinh.Size = new System.Drawing.Size(114, 20);
            this.txtgioitinh.TabIndex = 80;
            // 
            // txtdaotao
            // 
            this.txtdaotao.Location = new System.Drawing.Point(141, 169);
            this.txtdaotao.Name = "txtdaotao";
            this.txtdaotao.Size = new System.Drawing.Size(114, 20);
            this.txtdaotao.TabIndex = 82;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(62, 172);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(49, 13);
            this.label1.TabIndex = 81;
            this.label1.Text = "Đào Tạo";
            // 
            // hoten
            // 
            this.hoten.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.hoten.DataPropertyName = "sv_hoten";
            this.hoten.HeaderText = "Họ Tên";
            this.hoten.Name = "hoten";
            this.hoten.ReadOnly = true;
            // 
            // gioitinhsv
            // 
            this.gioitinhsv.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.gioitinhsv.DataPropertyName = "sv_gioitinh";
            this.gioitinhsv.HeaderText = "Giới Tính";
            this.gioitinhsv.Name = "gioitinhsv";
            this.gioitinhsv.ReadOnly = true;
            // 
            // sdtsv
            // 
            this.sdtsv.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.sdtsv.DataPropertyName = "sv_dienthoai";
            this.sdtsv.HeaderText = "Điện Thoại";
            this.sdtsv.Name = "sdtsv";
            this.sdtsv.ReadOnly = true;
            // 
            // daotao
            // 
            this.daotao.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.daotao.DataPropertyName = "dt_ten";
            this.daotao.HeaderText = "Đào Tạo";
            this.daotao.Name = "daotao";
            this.daotao.ReadOnly = true;
            // 
            // trangthai
            // 
            this.trangthai.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.trangthai.DataPropertyName = "dk_trangthai";
            this.trangthai.HeaderText = "Trạng Thái";
            this.trangthai.Name = "trangthai";
            this.trangthai.ReadOnly = true;
            // 
            // iddk
            // 
            this.iddk.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.None;
            this.iddk.DataPropertyName = "dk_id";
            this.iddk.HeaderText = "";
            this.iddk.Name = "iddk";
            this.iddk.ReadOnly = true;
            // 
            // trangthaisinhvien
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.Controls.Add(this.txtdaotao);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.txtgioitinh);
            this.Controls.Add(this.cbtrangthai);
            this.Controls.Add(this.NDongY);
            this.Controls.Add(this.TieuDe);
            this.Controls.Add(this.dataGridView1);
            this.Controls.Add(this.txtsdt);
            this.Controls.Add(this.txthoten);
            this.Controls.Add(this.TaiKhoan);
            this.Controls.Add(this.DiaChi);
            this.Controls.Add(this.SDT);
            this.Controls.Add(this.GioiTinh);
            this.Name = "trangthaisinhvien";
            this.Size = new System.Drawing.Size(1000, 500);
            this.Load += new System.EventHandler(this.trangthaisinhvien_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.ComboBox cbtrangthai;
        private System.Windows.Forms.Button NDongY;
        private System.Windows.Forms.Label TieuDe;
        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.TextBox txtsdt;
        private System.Windows.Forms.TextBox txthoten;
        private System.Windows.Forms.Label TaiKhoan;
        private System.Windows.Forms.Label DiaChi;
        private System.Windows.Forms.Label SDT;
        private System.Windows.Forms.Label GioiTinh;
        private System.Windows.Forms.TextBox txtgioitinh;
        private System.Windows.Forms.TextBox txtdaotao;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.DataGridViewTextBoxColumn hoten;
        private System.Windows.Forms.DataGridViewTextBoxColumn gioitinhsv;
        private System.Windows.Forms.DataGridViewTextBoxColumn sdtsv;
        private System.Windows.Forms.DataGridViewTextBoxColumn daotao;
        private System.Windows.Forms.DataGridViewTextBoxColumn trangthai;
        private System.Windows.Forms.DataGridViewTextBoxColumn iddk;
    }
}
