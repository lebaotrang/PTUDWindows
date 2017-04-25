using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication1.tacvu
{
    public partial class monhoc : UserControl
    {
        function func = new function();
        public monhoc()
        {
            InitializeComponent();
        }

        private void monhoc_Load(object sender, EventArgs e)
        {
            load();
        }

        public void load()
        {
            string sql = "select mh_ten, mh_tinchi, mh_id, dt_ten from monhoc a, daotao b where a.dt_id = b.dt_id";
            DataTable data = func.getdata(sql);
            dataGridView1.DataSource = data;
            string sql2 = "select * from daotao ";
            DataTable data2 = func.getdata(sql2);
            foreach (DataRow row in data2.Rows)
            {
                cbdaotao.Items.Add(row["dt_ten"]);
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            string ten = txtmon.Text;
            int tinchi = Convert.ToInt32(cbtinchi.Text);
            string sql ="select * from daotao where dt_ten ='"+cbdaotao.Text+"'";
            int iddaotao = 0;
            DataTable data = func.getdata(sql);
            foreach (DataRow row in data.Rows)
            {
                iddaotao = Convert.ToInt32(row["dt_id"]);
            }
            int idmonhoc = Convert.ToInt32(dataGridView1.SelectedRows[0].Cells["idmh"].Value.ToString());
            sql = "update monhoc set mh_ten ='" + ten + "', mh_tinchi =" + tinchi + ", dt_id = " + iddaotao + " where mh_id = " + idmonhoc;
            func.setdata(sql);
            load();
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            txtmon.Text = dataGridView1.SelectedRows[0].Cells["ten"].Value.ToString();
            cbdaotao.Text = dataGridView1.SelectedRows[0].Cells["daotao"].Value.ToString();
            cbtinchi.Text = dataGridView1.SelectedRows[0].Cells["tinchi"].Value.ToString();
        }

        private void button1_Click(object sender, EventArgs e)
        {

            txtmon.Text = "";
            cbdaotao.Text = "";
            cbtinchi.Text = "";
            btnChange.Enabled = true;
            dataGridView1.Enabled = false;
        }

        private void btnChange_Click(object sender, EventArgs e)
        {
            string ten = txtmon.Text;
            int tinchi = Convert.ToInt32(cbtinchi.Text);
            string sql = "select * from daotao where dt_ten ='" + cbdaotao.Text + "'";
            int iddaotao = 0;
            DataTable data = func.getdata(sql);
            foreach (DataRow row in data.Rows)
            {
                iddaotao = Convert.ToInt32(row["dt_id"]);
            }

            sql = "insert into monhoc (mh_ten, mh_tinchi, dt_id) values ('" + ten + "'," + tinchi + "," + iddaotao + ")";
            func.setdata(sql);
            load();
            dataGridView1.Enabled = true;
            btnChange.Enabled = false;
        }

        private void button3_Click(object sender, EventArgs e)
        {
            DialogResult check = MessageBox.Show("Bạn muốn xóa?", "Thông báo", MessageBoxButtons.YesNo);
            if (check == DialogResult.Yes)
            {
                int idmonhoc = Convert.ToInt32(dataGridView1.SelectedRows[0].Cells["idmh"].Value.ToString());
                string sql = "delete from monhoc where mh_id =" + idmonhoc;
                func.setdata(sql);
                MessageBox.Show("Đã xoá", "Thông báo");
                load();
            }
        }
    }
}
