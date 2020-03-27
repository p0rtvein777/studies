using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace univer1
{
    public partial class Form1 : Form
    {
        public University myUniversity;

        public Form1()
        {
            InitializeComponent();
            myUniversity = new University();
        }

        #region MainMenuItems

        private void exitToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void aboutToolStripMenuItem_Click(object sender, EventArgs e)
        {
            MessageBox.Show("This program is used for basic university DB administration.", "About program", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void helpToolStripMenuItem_Click(object sender, EventArgs e)
        {
            MessageBox.Show("To use this program go to 'Menu' and choose option you need.", "Program help", MessageBoxButtons.OK, MessageBoxIcon.Question);
        }

        #endregion

        private void buttonReady_Click(object sender, EventArgs e)
        {
            int tb4 = -1;

            if (groupBox1.Text.Split(' ').Contains("subject"))
            {
                myUniversity.Add(new Subject(textBox1.Text, textBox2.Text));
                MessageBox.Show("Ready!", "Adding new..", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                groupBox1.Visible = false;
            }

            else if (!int.TryParse(this.textBox4.Text, out tb4) || (int.TryParse(this.textBox4.Text, out tb4) && int.Parse(this.textBox4.Text) <= 0))
            {
                errorProvider1.SetError(textBox4, "Wrong input! ID is an integer number!");
            }
            else
            {
                if (groupBox1.Text.Split(' ').Contains("student"))
                {
                    myUniversity.Add(new Student(textBox1.Text, textBox2.Text, textBox3.Text, dateTimePicker1.Value.Date.ToString("dd/M/yyyy"), int.Parse(textBox4.Text)));
                }
                else
                {
                    myUniversity.Add(new Teacher(textBox1.Text, textBox2.Text, textBox3.Text, dateTimePicker1.Value.Date.ToString("dd/M/yyyy"), int.Parse(textBox4.Text)));
                }
                MessageBox.Show("Ready!", "Adding new..", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                groupBox1.Visible = false;
            }
        }


        private void clearElements()
        {
            textBox1.Clear();
            textBox2.Clear();
            textBox3.Clear();
            textBox4.Clear();
        }



        #region AddMenuItems

        private void addToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.clearElements();
            groupBox1.Text = "Add new student";
            this.setToDefaults();
        }

        private void addToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            this.clearElements();
            groupBox1.Text = "Add new teacher";
            this.setToDefaults();
        }

        private void addToolStripMenuItem2_Click(object sender, EventArgs e)
        {
            this.clearElements();
            groupBox1.Text = "Add new subject";
            label3.Visible = false;
            label4.Visible = false;
            label5.Visible = false;
            textBox3.Visible = false;
            textBox4.Visible = false;
            dateTimePicker1.Visible = false;
            label2.Text = "ID -";
            groupBox1.Visible = true;
            dataGridView1.Visible = false;
        }

        private void setToDefaults()
        {
            label3.Visible = true;
            label4.Visible = true;
            label5.Visible = true;
            textBox3.Visible = true;
            textBox4.Visible = true;
            dateTimePicker1.Visible = true;
            label2.Text = "Last name";
            groupBox1.Visible = true;
            dataGridView1.Visible = false;
            errorProvider1.Clear();
        }

        #endregion



        #region ShowAllMenuItems

        private void showAllToolStripMenuItem_Click(object sender, EventArgs e)
        {
            dataGridView1.Rows.Clear();
            dataGridView1.Columns.Clear();

            groupBox1.Visible = false;

            dataGridView1.Columns.Add("Name", "Name");
            dataGridView1.Columns.Add("Last name", "Last name");
            dataGridView1.Columns.Add("Surname", "Surname");
            dataGridView1.Columns.Add("Date of birth", "Date of birth");
            dataGridView1.Columns.Add("Card ID", "Card ID");

            for (int i = 0; i < myUniversity.ReturnStudents().Count; i++)
            {
                dataGridView1.Rows.Add(new object[] { myUniversity.ReturnStudents()[i].Name, myUniversity.ReturnStudents()[i].L_Name, myUniversity.ReturnStudents()[i].S_Name, myUniversity.ReturnStudents()[i].DoB, myUniversity.ReturnStudents()[i].CardID});
            }

            dataGridView1.Visible = true;
        }

        private void showAllToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            dataGridView1.Rows.Clear();
            dataGridView1.Columns.Clear();

            groupBox1.Visible = false;

            dataGridView1.Columns.Add("Name", "Name");
            dataGridView1.Columns.Add("Last name", "Last name");
            dataGridView1.Columns.Add("Surname", "Surname");
            dataGridView1.Columns.Add("Date of birth", "Date of birth");
            dataGridView1.Columns.Add("Card ID", "Card ID");

            for (int i = 0; i < myUniversity.ReturnTeachers().Count; i++)
            {
                dataGridView1.Rows.Add(new object[] { myUniversity.ReturnTeachers()[i].Name, myUniversity.ReturnTeachers()[i].L_Name, myUniversity.ReturnTeachers()[i].S_Name, myUniversity.ReturnTeachers()[i].DoB, myUniversity.ReturnTeachers()[i].CardID });
            }

            dataGridView1.Visible = true;
        }

        private void showAllToolStripMenuItem2_Click(object sender, EventArgs e)
        {
            dataGridView1.Rows.Clear();
            dataGridView1.Columns.Clear();

            groupBox1.Visible = false;
            dataGridView1.Update();

            dataGridView1.Columns.Add("Name", "Name");
            dataGridView1.Columns.Add("ID", "ID");

            for (int i = 0; i < myUniversity.ReturnSubjects().Count; i++)
            {
                dataGridView1.Rows.Add(new object[] { myUniversity.ReturnSubjects()[i].Name, myUniversity.ReturnSubjects()[i].ID });
            }

            dataGridView1.Visible = true;
        }

        #endregion
    }
}
