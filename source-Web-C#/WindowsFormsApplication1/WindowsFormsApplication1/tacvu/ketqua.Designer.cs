namespace WindowsFormsApplication1.tacvu
{
    partial class ketqua
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
            this.label4 = new System.Windows.Forms.Label();
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.cbhocky = new System.Windows.Forms.ComboBox();
            this.cbnamhoc = new System.Windows.Forms.ComboBox();
            this.cblop = new System.Windows.Forms.ComboBox();
            this.hoten = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.gioitinh = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.monhoc = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.lophoc = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.diem1 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.diem2 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.trungbinh = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tichluy = new System.Windows.Forms.DataGridViewTextBoxColumn();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.SuspendLayout();
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Times New Roman", 21.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.ForeColor = System.Drawing.Color.OrangeRed;
            this.label4.Location = new System.Drawing.Point(229, 12);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(519, 32);
            this.label4.TabIndex = 106;
            this.label4.Text = "Danh sách lớp được phân công giảng dạy";
            // 
            // dataGridView1
            // 
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.hoten,
            this.gioitinh,
            this.monhoc,
            this.lophoc,
            this.diem1,
            this.diem2,
            this.trungbinh,
            this.tichluy});
            this.dataGridView1.Location = new System.Drawing.Point(71, 214);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.Size = new System.Drawing.Size(843, 229);
            this.dataGridView1.TabIndex = 98;
            // 
            // cbhocky
            // 
            this.cbhocky.FormattingEnabled = true;
            this.cbhocky.Location = new System.Drawing.Point(361, 60);
            this.cbhocky.Name = "cbhocky";
            this.cbhocky.Size = new System.Drawing.Size(105, 21);
            this.cbhocky.TabIndex = 107;
            this.cbhocky.Text = "Học kỳ";
            this.cbhocky.SelectedIndexChanged += new System.EventHandler(this.comboBox2_SelectedIndexChanged);
            // 
            // cbnamhoc
            // 
            this.cbnamhoc.FormattingEnabled = true;
            this.cbnamhoc.Location = new System.Drawing.Point(485, 60);
            this.cbnamhoc.Name = "cbnamhoc";
            this.cbnamhoc.Size = new System.Drawing.Size(102, 21);
            this.cbnamhoc.TabIndex = 108;
            this.cbnamhoc.Text = "2017-2018";
            this.cbnamhoc.SelectedIndexChanged += new System.EventHandler(this.cbnamhoc_SelectedIndexChanged);
            // 
            // cblop
            // 
            this.cblop.DropDownStyle = System.Windows.Forms.ComboBoxStyle.Simple;
            this.cblop.FormattingEnabled = true;
            this.cblop.Items.AddRange(new object[] {
            "L-A222333"});
            this.cblop.Location = new System.Drawing.Point(361, 87);
            this.cblop.Name = "cblop";
            this.cblop.Size = new System.Drawing.Size(226, 111);
            this.cblop.TabIndex = 109;
            this.cblop.SelectedIndexChanged += new System.EventHandler(this.cblop_SelectedIndexChanged);
            // 
            // hoten
            // 
            this.hoten.DataPropertyName = "sv_hoten";
            this.hoten.HeaderText = "Họ Tên";
            this.hoten.Name = "hoten";
            this.hoten.ReadOnly = true;
            // 
            // gioitinh
            // 
            this.gioitinh.DataPropertyName = "sv_gioitinh";
            this.gioitinh.HeaderText = "Giới Tính";
            this.gioitinh.Name = "gioitinh";
            this.gioitinh.ReadOnly = true;
            // 
            // monhoc
            // 
            this.monhoc.DataPropertyName = "mh_ten";
            this.monhoc.HeaderText = "Môn Học";
            this.monhoc.Name = "monhoc";
            this.monhoc.ReadOnly = true;
            // 
            // lophoc
            // 
            this.lophoc.DataPropertyName = "l_ten";
            this.lophoc.HeaderText = "Lớp Học";
            this.lophoc.Name = "lophoc";
            this.lophoc.ReadOnly = true;
            // 
            // diem1
            // 
            this.diem1.DataPropertyName = "kq_diemlan1";
            this.diem1.HeaderText = "Kết quả 1";
            this.diem1.Name = "diem1";
            this.diem1.ReadOnly = true;
            // 
            // diem2
            // 
            this.diem2.DataPropertyName = "kq_diemlan2";
            this.diem2.HeaderText = "Kết quả 2";
            this.diem2.Name = "diem2";
            this.diem2.ReadOnly = true;
            // 
            // trungbinh
            // 
            this.trungbinh.DataPropertyName = "kq_trungbinh";
            this.trungbinh.HeaderText = "Trung Bình";
            this.trungbinh.Name = "trungbinh";
            this.trungbinh.ReadOnly = true;
            // 
            // tichluy
            // 
            this.tichluy.DataPropertyName = "kq_tichluy";
            this.tichluy.HeaderText = "Tích Lũy";
            this.tichluy.Name = "tichluy";
            this.tichluy.ReadOnly = true;
            // 
            // ketqua
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.Controls.Add(this.cblop);
            this.Controls.Add(this.cbnamhoc);
            this.Controls.Add(this.cbhocky);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.dataGridView1);
            this.Name = "ketqua";
            this.Size = new System.Drawing.Size(1000, 500);
            this.Load += new System.EventHandler(this.ketqua_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.ComboBox cbhocky;
        private System.Windows.Forms.ComboBox cbnamhoc;
        private System.Windows.Forms.ComboBox cblop;
        private System.Windows.Forms.DataGridViewTextBoxColumn hoten;
        private System.Windows.Forms.DataGridViewTextBoxColumn gioitinh;
        private System.Windows.Forms.DataGridViewTextBoxColumn monhoc;
        private System.Windows.Forms.DataGridViewTextBoxColumn lophoc;
        private System.Windows.Forms.DataGridViewTextBoxColumn diem1;
        private System.Windows.Forms.DataGridViewTextBoxColumn diem2;
        private System.Windows.Forms.DataGridViewTextBoxColumn trungbinh;
        private System.Windows.Forms.DataGridViewTextBoxColumn tichluy;
    }
}
