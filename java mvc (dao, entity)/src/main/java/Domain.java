import entity.*;
import service.DepartmentService;
import service.InspectorService;
import service.ReportService;
import service.UserService;

import java.sql.SQLException;
import java.util.Calendar;
import java.util.List;

public class Domain {

    public static void main(String[] args) {
        DepartmentService departmentService = new DepartmentService();
        InspectorService inspectorService = new InspectorService();
        ReportService reportService = new ReportService();
        UserService userService = new UserService();

        Department department = new Department();
        department.setId(1);
        department.setName("MainCityDept");
        department.setAddress("NYC 1st Street");
        department.setPhone("+1-23-456");

        Inspector inspector = new Inspector();
        inspector.setId(1);
        inspector.setName("John");
        inspector.setSurname("Smith");
        inspector.setPosition(InspectorPosition.base);
        inspector.setPhone("+1-23-4567");

        inspector.setDepartmentId(1);

        Calendar calendar = Calendar.getInstance();
        calendar.set(2019, Calendar.MAY, 12 );

        Report report = new Report();
        report.setId(1);
        report.setSubmitDate(new java.sql.Date(calendar.getTime().getTime()));
        report.setUser_id(1);
        report.setInspector_id(1);
        report.setVerification(ReportStatus.validated);
        report.setComments("Report is validated and done.");

        User user = new User();
        user.setId(1);
        user.setName("Jack");
        user.setSurname("Stones");
        user.setType(UserType.fiz);
        user.setAddress("NYC JamesSquare 12");
        user.setCompany("Out of company.");

        try{
            List<User> list = userService.getAll();
            for (User element: list
                 ) {
                System.out.println(element);
            }


            //departmentService.add(department);
            //inspectorService.add(inspector);
            //userService.add(user);
            //reportService.add(report);
        } catch(SQLException e){
            e.printStackTrace();
        }
    }
}
