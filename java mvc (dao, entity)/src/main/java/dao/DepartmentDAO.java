package dao;

import entity.Department;

import java.sql.SQLException;
import java.util.List;

public interface DepartmentDAO {

    //create
    void add(Department department)  throws SQLException;

    //read
    List<Department> getAll()  throws SQLException;

    Department getByID(Integer id)  throws SQLException;

    //update
    void Update (Department department) throws SQLException;

    //delete
    void remove(Department department)  throws SQLException;
}
