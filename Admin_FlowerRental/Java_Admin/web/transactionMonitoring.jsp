<%-- 
    Document   : transactionMonitoring
    Created on : 26-Dec-2018, 15:27:42
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
    <form>
        <input type="text" placeholder="Search" name="Search">
    </form> 
        <table>
            <th>Transaction Id</th>
            <th>Status</th>
            
            <%
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/webtechlab","root","");         
            Statement stat = null; 
            ResultSet res = null; 
            stat = conn.createStatement();
            String query = request.getParameter("Search");
            String data; 
            if(query!=null){
                data = "SELECT transactionId, status, flower FROM transaction where transactionId like '%"+query+"%' or status like '%"+query+"%' or flower like '%"+query+"%'";
            }else{
                data = "SELECT transactionId, status, flower FROM transaction";
            }
            
            res = stat.executeQuery(data); 
    while(res.next()){
        %>
        <tr>
                    <td><%=res.getString("transactionId")%></td>
                    <td><%=res.getString("status")%></td>
                    <td><%=res.getString("flower")%></td>
                    <td>
                        <a href='Accept.jsp?u=<%=res.getString("transactionId")%>'>Accept</a>
			<a href='Deny.jsp?dv=<%=res.getString("transactionId")%>'>Deny</a>
                    </td>
                </tr>
                <%}
%>
        </table>
    </body>
</html>
