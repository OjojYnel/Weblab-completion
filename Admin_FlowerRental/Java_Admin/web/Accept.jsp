<%-- 
    Document   : Accept
    Created on : 26-Dec-2018, 16:02:09
    Author     : Peralta, Melvin
--%>
<%@page import="java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<%
String b = request.getParameter("u"); 
Class.forName("com.mysql.jdbc.Driver").newInstance();
Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/webtechlab","root","");
Statement stmt = conn.createStatement();        
stmt.executeUpdate("UPDATE transaction SET status = 'ongoing' WHERE transactionId='"+b+"'");
response.sendRedirect("transactionMonitoring.jsp");
%>


