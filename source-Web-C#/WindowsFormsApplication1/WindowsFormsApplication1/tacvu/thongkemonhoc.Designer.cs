namespace WindowsFormsApplication1.tacvu
{
    partial class thongkemonhoc
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
            this.reportViewer1 = new Microsoft.Reporting.WinForms.ReportViewer();
            this.label4 = new System.Windows.Forms.Label();
            this.button1 = new System.Windows.Forms.Button();
            this.cbdaotao = new System.Windows.Forms.ComboBox();
            this.SuspendLayout();
            // 
            // reportViewer1
            // 
            this.reportViewer1.LocalReport.ReportEmbeddedResource = "WindowsFormsApplication1.bangtotnghiep.rdlc";
            this.reportViewer1.Location = new System.Drawing.Point(0, 129);
            this.reportViewer1.Name = "reportViewer1";
            this.reportViewer1.Size = new System.Drawing.Size(1000, 371);
            this.reportViewer1.TabIndex = 0;
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Times New Roman", 21.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.ForeColor = System.Drawing.Color.OrangeRed;
            this.label4.Location = new System.Drawing.Point(91, 48);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(325, 32);
            this.label4.TabIndex = 113;
            this.label4.Text = "THỐNG KÊ MÔN HOC";
            this.label4.Click += new System.EventHandler(this.label4_Click);
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(824, 40);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(110, 58);
            this.button1.TabIndex = 115;
            this.button1.Text = "Liệt kê";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // cbdaotao
            // 
            this.cbdaotao.DropDownStyle = System.Windows.Forms.ComboBoxStyle.Simple;
            this.cbdaotao.FormattingEnabled = true;
            this.cbdaotao.Location = new System.Drawing.Point(528, 28);
            this.cbdaotao.Name = "cbdaotao";
            this.cbdaotao.Size = new System.Drawing.Size(226, 85);
            this.cbdaotao.TabIndex = 120;
            this.cbdaotao.SelectedIndexChanged += new System.EventHandler(this.cbdaotao_SelectedIndexChanged);
            // 
            // thongkemonhoc
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.Controls.Add(this.cbdaotao);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.reportViewer1);
            this.Name = "thongkemonhoc";
            this.Size = new System.Drawing.Size(1000, 500);
            this.Load += new System.EventHandler(this.thongkemonhoc_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private Microsoft.Reporting.WinForms.ReportViewer reportViewer1;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.ComboBox cbdaotao;
    }
}
