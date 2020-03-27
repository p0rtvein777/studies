package dao;

import entity.Inspector;

import java.sql.SQLException;
import java.util.List;

public interface InspectorDAO {

    //create
    void add(Inspector inspector) throws SQLException;

    //read
    List<Inspector> getAll() throws SQLException;

    Inspector getByID(Integer id) throws SQLException;

    //update
    void Update(Inspector inspector) throws SQLException;

    //delete
    void remove(Inspector inspector) throws SQLException;
}
