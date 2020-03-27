package service;

import bl.Util;
import dao.ReportDAO;
import entity.Report;
import entity.ReportStatus;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ReportService extends Util implements ReportDAO {
    Connection connection = getConnection();

    @Override
    public void add(Report report) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "INSERT INTO REPORT VALUES(?, ?, ?, ?, ?, ?)";

        try {
            preparedStatement = connection.prepareStatement(sql);

            preparedStatement.setInt(1, report.getId());
            preparedStatement.setDate(2, (Date) report.getSubmitDate());
            preparedStatement.setInt(3, report.getUser_id());
            preparedStatement.setInt(4, report.getInspector_id());
            preparedStatement.setString(5, report.getVerification().toString());
            preparedStatement.setString(6, report.getComments());

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
    public List<Report> getAll() throws SQLException {
        List<Report> reportList = new ArrayList<>();

        String sql = "SELECT * FROM REPORT";

        Statement statement = null;

        try {
            statement = connection.createStatement();

            ResultSet resultSet = statement.executeQuery(sql);

            while (resultSet.next()) {
                Report report = new Report();
                report.setId(resultSet.getInt("id"));
                report.setSubmitDate(resultSet.getDate("submit_date"));
                report.setUser_id(resultSet.getInt("user_id"));
                report.setInspector_id(resultSet.getInt("inspector_id"));
                report.setVerification(ReportStatus.valueOf(resultSet.getString("verification")));
                report.setComments(resultSet.getString("comments"));

                reportList.add(report);
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
        return reportList;
    }

    @Override
    public Report getByID(Integer id) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "SELECT * FROM REPORT WHERE ID=?";

        Report report = new Report();

        try {
            preparedStatement = connection.prepareStatement(sql);
            preparedStatement.setInt(1, id);

            ResultSet resultSet = preparedStatement.executeQuery();

            report.setId(resultSet.getInt("id"));
            report.setSubmitDate(resultSet.getDate("submit_date"));
            report.setUser_id(resultSet.getInt("user_id"));
            report.setInspector_id(resultSet.getInt("inspector_id"));
            report.setVerification(ReportStatus.valueOf(resultSet.getString("verification")));
            report.setComments(resultSet.getString("comments"));

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
        return report;
    }

    @Override
    public void Update(Report report) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "UPDATE REPORT SET submit_date=?, user_id=?, inspector_id=?, verification=?, comments=? WHERE id=?";

        try {
            preparedStatement = connection.prepareStatement(sql);

            preparedStatement.setDate(1, (Date) report.getSubmitDate());
            preparedStatement.setInt(2, report.getUser_id());
            preparedStatement.setInt(3, report.getInspector_id());
            preparedStatement.setString(4, report.getVerification().toString());
            preparedStatement.setString(5, report.getComments());
            preparedStatement.setInt(6, report.getId());

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
    public void remove(Report report) throws SQLException {
        PreparedStatement preparedStatement = null;

        String sql = "DELETE FROM REPORT WHERE id=?";

        try {
            preparedStatement = connection.prepareStatement(sql);

            preparedStatement.setInt(1, report.getId());

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
