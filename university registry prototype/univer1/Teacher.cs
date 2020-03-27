using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace univer1
{
    public class Teacher
    {
        private string name;
        private string s_name;
        private string l_name;
        private string dob;
        private int cardId;

        public string Name
        { get { return name; } }
        public string S_Name
        { get { return s_name; } }
        public string L_Name
        { get { return l_name; } }
        public string DoB
        { get { return dob; } }
        public int CardID
        { get { return cardId; } }

        public Teacher(string n, string ln, string sn, string d, int c)
        {
            name = n;
            s_name = sn;
            l_name = ln;
            dob = d;
            cardId = c;
        }
    }
}
