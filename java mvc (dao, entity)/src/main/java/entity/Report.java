package entity;

import java.util.Date;
import java.util.Objects;

public class Report {
    private Integer id;
    private java.sql.Date submitDate;
    private Integer user_id;
    private Integer inspector_id;
    private ReportStatus verification;
    private String comments;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Date getSubmitDate() {
        return submitDate;
    }

    public void setSubmitDate(java.sql.Date submitDate) {
        this.submitDate = submitDate;
    }

    public Integer getUser_id() {
        return user_id;
    }

    public void setUser_id(Integer user_id) {
        this.user_id = user_id;
    }

    public Integer getInspector_id() {
        return inspector_id;
    }

    public void setInspector_id(Integer inspector_id) {
        this.inspector_id = inspector_id;
    }

    public ReportStatus getVerification() {
        return verification;
    }

    public void setVerification(ReportStatus verification) {
        this.verification = verification;
    }

    public String getComments() {
        return comments;
    }

    public void setComments(String comments) {
        this.comments = comments;
    }

    public Report() {
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Report report = (Report) o;
        return Objects.equals(id, report.id) &&
                Objects.equals(submitDate, report.submitDate) &&
                Objects.equals(user_id, report.user_id) &&
                Objects.equals(inspector_id, report.inspector_id) &&
                Objects.equals(verification, report.verification) &&
                Objects.equals(comments, report.comments);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, submitDate, user_id, inspector_id, verification, comments);
    }

    @Override
    public String toString() {
        return "Report{" +
                "id=" + id +
                ", submitDate=" + submitDate +
                ", user_id=" + user_id +
                ", inspector_id=" + inspector_id +
                ", verification=" + verification +
                ", comments='" + comments + '\'' +
                '}';
    }
}
