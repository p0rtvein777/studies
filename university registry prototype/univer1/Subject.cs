using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace univer1
{
    public class Subject
    {
        private string name;
        private string id;

        public string Name
        { get { return name; } }
        public string ID
        { get { return id; } }

        public Subject(string n, string i)
        {
            name = n;
            id = i;
        }
    }
}
