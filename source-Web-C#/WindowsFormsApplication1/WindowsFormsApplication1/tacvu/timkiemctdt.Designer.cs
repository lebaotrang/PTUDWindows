namespace WindowsFormsApplication1.tacvu
{
    partial class timkiemctdt
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(timkiemctdt));
            this.cbdaotao = new System.Windows.Forms.ComboBox();
            this.label4 = new System.Windows.Forms.Label();
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.label1 = new System.Windows.Forms.Label();
            this.button3 = new System.Windows.Forms.Button();
            this.button2 = new System.Windows.Forms.Button();
            this.button1 = new System.Windows.Forms.Button();
            this.btnexit = new System.Windows.Forms.Button();
            this.btnChange = new System.Windows.Forms.Button();
            this.txtkey = new System.Windows.Forms.TextBox();
            this.madaotao = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tendaotao = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.monhoc = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tinchi = new System.Windows.Forms.DataGridViewTextBoxColumn();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.SuspendLayout();
            // 
            // cbdaotao
            // 
            this.cbdaotao.DropDownStyle = System.Windows.Forms.ComboBoxStyle.Simple;
            this.cbdaotao.FormattingEnabled = true;
            this.cbdaotao.Location = new System.Drawing.Point(387, 73);
            this.cbdaotao.Name = "cbdaotao";
            this.cbdaotao.Size = new System.Drawing.Size(226, 85);
            this.cbdaotao.TabIndex = 119;
            this.cbdaotao.SelectedIndexChanged += new System.EventHandler(this.cbdaotao_SelectedIndexChanged);
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Times New Roman", 21.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.ForeColor = System.Drawing.Color.OrangeRed;
            this.label4.Location = new System.Drawing.Point(272, 3);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(410, 32);
            this.label4.TabIndex = 116;
            this.label4.Text = "Tìm kiếm Chương trình Đào tạo";
            // 
            // dataGridView1
            // 
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.madaotao,
            this.tendaotao,
            this.monhoc,
            this.tinchi});
            this.dataGridView1.Location = new System.Drawing.Point(121, 164);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.Size = new System.Drawing.Size(777, 229);
            this.dataGridView1.TabIndex = 110;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(290, 48);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(91, 13);
            this.label1.TabIndex = 120;
            this.label1.Text = "Nhập tên đào tạo";
            // 
            // button3
            // 
            this.button3.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button3.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button3.ForeColor = System.Drawing.Color.OrangeRed;
            this.button3.Image = ((System.Drawing.Image)(resources.GetObject("button3.Image")));
            this.button3.Location = new System.Drawing.Point(433, 401);
            this.button3.Name = "button3";
            this.button3.Size = new System.Drawing.Size(94, 30);
            this.button3.TabIndex = 115;
            this.button3.Text = "Xóa";
            this.button3.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.button3.UseVisualStyleBackColor = false;
            // 
            // button2
            // 
            this.button2.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button2.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button2.ForeColor = System.Drawing.Color.OrangeRed;
            this.button2.Image = ((System.Drawing.Image)(resources.GetObject("button2.Image")));
            this.button2.Location = new System.Drawing.Point(336, 401);
            this.button2.Name = "button2";
            this.button2.Size = new System.Drawing.Size(91, 30);
            this.button2.TabIndex = 114;
            this.button2.Text = "Sửa";
            this.button2.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.button2.UseVisualStyleBackColor = false;
            // 
            // button1
            // 
            this.button1.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button1.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button1.ForeColor = System.Drawing.Color.OrangeRed;
            this.button1.Image = ((System.Drawing.Image)(resources.GetObject("button1.Image")));
            this.button1.Location = new System.Drawing.Point(239, 401);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(91, 30);
            this.button1.TabIndex = 113;
            this.button1.Text = "Thêm";
            this.button1.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.button1.UseVisualStyleBackColor = false;
            // 
            // btnexit
            // 
            this.btnexit.Cursor = System.Windows.Forms.Cursors.Hand;
            this.btnexit.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnexit.ForeColor = System.Drawing.Color.OrangeRed;
            this.btnexit.Image = ((System.Drawing.Image)(resources.GetObject("btnexit.Image")));
            this.btnexit.Location = new System.Drawing.Point(630, 401);
            this.btnexit.Name = "btnexit";
            this.btnexit.Size = new System.Drawing.Size(94, 30);
            this.btnexit.TabIndex = 112;
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
            this.btnChange.Location = new System.Drawing.Point(533, 401);
            this.btnChange.Name = "btnChange";
            this.btnChange.Size = new System.Drawing.Size(91, 30);
            this.btnChange.TabIndex = 111;
            this.btnChange.Text = "Lưu";
            this.btnChange.TextImageRelation = System.Windows.Forms.TextImageRelation.ImageBeforeText;
            this.btnChange.UseVisualStyleBackColor = false;
            // 
            // txtkey
            // 
            this.txtkey.Location = new System.Drawing.Point(387, 45);
            this.txtkey.Name = "txtkey";
            this.txtkey.Size = new System.Drawing.Size(226, 20);
            this.txtkey.TabIndex = 121;
            this.txtkey.TextChanged += new System.EventHandler(this.textBox1_TextChanged);
            // 
            // madaotao
            // 
            this.madaotao.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.madaotao.DataPropertyName = "dt_ma";
            this.madaotao.HeaderText = "Mã đào tạo";
            this.madaotao.Name = "madaotao";
            this.madaotao.ReadOnly = true;
            // 
            // tendaotao
            // 
            this.tendaotao.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.tendaotao.DataPropertyName = "dt_ten";
            this.tendaotao.HeaderText = "Tên Đào Tạo";
            this.tendaotao.Name = "tendaotao";
            this.tendaotao.ReadOnly = true;
            // 
            // monhoc
            // 
            this.monhoc.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.monhoc.DataPropertyName = "mh_ten";
            this.monhoc.HeaderText = "Môn Học";
            this.monhoc.Name = "monhoc";
            this.monhoc.ReadOnly = true;
            // 
            // tinchi
            // 
            this.tinchi.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.tinchi.DataPropertyName = "mh_tinchi";
            this.tinchi.HeaderText = "Tín Chỉ";
            this.tinchi.Name = "tinchi";
            this.tinchi.ReadOnly = true;
            // 
            // timkiemctdt
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.Controls.Add(this.txtkey);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.cbdaotao);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.button3);
            this.Controls.Add(this.button2);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.btnexit);
            this.Controls.Add(this.btnChange);
            this.Controls.Add(this.dataGridView1);
            this.Name = "timkiemctdt";
            this.Size = new System.Drawing.Size(1000, 500);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.ComboBox cbdaotao;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Button button3;
        private System.Windows.Forms.Button button2;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Button btnexit;
        private System.Windows.Forms.Button btnChange;
        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox txtkey;
        private System.Windows.Forms.DataGridViewTextBoxColumn madaotao;
        private System.Windows.Forms.DataGridViewTextBoxColumn tendaotao;
        private System.Windows.Forms.DataGridViewTextBoxColumn monhoc;
        private System.Windows.Forms.DataGridViewTextBoxColumn tinchi;
    }
}
