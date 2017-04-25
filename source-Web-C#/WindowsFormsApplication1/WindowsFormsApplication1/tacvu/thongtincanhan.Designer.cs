namespace WindowsFormsApplication1
{
    partial class thongtincanhan
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
            this.NDongY = new System.Windows.Forms.Button();
            this.TieuDe = new System.Windows.Forms.Label();
            this.txtemail = new System.Windows.Forms.TextBox();
            this.txtdiachi = new System.Windows.Forms.TextBox();
            this.txtsdt = new System.Windows.Forms.TextBox();
            this.txthoten = new System.Windows.Forms.TextBox();
            this.TaiKhoan = new System.Windows.Forms.Label();
            this.Email = new System.Windows.Forms.Label();
            this.DiaChi = new System.Windows.Forms.Label();
            this.SDT = new System.Windows.Forms.Label();
            this.GioiTinh = new System.Windows.Forms.Label();
            this.txtgioitinh = new System.Windows.Forms.ComboBox();
            this.txttaikhoan = new System.Windows.Forms.TextBox();
            this.label1 = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // NDongY
            // 
            this.NDongY.Location = new System.Drawing.Point(474, 351);
            this.NDongY.Name = "NDongY";
            this.NDongY.Size = new System.Drawing.Size(75, 23);
            this.NDongY.TabIndex = 87;
            this.NDongY.Text = "Cập Nhật";
            this.NDongY.UseVisualStyleBackColor = true;
            this.NDongY.Click += new System.EventHandler(this.NDongY_Click);
            // 
            // TieuDe
            // 
            this.TieuDe.AutoSize = true;
            this.TieuDe.Font = new System.Drawing.Font("Times New Roman", 30F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.TieuDe.Location = new System.Drawing.Point(345, 32);
            this.TieuDe.Name = "TieuDe";
            this.TieuDe.Size = new System.Drawing.Size(356, 45);
            this.TieuDe.TabIndex = 86;
            this.TieuDe.Text = "Thông Tin Cá Nhân";
            // 
            // txtemail
            // 
            this.txtemail.Location = new System.Drawing.Point(474, 262);
            this.txtemail.Name = "txtemail";
            this.txtemail.Size = new System.Drawing.Size(200, 20);
            this.txtemail.TabIndex = 82;
            // 
            // txtdiachi
            // 
            this.txtdiachi.Location = new System.Drawing.Point(474, 236);
            this.txtdiachi.Name = "txtdiachi";
            this.txtdiachi.Size = new System.Drawing.Size(200, 20);
            this.txtdiachi.TabIndex = 81;
            // 
            // txtsdt
            // 
            this.txtsdt.Location = new System.Drawing.Point(474, 210);
            this.txtsdt.Name = "txtsdt";
            this.txtsdt.Size = new System.Drawing.Size(114, 20);
            this.txtsdt.TabIndex = 80;
            // 
            // txthoten
            // 
            this.txthoten.Location = new System.Drawing.Point(474, 105);
            this.txthoten.Name = "txthoten";
            this.txthoten.Size = new System.Drawing.Size(114, 20);
            this.txthoten.TabIndex = 78;
            // 
            // TaiKhoan
            // 
            this.TaiKhoan.AutoSize = true;
            this.TaiKhoan.Location = new System.Drawing.Point(323, 108);
            this.TaiKhoan.Name = "TaiKhoan";
            this.TaiKhoan.Size = new System.Drawing.Size(42, 13);
            this.TaiKhoan.TabIndex = 77;
            this.TaiKhoan.Text = "Họ tên:";
            // 
            // Email
            // 
            this.Email.AutoSize = true;
            this.Email.Location = new System.Drawing.Point(323, 265);
            this.Email.Name = "Email";
            this.Email.Size = new System.Drawing.Size(35, 13);
            this.Email.TabIndex = 74;
            this.Email.Text = "E-mail";
            // 
            // DiaChi
            // 
            this.DiaChi.AutoSize = true;
            this.DiaChi.Location = new System.Drawing.Point(322, 239);
            this.DiaChi.Name = "DiaChi";
            this.DiaChi.Size = new System.Drawing.Size(40, 13);
            this.DiaChi.TabIndex = 73;
            this.DiaChi.Text = "Địa chỉ";
            // 
            // SDT
            // 
            this.SDT.AutoSize = true;
            this.SDT.Location = new System.Drawing.Point(323, 213);
            this.SDT.Name = "SDT";
            this.SDT.Size = new System.Drawing.Size(29, 13);
            this.SDT.TabIndex = 72;
            this.SDT.Text = "SĐT";
            // 
            // GioiTinh
            // 
            this.GioiTinh.AutoSize = true;
            this.GioiTinh.Location = new System.Drawing.Point(323, 186);
            this.GioiTinh.Name = "GioiTinh";
            this.GioiTinh.Size = new System.Drawing.Size(47, 13);
            this.GioiTinh.TabIndex = 71;
            this.GioiTinh.Text = "Giới tính";
            // 
            // txtgioitinh
            // 
            this.txtgioitinh.FormattingEnabled = true;
            this.txtgioitinh.Items.AddRange(new object[] {
            "Nam",
            "Nữ"});
            this.txtgioitinh.Location = new System.Drawing.Point(474, 183);
            this.txtgioitinh.Name = "txtgioitinh";
            this.txtgioitinh.Size = new System.Drawing.Size(90, 21);
            this.txtgioitinh.TabIndex = 67;
            // 
            // txttaikhoan
            // 
            this.txttaikhoan.Location = new System.Drawing.Point(474, 288);
            this.txttaikhoan.Name = "txttaikhoan";
            this.txttaikhoan.Size = new System.Drawing.Size(200, 20);
            this.txttaikhoan.TabIndex = 90;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(323, 291);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(73, 13);
            this.label1.TabIndex = 89;
            this.label1.Text = "Tên tài khoản";
            // 
            // thongtincanhan
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.Controls.Add(this.txttaikhoan);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.NDongY);
            this.Controls.Add(this.TieuDe);
            this.Controls.Add(this.txtemail);
            this.Controls.Add(this.txtdiachi);
            this.Controls.Add(this.txtsdt);
            this.Controls.Add(this.txthoten);
            this.Controls.Add(this.TaiKhoan);
            this.Controls.Add(this.Email);
            this.Controls.Add(this.DiaChi);
            this.Controls.Add(this.SDT);
            this.Controls.Add(this.GioiTinh);
            this.Controls.Add(this.txtgioitinh);
            this.Name = "thongtincanhan";
            this.Size = new System.Drawing.Size(1000, 500);
            this.Load += new System.EventHandler(this.thongtincanhan_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private System.Windows.Forms.Button NDongY;
        private System.Windows.Forms.Label TieuDe;
        private System.Windows.Forms.TextBox txtemail;
        private System.Windows.Forms.TextBox txtdiachi;
        private System.Windows.Forms.TextBox txtsdt;
        private System.Windows.Forms.TextBox txthoten;
        private System.Windows.Forms.Label TaiKhoan;
        private System.Windows.Forms.Label Email;
        private System.Windows.Forms.Label DiaChi;
        private System.Windows.Forms.Label SDT;
        private System.Windows.Forms.Label GioiTinh;
        private System.Windows.Forms.ComboBox txtgioitinh;
        private System.Windows.Forms.TextBox txttaikhoan;
        private System.Windows.Forms.Label label1;
    }
}
