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
    public partial class ketqua : UserControl
    {
        function func = new function();
        public ketqua()
        {
            InitializeComponent();
        }

        private void comboBox2_SelectedIndexChanged(object sender, EventArgs e)
        {
            string hocky = cbhocky.Text;
            string namhoc = cbnamhoc.Text;
            string sql = "select distinct l_ten from hockynienkhoa a, hknk_mon b, lop c where a.hknk_id = b.hknk_id and b.hknk_id = c.hknk_id and hocky = " + hocky + " and nienkhoa ='" + namhoc + "'";
            DataTable data = func.getdata(sql);
            cblop.Items.Clear();
            foreach (DataRow row in data.Rows)
            {
                cblop.Items.Add(row["l_ten"]);
            }
        }

        private void ketqua_Load(object sender, EventArgs e)
        {
            load();
        }

        private void load()
        {
            string sql = "select distinct hocky from hockynienkhoa ";
            DataTable data = func.getdata(sql);
            foreach (DataRow row in data.Rows)
            {
                cbhocky.Items.Add(row["hocky"]);
            }

            sql = "select distinct nienkhoa from hockynienkhoa ";
            data = func.getdata(sql);
            
            foreach (DataRow row in data.Rows)
            {
                cbnamhoc.Items.Add(row["nienkhoa"]);
            }
        }

        private void cblop_SelectedIndexChanged(object sender, EventArgs e)
        {
            string lop = cblop.SelectedText;
            string hocky = cbhocky.Text;
            string nienkhoa = cbnamhoc.Text;
            string sql = "select sv_hoten, case when sv_gioitinh =1 then 'Nam' else 'Nữ' end as sv_gioitinh, mh_ten, l_ten, kq_diemlan1, kq_diemlan2, kq_trungbinh, kq_tichluy from sinhvien a, ketqua b, lop c, monhoc d, hockynienkhoa e where a.sv_id = b.sv_id and b.l_id = c.l_id and b.m_id = d.mh_id and c.hknk_id = e.hknk_id and l_ten='"+lop+"' and hocky ="+hocky+" and nienkhoa ='"+nienkhoa+"'";
            DataTable data = func.getdata(sql);
            dataGridView1.DataSource = data;
        }

        private void cbnamhoc_SelectedIndexChanged(object sender, EventArgs e)
        {
            string hocky = cbhocky.Text;
            string namhoc = cbnamhoc.Text;
            string sql = "select distinct l_ten from hockynienkhoa a, hknk_mon b, lop c where a.hknk_id = b.hknk_id and b.hknk_id = c.hknk_id and hocky = " + hocky + " and nienkhoa ='" + namhoc + "'";
            DataTable data = func.getdata(sql);
            cblop.Items.Clear();
            foreach (DataRow row in data.Rows)
            {
                cblop.Items.Add(row["l_ten"]);
            }
        }
    }
}
