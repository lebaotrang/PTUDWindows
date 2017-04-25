namespace WindowsFormsApplication1
{
    partial class daotao
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(daotao));
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.txtmota = new System.Windows.Forms.TextBox();
            this.txtmadt = new System.Windows.Forms.TextBox();
            this.txtten = new System.Windows.Forms.TextBox();
            this.MTDT = new System.Windows.Forms.Label();
            this.TenDT = new System.Windows.Forms.Label();
            this.MaDT = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.cbkhoa = new System.Windows.Forms.ComboBox();
            this.button3 = new System.Windows.Forms.Button();
            this.button2 = new System.Windows.Forms.Button();
            this.button1 = new System.Windows.Forms.Button();
            this.btnexit = new System.Windows.Forms.Button();
            this.btnChange = new System.Windows.Forms.Button();
            this.label4 = new System.Windows.Forms.Label();
            this.madaotao = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.ten = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.mota = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tenkhoa = new System.Windows.Forms.DataGridViewTextBoxColumn();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.SuspendLayout();
            // 
            // dataGridView1
            // 
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.madaotao,
            this.ten,
            this.mota,
            this.tenkhoa});
            this.dataGridView1.Location = new System.Drawing.Point(402, 65);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dataGridView1.Size = new System.Drawing.Size(515, 245);
            this.dataGridView1.TabIndex = 50;
            this.dataGridView1.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dataGridView1_CellContentClick);
            // 
            // txtmota
            // 
            this.txtmota.Location = new System.Drawing.Point(145, 115);
            this.txtmota.Multiline = true;
            this.txtmota.Name = "txtmota";
            this.txtmota.Size = new System.Drawing.Size(207, 167);
            this.txtmota.TabIndex = 49;
            // 
            // txtmadt
            // 
            this.txtmadt.Location = new System.Drawing.Point(145, 65);
            this.txtmadt.Name = "txtmadt";
            this.txtmadt.Size = new System.Drawing.Size(207, 20);
            this.txtmadt.TabIndex = 48;
            // 
            // txtten
            // 
            this.txtten.Location = new System.Drawing.Point(145, 90);
            this.txtten.Name = "txtten";
            this.txtten.Size = new System.Drawing.Size(207, 20);
            this.txtten.TabIndex = 47;
            // 
            // MTDT
            // 
            this.MTDT.AutoSize = true;
            this.MTDT.Location = new System.Drawing.Point(55, 118);
            this.MTDT.Name = "MTDT";
            this.MTDT.Size = new System.Drawing.Size(34, 13);
            this.MTDT.TabIndex = 43;
            this.MTDT.Text = "Mô tả";
            // 
            // TenDT
            // 
            this.TenDT.AutoSize = true;
            this.TenDT.Location = new System.Drawing.Point(55, 93);
            this.TenDT.Name = "TenDT";
            this.TenDT.Size = new System.Drawing.Size(88, 13);
            this.TenDT.TabIndex = 42;
            this.TenDT.Text = "Tên chương trình";
            // 
            // MaDT
            // 
            this.MaDT.AutoSize = true;
            this.MaDT.Location = new System.Drawing.Point(55, 68);
            this.MaDT.Name = "MaDT";
            this.MaDT.Size = new System.Drawing.Size(84, 13);
            this.MaDT.TabIndex = 41;
            this.MaDT.Text = "Mã chương trình";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(55, 288);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(32, 13);
            this.label1.TabIndex = 70;
            this.label1.Text = "Khoa";
            // 
            // cbkhoa
            // 
            this.cbkhoa.FormattingEnabled = true;
            this.cbkhoa.Location = new System.Drawing.Point(145, 288);
            this.cbkhoa.Name = "cbkhoa";
            this.cbkhoa.Size = new System.Drawing.Size(207, 21);
            this.cbkhoa.TabIndex = 69;
            // 
            // button3
            // 
            this.button3.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button3.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button3.ForeColor = System.Drawing.Color.OrangeRed;
            this.button3.Image = ((System.Drawing.Image)(resources.GetObject("button3.Image")));
            this.button3.Location = new System.Drawing.Point(447, 327);
            this.button3.Name = "button3";
            this.button3.Size = new System.Drawing.Size(94, 30);
            this.button3.TabIndex = 87;
            this.button3.Text = "Xóa";
            this.button3.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.button3.UseVisualStyleBackColor = false;
            this.button3.Click += new System.EventHandler(this.button3_Click);
            // 
            // button2
            // 
            this.button2.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button2.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button2.ForeColor = System.Drawing.Color.OrangeRed;
            this.button2.Image = ((System.Drawing.Image)(resources.GetObject("button2.Image")));
            this.button2.Location = new System.Drawing.Point(350, 327);
            this.button2.Name = "button2";
            this.button2.Size = new System.Drawing.Size(91, 30);
            this.button2.TabIndex = 86;
            this.button2.Text = "Sửa";
            this.button2.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.button2.UseVisualStyleBackColor = false;
            this.button2.Click += new System.EventHandler(this.button2_Click);
            // 
            // button1
            // 
            this.button1.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button1.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button1.ForeColor = System.Drawing.Color.OrangeRed;
            this.button1.Image = ((System.Drawing.Image)(resources.GetObject("button1.Image")));
            this.button1.Location = new System.Drawing.Point(253, 327);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(91, 30);
            this.button1.TabIndex = 85;
            this.button1.Text = "Thêm";
            this.button1.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.button1.UseVisualStyleBackColor = false;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // btnexit
            // 
            this.btnexit.Cursor = System.Windows.Forms.Cursors.Hand;
            this.btnexit.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnexit.ForeColor = System.Drawing.Color.OrangeRed;
            this.btnexit.Image = ((System.Drawing.Image)(resources.GetObject("btnexit.Image")));
            this.btnexit.Location = new System.Drawing.Point(644, 327);
            this.btnexit.Name = "btnexit";
            this.btnexit.Size = new System.Drawing.Size(94, 30);
            this.btnexit.TabIndex = 84;
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
            this.btnChange.Location = new System.Drawing.Point(547, 327);
            this.btnChange.Name = "btnChange";
            this.btnChange.Size = new System.Drawing.Size(91, 30);
            this.btnChange.TabIndex = 83;
            this.btnChange.Text = "Lưu";
            this.btnChange.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.btnChange.UseVisualStyleBackColor = false;
            this.btnChange.Click += new System.EventHandler(this.btnChange_Click);
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Times New Roman", 21.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.ForeColor = System.Drawing.Color.OrangeRed;
            this.label4.Location = new System.Drawing.Point(335, 13);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(208, 32);
            this.label4.TabIndex = 88;
            this.label4.Text = "Quản lý đào tạo";
            // 
            // madaotao
            // 
            this.madaotao.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.madaotao.DataPropertyName = "dt_ma";
            this.madaotao.HeaderText = "Mã Đào Tạo";
            this.madaotao.Name = "madaotao";
            this.madaotao.ReadOnly = true;
            // 
            // ten
            // 
            this.ten.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.ten.DataPropertyName = "dt_ten";
            this.ten.HeaderText = "Đào Tạo";
            this.ten.Name = "ten";
            this.ten.ReadOnly = true;
            // 
            // mota
            // 
            this.mota.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.mota.DataPropertyName = "dt_mota";
            this.mota.HeaderText = "Mô Tả";
            this.mota.Name = "mota";
            this.mota.ReadOnly = true;
            // 
            // tenkhoa
            // 
            this.tenkhoa.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.tenkhoa.DataPropertyName = "k_ten";
            this.tenkhoa.HeaderText = "Tên Khoa";
            this.tenkhoa.Name = "tenkhoa";
            this.tenkhoa.ReadOnly = true;
            // 
            // daotao
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.Controls.Add(this.label4);
            this.Controls.Add(this.button3);
            this.Controls.Add(this.button2);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.btnexit);
            this.Controls.Add(this.btnChange);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.cbkhoa);
            this.Controls.Add(this.dataGridView1);
            this.Controls.Add(this.txtmota);
            this.Controls.Add(this.txtmadt);
            this.Controls.Add(this.txtten);
            this.Controls.Add(this.MTDT);
            this.Controls.Add(this.TenDT);
            this.Controls.Add(this.MaDT);
            this.Name = "daotao";
            this.Size = new System.Drawing.Size(984, 383);
            this.Load += new System.EventHandler(this.daotao_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.TextBox txtmota;
        private System.Windows.Forms.TextBox txtmadt;
        private System.Windows.Forms.TextBox txtten;
        private System.Windows.Forms.Label MTDT;
        private System.Windows.Forms.Label TenDT;
        private System.Windows.Forms.Label MaDT;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.ComboBox cbkhoa;
        private System.Windows.Forms.Button button3;
        private System.Windows.Forms.Button button2;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Button btnexit;
        private System.Windows.Forms.Button btnChange;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.DataGridViewTextBoxColumn madaotao;
        private System.Windows.Forms.DataGridViewTextBoxColumn ten;
        private System.Windows.Forms.DataGridViewTextBoxColumn mota;
        private System.Windows.Forms.DataGridViewTextBoxColumn tenkhoa;
    }
}
