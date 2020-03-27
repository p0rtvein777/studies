package service;

import bl.Util;
import dao.UserDAO;
import entity.User;
import entity.UserType;

import java.sql.*;
import java.util.List;
import java.util.ArrayList;

public class UserService extends Util implements UserDAO {
    Connection connection = getConnection();

    @Override
    public void add(User user) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "INSERT INTO USER VALUES(?, ?, ?, ?, ?, ?)";

        try {
            preparedStatement = connection.prepareStatement(sql);

            preparedStatement.setInt(1, user.getId());
            preparedStatement.setString(2,user.getName());
            preparedStatement.setString(3, user.getSurname());
            preparedStatement.setString(4, user.getType().toString());
            preparedStatement.setString(5, user.getAddress());
            preparedStatement.setString(6, user.getCompany());


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
    public List<User> getAll() throws SQLException {
        List<User> userList = new ArrayList<>();

        String sql = "SELECT * FROM USER";

        Statement statement = null;

        try {
            statement = connection.createStatement();

            ResultSet resultSet = statement.executeQuery(sql);

            while (resultSet.next()) {
                User user = new User();
                user.setId(resultSet.getInt("id"));
                user.setName(resultSet.getString("name"));
                user.setSurname(resultSet.getString("surname"));
                user.setType(UserType.valueOf(resultSet.getString("type")));
                user.setAddress(resultSet.getString("address"));
                user.setCompany(resultSet.getString("company"));

                userList.add(user);
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
        return userList;
    }

    @Override
    public User getByID(Integer id) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "SELECT * FROM USER WHERE ID=?";

        User user = new User();

        try {
            preparedStatement = connection.prepareStatement(sql);
            preparedStatement.setInt(1, id);

            ResultSet resultSet = preparedStatement.executeQuery();

            user.setId(resultSet.getInt("id"));
            user.setName(resultSet.getString("name"));
            user.setSurname(resultSet.getString("surname"));
            user.setType(UserType.valueOf(resultSet.getString("type")));
            user.setAddress(resultSet.getString("address"));
            user.setCompany(resultSet.getString("company"));

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
        return user;
    }

    @Override
    public void Update(User user) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "UPDATE USER SET name=?, surname=?, type=?, address=?, company=? WHERE id=?";

        try {
            preparedStatement = connection.prepareStatement(sql);

            preparedStatement.setString(1,user.getName());
            preparedStatement.setString(2, user.getSurname());
            preparedStatement.setString(3, user.getType().toString());
            preparedStatement.setString(4, user.getAddress());
            preparedStatement.setString(5, user.getCompany());
            preparedStatement.setInt(6, user.getId());

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
    public void remove(User user) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "DELETE FROM USER WHERE id=?";

        try {
            preparedStatement = connection.prepareStatement(sql);

            preparedStatement.setInt(1, user.getId());

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
}
