using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace univer1
{
    public class University
    {
        private List<Student> studentsList;
        private List<Subject> subjectsList;
        private List<Teacher> teachersList;

        public University() 
        {
            studentsList = new List<Student>();
            subjectsList = new List<Subject>();
            teachersList = new List<Teacher>();
        }

        public void Add(Student st) { if (!studentsList.Contains(st)) { studentsList.Add(st); } }
        public void Add(Teacher t) { if (!teachersList.Contains(t)) { teachersList.Add(t); } }
        public void Add(Subject s) { { if (!subjectsList.Contains(s)) subjectsList.Add(s); } }

        public void Delete(Student st) { if (studentsList.Contains(st)) { studentsList.Remove(st); } }
        public void Delete(Teacher t) { if (teachersList.Contains(t)) { teachersList.Remove(t); } }
        public void Delete(Subject s) { { if (subjectsList.Contains(s)) subjectsList.Remove(s); } }

        public List<Student> ReturnStudents() { return this.studentsList; }
        public List<Teacher> ReturnTeachers() { return this.teachersList; }
        public List<Subject> ReturnSubjects() { return this.subjectsList; }

    }
}
