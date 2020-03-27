package dao;

import entity.User;

import java.sql.SQLException;
import java.util.List;

public interface UserDAO {

    //create
    void add(User user) throws SQLException;

    //read
    List<User> getAll() throws SQLException;

    User getByID(Integer id) throws SQLException;

    //update
    void Update(User user) throws SQLException;

    //delete
    void remove(User user) throws SQLException;
}
