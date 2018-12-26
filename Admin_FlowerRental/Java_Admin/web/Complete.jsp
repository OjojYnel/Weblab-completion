<%-- 
    Document   : Complete
    Created on : 26-Dec-2018, 16:55:05
    Author     : Peralta, Melvin
--%>

<%@page import="java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<%
String c = request.getParameter("tId"); 
Class.forName("com.mysql.jdbc.Driver").newInstance();
Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/webtechlab","root","");
Statement stmt = conn.createStatement();        
stmt.executeUpdate("UPDATE transaction SET status = 'completed' WHERE transactionId='"+c+"'");
response.sendRedirect("transactionMonitoring.jsp");
%>