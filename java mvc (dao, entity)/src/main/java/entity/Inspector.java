package entity;

import java.util.Objects;

public class Inspector {
    private Integer id;
    private String name;
    private String surname;
    private InspectorPosition position;
    private String phone;
    private Integer departmentId;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getSurname() {
        return surname;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }

    public InspectorPosition getPosition() {
        return position;
    }

    public void setPosition(InspectorPosition position) {
        this.position = position;
    }

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }

    public Integer getDepartmentId() {
        return departmentId;
    }

    public void setDepartmentId(Integer departmentId) {
        this.departmentId = departmentId;
    }

    public Inspector() {

    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Inspector inspector = (Inspector) o;
        return Objects.equals(id, inspector.id) &&
                Objects.equals(name, inspector.name) &&
                Objects.equals(surname, inspector.surname) &&
                position == inspector.position &&
                Objects.equals(phone, inspector.phone) &&
                Objects.equals(departmentId, inspector.departmentId);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, name, surname, position, phone, departmentId);
    }

    @Override
    public String toString() {
        return "Inspector{" +
                "id=" + id +
                ", name='" + name + '\'' +
                ", surname='" + surname + '\'' +
                ", position=" + position +
                ", phone='" + phone + '\'' +
                ", departmentId=" + departmentId +
                '}';
    }
}
