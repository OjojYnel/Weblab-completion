<%-- 
    Document   : accepted
    Created on : 26-Dec-2018, 17:02:31
    Author     : Peralta, Melvin
--%>

<%@page import="java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Transaction Monitoring</title>
    </head>
    <body>
                <table> 
                    <tr>
                        <td><a href ="transactionMonitoring.jsp">All transaction</a></td>
                        <td><a href ="accepted.jsp">Ongoing transaction</a></td>
                        <td><a href ="denied.jsp">Denied transaction</a></td>
                        <td><a href ="completed.jsp">Completed transaction</a></td>
                    </tr>
                </table>
    <form>
        <input type="text" placeholder="Search" name="Search">
    </form> 
        <table>
            <th>Transaction Id</th>
            <th>Status</th>
            <th>Flower</th>
            <th>Action</th>
            
            <%
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/webtechlab","root","");         
            Statement stat = null; 
            ResultSet res = null; 
            stat = conn.createStatement();
            String query = request.getParameter("Search");
            String data; 
            if(query!=null){
                data = "SELECT transactionId, status, flower FROM transaction where status = 'ongoing' AND (transactionId like '%"+query+"%' or flower like '%"+query+"%')";
            }else{
                data = "SELECT transactionId, status, flower FROM transaction where status = 'ongoing'";
            }
            
            res = stat.executeQuery(data); 
    while(res.next()){
        %>
        <tr>
                    <td><%=res.getString("transactionId")%></td>
                    <td><%=res.getString("status")%></td>
                    <td><%=res.getString("flower")%></td>
                </tr>
                <%}
%>
        </table>
    </body>
</html>

