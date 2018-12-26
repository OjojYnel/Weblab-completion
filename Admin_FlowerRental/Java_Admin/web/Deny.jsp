<%-- 
    Document   : Deny
    Created on : 26-Dec-2018, 16:10:45
    Author     : Peralta, Melvin
--%>

<%@page import="java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<%
String a = request.getParameter("Id"); 
Class.forName("com.mysql.jdbc.Driver").newInstance();
Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/webtechlab","root","");
Statement stmt = conn.createStatement();        
stmt.executeUpdate("UPDATE transaction SET status = 'denied' WHERE transactionId='"+a+"'");
response.sendRedirect("transactionMonitoring.jsp");
%>
