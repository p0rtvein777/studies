package service;

import bl.Util;
import dao.InspectorDAO;
import entity.Inspector;
import entity.InspectorPosition;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class InspectorService extends Util implements InspectorDAO {

    Connection connection = getConnection();

    @Override
    public void add(Inspector inspector) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "INSERT INTO INSPECTOR VALUES(?, ?, ?, ?, ?, ?)";
        /*previous one wont work, use the one below
        String sql = "INSERT INTO DEPARTMENT VALUES(?, ?, ?, ?)";
        */

        try {
            preparedStatement = connection.prepareStatement(sql);

            preparedStatement.setInt(1, inspector.getId());
            preparedStatement.setString(2, inspector.getName());
            preparedStatement.setString(3, inspector.getSurname());
            preparedStatement.setString(4, inspector.getPhone());
            preparedStatement.setString(5, inspector.getPosition().toString());
            preparedStatement.setInt(6, inspector.getDepartmentId());

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
    public List<Inspector> getAll() throws SQLException {
        List<Inspector> inspectorList = new ArrayList<>();

        String sql = "SELECT * FROM INSPECTOR";

        Statement statement = null;

        try {
            statement = connection.createStatement();

            ResultSet resultSet = statement.executeQuery(sql);

            while (resultSet.next()) {
                Inspector inspector = new Inspector();
                inspector.setId(resultSet.getInt("id"));
                inspector.setName(resultSet.getString("name"));
                inspector.setSurname(resultSet.getString("surname"));
                inspector.setPosition(InspectorPosition.valueOf(resultSet.getString("position")));
                inspector.setPhone(resultSet.getString("phone"));
                inspector.setDepartmentId(resultSet.getInt("department_id"));

                inspectorList.add(inspector);
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
        return inspectorList;
    }

    @Override
    public Inspector getByID(Integer id) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "SELECT * FROM INSPECTOR WHERE ID=?";

        Inspector inspector = new Inspector();

        try {
            preparedStatement = connection.prepareStatement(sql);
            preparedStatement.setInt(1, id);

            ResultSet resultSet = preparedStatement.executeQuery();

            inspector.setId(resultSet.getInt("id"));
            inspector.setName(resultSet.getString("name"));
            inspector.setSurname(resultSet.getString("surname"));
            inspector.setPosition(InspectorPosition.valueOf(resultSet.getString("position")));
            inspector.setPhone(resultSet.getString("phone"));
            inspector.setDepartmentId(resultSet.getInt("department"));

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
        return inspector;
    }

    @Override
    public void Update(Inspector inspector) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "UPDATE INSPECTOR SET name=?, surname=?, position=?, phone=?, department_id=? WHERE id=?";

        try{
            preparedStatement = connection.prepareStatement(sql);

            preparedStatement.setString(1, inspector.getName());
            preparedStatement.setString(2, inspector.getSurname());
            preparedStatement.setString(3, inspector.getPosition().toString());
            preparedStatement.setString(4, inspector.getPhone());
            preparedStatement.setInt(5, inspector.getDepartmentId());
            preparedStatement.setInt(6, inspector.getId());

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
    public void remove(Inspector inspector) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "DELETE FROM INSPECTOR WHERE id=?";

        try{
            preparedStatement = connection.prepareStatement(sql);

            preparedStatement.setInt(1, inspector.getId());

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
