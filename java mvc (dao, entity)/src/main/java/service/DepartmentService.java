package service;

import bl.Util;
import dao.DepartmentDAO;
import entity.Department;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class DepartmentService extends Util implements DepartmentDAO {

    Connection connection = getConnection();

    @Override
    public void add(Department department)  throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "INSERT INTO DEPARTMENT VALUES(?, ?, ?, ?)";
        /*previous one wont work, use the one below
        String sql = "INSERT INTO DEPARTMENT VALUES(?, ?, ?, ?)";
        */

        try {
            preparedStatement = connection.prepareStatement(sql);

            preparedStatement.setInt(1, department.getId());
            preparedStatement.setString(2, department.getName());
            preparedStatement.setString(3, department.getAddress());
            preparedStatement.setString(4, department.getPhone());

            preparedStatement.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {

            if (preparedStatement != null) {
                preparedStatement.close();
            }
            if (connection != null) {
                connection.close();
            }
        }
    }

    @Override
    public List<Department> getAll()  throws SQLException {
        List<Department> departmentList = new ArrayList<>();

        String sql = "SELECT * FROM DEPARTMENT";

        Statement statement = null;

        try {
            statement = connection.createStatement();

            ResultSet resultSet = statement.executeQuery(sql);

            while (resultSet.next()) {
                Department department = new Department();
                department.setId(resultSet.getInt("id"));
                department.setName(resultSet.getString("name"));
                department.setAddress(resultSet.getString("address"));
                department.setPhone(resultSet.getString("phone"));

                departmentList.add(department);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {

            if (statement != null) {
                statement.close();
            }
            if (connection != null) {
                connection.close();
            }
        }
        return departmentList;
    }

    @Override
    public Department getByID(Integer id)  throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "SELECT * FROM DEPARTMENT WHERE ID=?";

        Department department = new Department();

        try {
            preparedStatement = connection.prepareStatement(sql);
            preparedStatement.setInt(1, id);

            ResultSet resultSet = preparedStatement.executeQuery();

            department.setId(resultSet.getInt("id"));
            department.setName(resultSet.getString("name"));
            department.setAddress(resultSet.getString("address"));
            department.setPhone(resultSet.getString("phone"));

            preparedStatement.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {

            if (preparedStatement != null) {
                preparedStatement.close();
            }
            if (connection != null) {
                connection.close();
            }
        }
        return department;
    }

    @Override
    public void Update(Department department) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "UPDATE DEPARTMENT SET name=?, address=?, phone=? WHERE id=?";

        try{
            preparedStatement = connection.prepareStatement(sql);

            preparedStatement.setString(1, department.getName());
            preparedStatement.setString(2, department.getAddress());
            preparedStatement.setString(3, department.getPhone());
            preparedStatement.setInt(4, department.getId());

            preparedStatement.executeUpdate();
        } catch (SQLException e){
            e.printStackTrace();
        } finally {
            if(preparedStatement != null){
                preparedStatement.close();
            }
            if(connection != null){
                connection.close();
            }
        }
    }

    @Override
    public void remove(Department department)  throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "DELETE FROM DEPARTMENT WHERE id=?";

        try{
            preparedStatement = connection.prepareStatement(sql);

            preparedStatement.setInt(1, department.getId());

            preparedStatement.executeUpdate();
        } catch (SQLException e){
            e.printStackTrace();
        } finally {
            if(preparedStatement != null){
                preparedStatement.close();
            }
            if(connection != null){
                connection.close();
            }
        }
    }
}
