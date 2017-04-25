namespace WindowsFormsApplication1.tacvu
{
    partial class monhoc
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(monhoc));
            this.label4 = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.cbdaotao = new System.Windows.Forms.ComboBox();
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.ten = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tinchi = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.daotao = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.idmh = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.txtmon = new System.Windows.Forms.TextBox();
            this.Email = new System.Windows.Forms.Label();
            this.GioiTinh = new System.Windows.Forms.Label();
            this.cbtinchi = new System.Windows.Forms.ComboBox();
            this.button3 = new System.Windows.Forms.Button();
            this.button2 = new System.Windows.Forms.Button();
            this.button1 = new System.Windows.Forms.Button();
            this.btnexit = new System.Windows.Forms.Button();
            this.btnChange = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.SuspendLayout();
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Times New Roman", 21.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.ForeColor = System.Drawing.Color.OrangeRed;
            this.label4.Location = new System.Drawing.Point(384, 0);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(223, 32);
            this.label4.TabIndex = 106;
            this.label4.Text = "Quản lý môn học";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(21, 142);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(36, 13);
            this.label1.TabIndex = 100;
            this.label1.Text = "CTĐT";
            // 
            // cbdaotao
            // 
            this.cbdaotao.FormattingEnabled = true;
            this.cbdaotao.Location = new System.Drawing.Point(99, 139);
            this.cbdaotao.Name = "cbdaotao";
            this.cbdaotao.Size = new System.Drawing.Size(199, 21);
            this.cbdaotao.TabIndex = 99;
            // 
            // dataGridView1
            // 
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.ten,
            this.tinchi,
            this.daotao,
            this.idmh});
            this.dataGridView1.Location = new System.Drawing.Point(360, 62);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dataGridView1.Size = new System.Drawing.Size(607, 182);
            this.dataGridView1.TabIndex = 98;
            this.dataGridView1.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dataGridView1_CellContentClick);
            // 
            // ten
            // 
            this.ten.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.ten.DataPropertyName = "mh_ten";
            this.ten.HeaderText = "Môn Học";
            this.ten.Name = "ten";
            this.ten.ReadOnly = true;
            // 
            // tinchi
            // 
            this.tinchi.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.tinchi.DataPropertyName = "mh_tinchi";
            this.tinchi.HeaderText = "Tín Chỉ";
            this.tinchi.Name = "tinchi";
            this.tinchi.ReadOnly = true;
            // 
            // daotao
            // 
            this.daotao.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.daotao.DataPropertyName = "dt_ten";
            this.daotao.HeaderText = "Đào Tạo";
            this.daotao.Name = "daotao";
            this.daotao.ReadOnly = true;
            // 
            // idmh
            // 
            this.idmh.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.None;
            this.idmh.DataPropertyName = "mh_id";
            this.idmh.HeaderText = "";
            this.idmh.Name = "idmh";
            this.idmh.ReadOnly = true;
            // 
            // txtmon
            // 
            this.txtmon.Location = new System.Drawing.Point(98, 62);
            this.txtmon.Name = "txtmon";
            this.txtmon.Size = new System.Drawing.Size(200, 20);
            this.txtmon.TabIndex = 96;
            // 
            // Email
            // 
            this.Email.AutoSize = true;
            this.Email.Location = new System.Drawing.Point(20, 65);
            this.Email.Name = "Email";
            this.Email.Size = new System.Drawing.Size(49, 13);
            this.Email.TabIndex = 90;
            this.Email.Text = "Tên môn";
            // 
            // GioiTinh
            // 
            this.GioiTinh.AutoSize = true;
            this.GioiTinh.Location = new System.Drawing.Point(21, 104);
            this.GioiTinh.Name = "GioiTinh";
            this.GioiTinh.Size = new System.Drawing.Size(59, 13);
            this.GioiTinh.TabIndex = 87;
            this.GioiTinh.Text = "Số tính chỉ";
            // 
            // cbtinchi
            // 
            this.cbtinchi.FormattingEnabled = true;
            this.cbtinchi.Items.AddRange(new object[] {
            "1",
            "2",
            "3",
            "4",
            "10"});
            this.cbtinchi.Location = new System.Drawing.Point(99, 101);
            this.cbtinchi.Name = "cbtinchi";
            this.cbtinchi.Size = new System.Drawing.Size(199, 21);
            this.cbtinchi.TabIndex = 84;
            this.cbtinchi.Text = "1";
            // 
            // button3
            // 
            this.button3.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button3.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button3.ForeColor = System.Drawing.Color.OrangeRed;
            this.button3.Image = ((System.Drawing.Image)(resources.GetObject("button3.Image")));
            this.button3.Location = new System.Drawing.Point(491, 329);
            this.button3.Name = "button3";
            this.button3.Size = new System.Drawing.Size(94, 30);
            this.button3.TabIndex = 105;
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
            this.button2.Location = new System.Drawing.Point(394, 329);
            this.button2.Name = "button2";
            this.button2.Size = new System.Drawing.Size(91, 30);
            this.button2.TabIndex = 104;
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
            this.button1.Location = new System.Drawing.Point(297, 329);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(91, 30);
            this.button1.TabIndex = 103;
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
            this.btnexit.Location = new System.Drawing.Point(688, 329);
            this.btnexit.Name = "btnexit";
            this.btnexit.Size = new System.Drawing.Size(94, 30);
            this.btnexit.TabIndex = 102;
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
            this.btnChange.Location = new System.Drawing.Point(591, 329);
            this.btnChange.Name = "btnChange";
            this.btnChange.Size = new System.Drawing.Size(91, 30);
            this.btnChange.TabIndex = 101;
            this.btnChange.Text = "Lưu";
            this.btnChange.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.btnChange.UseVisualStyleBackColor = false;
            this.btnChange.Click += new System.EventHandler(this.btnChange_Click);
            // 
            // monhoc
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
            this.Controls.Add(this.cbdaotao);
            this.Controls.Add(this.dataGridView1);
            this.Controls.Add(this.txtmon);
            this.Controls.Add(this.Email);
            this.Controls.Add(this.GioiTinh);
            this.Controls.Add(this.cbtinchi);
            this.Name = "monhoc";
            this.Size = new System.Drawing.Size(1000, 500);
            this.Load += new System.EventHandler(this.monhoc_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Button button3;
        private System.Windows.Forms.Button button2;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Button btnexit;
        private System.Windows.Forms.Button btnChange;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.ComboBox cbdaotao;
        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.TextBox txtmon;
        private System.Windows.Forms.Label Email;
        private System.Windows.Forms.Label GioiTinh;
        private System.Windows.Forms.ComboBox cbtinchi;
        private System.Windows.Forms.DataGridViewTextBoxColumn ten;
        private System.Windows.Forms.DataGridViewTextBoxColumn tinchi;
        private System.Windows.Forms.DataGridViewTextBoxColumn daotao;
        private System.Windows.Forms.DataGridViewTextBoxColumn idmh;
    }
}
