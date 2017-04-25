namespace WindowsFormsApplication1
{
    partial class nhanvien
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(nhanvien));
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.data_email = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.data_hoten = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.data_gioitinh = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.data_ngaysinh = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.data_sdt = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.data_diachi = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.data_khoa = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.txtsdt = new System.Windows.Forms.TextBox();
            this.DiaChi = new System.Windows.Forms.Label();
            this.SDT = new System.Windows.Forms.Label();
            this.GioiTinh = new System.Windows.Forms.Label();
            this.txtgioitinh = new System.Windows.Forms.ComboBox();
            this.txtdiachi = new System.Windows.Forms.TextBox();
            this.txtemail = new System.Windows.Forms.TextBox();
            this.Email = new System.Windows.Forms.Label();
            this.NgaySinh = new System.Windows.Forms.Label();
            this.txtngaysinh = new System.Windows.Forms.DateTimePicker();
            this.txthoten = new System.Windows.Forms.TextBox();
            this.Ten = new System.Windows.Forms.Label();
            this.txtmatkhau = new System.Windows.Forms.TextBox();
            this.MatKhau = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.txtkhoa = new System.Windows.Forms.ComboBox();
            this.btnexit = new System.Windows.Forms.Button();
            this.btnChange = new System.Windows.Forms.Button();
            this.button1 = new System.Windows.Forms.Button();
            this.button2 = new System.Windows.Forms.Button();
            this.button3 = new System.Windows.Forms.Button();
            this.label4 = new System.Windows.Forms.Label();
            this.txtmatkhau2 = new System.Windows.Forms.TextBox();
            this.label2 = new System.Windows.Forms.Label();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.SuspendLayout();
            // 
            // dataGridView1
            // 
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.data_email,
            this.data_hoten,
            this.data_gioitinh,
            this.data_ngaysinh,
            this.data_sdt,
            this.data_diachi,
            this.data_khoa});
            this.dataGridView1.Location = new System.Drawing.Point(404, 70);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dataGridView1.Size = new System.Drawing.Size(573, 289);
            this.dataGridView1.TabIndex = 63;
            this.dataGridView1.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dataGridView1_CellContentClick);
            // 
            // data_email
            // 
            this.data_email.DataPropertyName = "nv_email";
            this.data_email.HeaderText = "Email";
            this.data_email.Name = "data_email";
            this.data_email.ReadOnly = true;
            // 
            // data_hoten
            // 
            this.data_hoten.DataPropertyName = "nv_hoten";
            this.data_hoten.HeaderText = "Họ tên";
            this.data_hoten.Name = "data_hoten";
            this.data_hoten.ReadOnly = true;
            // 
            // data_gioitinh
            // 
            this.data_gioitinh.DataPropertyName = "nv_hoten";
            this.data_gioitinh.HeaderText = "Giới tính";
            this.data_gioitinh.Name = "data_gioitinh";
            this.data_gioitinh.ReadOnly = true;
            // 
            // data_ngaysinh
            // 
            this.data_ngaysinh.DataPropertyName = "nv_ngaysinh";
            this.data_ngaysinh.HeaderText = "Ngày sinh";
            this.data_ngaysinh.Name = "data_ngaysinh";
            this.data_ngaysinh.ReadOnly = true;
            // 
            // data_sdt
            // 
            this.data_sdt.DataPropertyName = "nv_dienthoai";
            this.data_sdt.HeaderText = "Điện thoại";
            this.data_sdt.Name = "data_sdt";
            this.data_sdt.ReadOnly = true;
            // 
            // data_diachi
            // 
            this.data_diachi.DataPropertyName = "nv_diachi";
            this.data_diachi.HeaderText = "Địa chỉ";
            this.data_diachi.Name = "data_diachi";
            this.data_diachi.ReadOnly = true;
            // 
            // data_khoa
            // 
            this.data_khoa.DataPropertyName = "k_ten";
            this.data_khoa.HeaderText = "Tên khoa";
            this.data_khoa.Name = "data_khoa";
            this.data_khoa.ReadOnly = true;
            // 
            // txtsdt
            // 
            this.txtsdt.Location = new System.Drawing.Point(160, 226);
            this.txtsdt.Name = "txtsdt";
            this.txtsdt.Size = new System.Drawing.Size(199, 20);
            this.txtsdt.TabIndex = 58;
            // 
            // DiaChi
            // 
            this.DiaChi.AutoSize = true;
            this.DiaChi.Location = new System.Drawing.Point(52, 255);
            this.DiaChi.Name = "DiaChi";
            this.DiaChi.Size = new System.Drawing.Size(40, 13);
            this.DiaChi.TabIndex = 51;
            this.DiaChi.Text = "Địa chỉ";
            // 
            // SDT
            // 
            this.SDT.AutoSize = true;
            this.SDT.Location = new System.Drawing.Point(53, 229);
            this.SDT.Name = "SDT";
            this.SDT.Size = new System.Drawing.Size(29, 13);
            this.SDT.TabIndex = 50;
            this.SDT.Text = "SĐT";
            // 
            // GioiTinh
            // 
            this.GioiTinh.AutoSize = true;
            this.GioiTinh.Location = new System.Drawing.Point(53, 177);
            this.GioiTinh.Name = "GioiTinh";
            this.GioiTinh.Size = new System.Drawing.Size(47, 13);
            this.GioiTinh.TabIndex = 49;
            this.GioiTinh.Text = "Giới tính";
            // 
            // txtgioitinh
            // 
            this.txtgioitinh.FormattingEnabled = true;
            this.txtgioitinh.Location = new System.Drawing.Point(160, 174);
            this.txtgioitinh.Name = "txtgioitinh";
            this.txtgioitinh.Size = new System.Drawing.Size(199, 21);
            this.txtgioitinh.TabIndex = 45;
            this.txtgioitinh.Text = "Nam";
            // 
            // txtdiachi
            // 
            this.txtdiachi.Location = new System.Drawing.Point(160, 252);
            this.txtdiachi.Name = "txtdiachi";
            this.txtdiachi.Size = new System.Drawing.Size(200, 20);
            this.txtdiachi.TabIndex = 59;
            // 
            // txtemail
            // 
            this.txtemail.Enabled = false;
            this.txtemail.Location = new System.Drawing.Point(160, 70);
            this.txtemail.Name = "txtemail";
            this.txtemail.Size = new System.Drawing.Size(200, 20);
            this.txtemail.TabIndex = 60;
            // 
            // Email
            // 
            this.Email.AutoSize = true;
            this.Email.Location = new System.Drawing.Point(53, 73);
            this.Email.Name = "Email";
            this.Email.Size = new System.Drawing.Size(35, 13);
            this.Email.TabIndex = 52;
            this.Email.Text = "E-mail";
            // 
            // NgaySinh
            // 
            this.NgaySinh.AutoSize = true;
            this.NgaySinh.Location = new System.Drawing.Point(54, 206);
            this.NgaySinh.Name = "NgaySinh";
            this.NgaySinh.Size = new System.Drawing.Size(54, 13);
            this.NgaySinh.TabIndex = 48;
            this.NgaySinh.Text = "Ngày sinh";
            // 
            // txtngaysinh
            // 
            this.txtngaysinh.Format = System.Windows.Forms.DateTimePickerFormat.Short;
            this.txtngaysinh.Location = new System.Drawing.Point(159, 200);
            this.txtngaysinh.Name = "txtngaysinh";
            this.txtngaysinh.Size = new System.Drawing.Size(200, 20);
            this.txtngaysinh.TabIndex = 57;
            // 
            // txthoten
            // 
            this.txthoten.Location = new System.Drawing.Point(160, 148);
            this.txthoten.Name = "txthoten";
            this.txthoten.Size = new System.Drawing.Size(200, 20);
            this.txthoten.TabIndex = 54;
            // 
            // Ten
            // 
            this.Ten.AutoSize = true;
            this.Ten.Location = new System.Drawing.Point(53, 151);
            this.Ten.Name = "Ten";
            this.Ten.Size = new System.Drawing.Size(39, 13);
            this.Ten.TabIndex = 47;
            this.Ten.Text = "Họ tên";
            // 
            // txtmatkhau
            // 
            this.txtmatkhau.Location = new System.Drawing.Point(161, 96);
            this.txtmatkhau.Name = "txtmatkhau";
            this.txtmatkhau.Size = new System.Drawing.Size(199, 20);
            this.txtmatkhau.TabIndex = 62;
            // 
            // MatKhau
            // 
            this.MatKhau.AutoSize = true;
            this.MatKhau.Location = new System.Drawing.Point(53, 99);
            this.MatKhau.Name = "MatKhau";
            this.MatKhau.Size = new System.Drawing.Size(52, 13);
            this.MatKhau.TabIndex = 53;
            this.MatKhau.Text = "Mật khẩu";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(53, 281);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(32, 13);
            this.label1.TabIndex = 68;
            this.label1.Text = "Khoa";
            // 
            // txtkhoa
            // 
            this.txtkhoa.FormattingEnabled = true;
            this.txtkhoa.Location = new System.Drawing.Point(160, 278);
            this.txtkhoa.Name = "txtkhoa";
            this.txtkhoa.Size = new System.Drawing.Size(199, 21);
            this.txtkhoa.TabIndex = 67;
            this.txtkhoa.Text = "Nam";
            // 
            // btnexit
            // 
            this.btnexit.Cursor = System.Windows.Forms.Cursors.Hand;
            this.btnexit.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnexit.ForeColor = System.Drawing.Color.OrangeRed;
            this.btnexit.Image = ((System.Drawing.Image)(resources.GetObject("btnexit.Image")));
            this.btnexit.Location = new System.Drawing.Point(660, 404);
            this.btnexit.Name = "btnexit";
            this.btnexit.Size = new System.Drawing.Size(94, 30);
            this.btnexit.TabIndex = 79;
            this.btnexit.Text = "Hủy bỏ";
            this.btnexit.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.btnexit.UseVisualStyleBackColor = false;
            // 
            // btnChange
            // 
            this.btnChange.Cursor = System.Windows.Forms.Cursors.Hand;
            this.btnChange.Enabled = false;
            this.btnChange.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnChange.ForeColor = System.Drawing.Color.OrangeRed;
            this.btnChange.Image = ((System.Drawing.Image)(resources.GetObject("btnChange.Image")));
            this.btnChange.Location = new System.Drawing.Point(563, 404);
            this.btnChange.Name = "btnChange";
            this.btnChange.Size = new System.Drawing.Size(91, 30);
            this.btnChange.TabIndex = 78;
            this.btnChange.Text = "Lưu";
            this.btnChange.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.btnChange.UseVisualStyleBackColor = false;
            this.btnChange.Click += new System.EventHandler(this.btnChange_Click);
            // 
            // button1
            // 
            this.button1.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button1.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button1.ForeColor = System.Drawing.Color.OrangeRed;
            this.button1.Image = ((System.Drawing.Image)(resources.GetObject("button1.Image")));
            this.button1.Location = new System.Drawing.Point(269, 404);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(91, 30);
            this.button1.TabIndex = 80;
            this.button1.Text = "Thêm";
            this.button1.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.button1.UseVisualStyleBackColor = false;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // button2
            // 
            this.button2.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button2.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button2.ForeColor = System.Drawing.Color.OrangeRed;
            this.button2.Image = ((System.Drawing.Image)(resources.GetObject("button2.Image")));
            this.button2.Location = new System.Drawing.Point(366, 404);
            this.button2.Name = "button2";
            this.button2.Size = new System.Drawing.Size(91, 30);
            this.button2.TabIndex = 81;
            this.button2.Text = "Sửa";
            this.button2.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.button2.UseVisualStyleBackColor = false;
            this.button2.Click += new System.EventHandler(this.button2_Click);
            // 
            // button3
            // 
            this.button3.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button3.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button3.ForeColor = System.Drawing.Color.OrangeRed;
            this.button3.Image = ((System.Drawing.Image)(resources.GetObject("button3.Image")));
            this.button3.Location = new System.Drawing.Point(463, 404);
            this.button3.Name = "button3";
            this.button3.Size = new System.Drawing.Size(94, 30);
            this.button3.TabIndex = 82;
            this.button3.Text = "Xóa";
            this.button3.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.button3.UseVisualStyleBackColor = false;
            this.button3.Click += new System.EventHandler(this.button3_Click);
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Times New Roman", 21.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.ForeColor = System.Drawing.Color.OrangeRed;
            this.label4.Location = new System.Drawing.Point(398, 18);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(244, 32);
            this.label4.TabIndex = 83;
            this.label4.Text = "Quản lý Nhân viên";
            // 
            // txtmatkhau2
            // 
            this.txtmatkhau2.Location = new System.Drawing.Point(161, 122);
            this.txtmatkhau2.Name = "txtmatkhau2";
            this.txtmatkhau2.Size = new System.Drawing.Size(199, 20);
            this.txtmatkhau2.TabIndex = 85;
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(53, 125);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(93, 13);
            this.label2.TabIndex = 84;
            this.label2.Text = "Nhập lại mật khẩu";
            // 
            // nhanvien
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.Controls.Add(this.txtmatkhau2);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.button3);
            this.Controls.Add(this.button2);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.btnexit);
            this.Controls.Add(this.btnChange);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.txtkhoa);
            this.Controls.Add(this.dataGridView1);
            this.Controls.Add(this.txtmatkhau);
            this.Controls.Add(this.txtemail);
            this.Controls.Add(this.txtdiachi);
            this.Controls.Add(this.txtsdt);
            this.Controls.Add(this.txtngaysinh);
            this.Controls.Add(this.txthoten);
            this.Controls.Add(this.MatKhau);
            this.Controls.Add(this.Email);
            this.Controls.Add(this.DiaChi);
            this.Controls.Add(this.SDT);
            this.Controls.Add(this.GioiTinh);
            this.Controls.Add(this.NgaySinh);
            this.Controls.Add(this.Ten);
            this.Controls.Add(this.txtgioitinh);
            this.Name = "nhanvien";
            this.Size = new System.Drawing.Size(1000, 500);
            this.Load += new System.EventHandler(this.nhanvien_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.TextBox txtsdt;
        private System.Windows.Forms.Label DiaChi;
        private System.Windows.Forms.Label SDT;
        private System.Windows.Forms.Label GioiTinh;
        private System.Windows.Forms.ComboBox txtgioitinh;
        private System.Windows.Forms.TextBox txtdiachi;
        private System.Windows.Forms.TextBox txtemail;
        private System.Windows.Forms.Label Email;
        private System.Windows.Forms.Label NgaySinh;
        private System.Windows.Forms.DateTimePicker txtngaysinh;
        private System.Windows.Forms.TextBox txthoten;
        private System.Windows.Forms.Label Ten;
        private System.Windows.Forms.TextBox txtmatkhau;
        private System.Windows.Forms.Label MatKhau;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.ComboBox txtkhoa;
        private System.Windows.Forms.Button btnexit;
        private System.Windows.Forms.Button btnChange;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Button button2;
        private System.Windows.Forms.Button button3;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.TextBox txtmatkhau2;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.DataGridViewTextBoxColumn data_email;
        private System.Windows.Forms.DataGridViewTextBoxColumn data_hoten;
        private System.Windows.Forms.DataGridViewTextBoxColumn data_gioitinh;
        private System.Windows.Forms.DataGridViewTextBoxColumn data_ngaysinh;
        private System.Windows.Forms.DataGridViewTextBoxColumn data_sdt;
        private System.Windows.Forms.DataGridViewTextBoxColumn data_diachi;
        private System.Windows.Forms.DataGridViewTextBoxColumn data_khoa;
    }
}
