package dao;

import entity.Report;

import java.sql.SQLException;
import java.util.List;

public interface ReportDAO {

    //create
    void add(Report report) throws SQLException;

    //read
    List<Report> getAll() throws SQLException;

    Report getByID(Integer id) throws SQLException;

    //update
    void Update(Report report) throws SQLException;

    //delete
    void remove(Report report) throws SQLException;
}
