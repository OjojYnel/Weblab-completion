/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WebtechLec;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet(name = "SAadmin", urlPatterns = {"/SAadmin"})
public class SAadmin extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException, SQLException {
        response.setContentType("text/html;charset=UTF-8");

            response.setContentType("text/html");
            try (PrintWriter out = response.getWriter()) {
            RequestDispatcher rd = request.getRequestDispatcher("/WEB-INF/pagefragments/SAheader.html");
            rd.include(request, response);
            HttpSession session = request.getSession(false);
            if(session == null){
                response.sendRedirect("index.html");
            }else {
            ConnectDB db = new ConnectDB();
            Connection conn = db.getConn();
            String stmt;
                out.println("<h1>All Accounts List</h1><br>");
                out.println("<form action=\"SAcust\" method=\"POST\">");
                out.println("<input type=\"submit\" value=\"Customer\"></form>");
                out.println("<form action=\"SAadmin\" method=\"POST\">");
                out.println("<input type=\"submit\" value=\"Admin\"></form>");
                out.println("<form action=\"SAsp\" method=\"POST\">");
                out.println("<input type=\"submit\" value=\"Service Provider\"></form>");
                stmt = "select account_id, username, email, account_type, activate from accounts where status='a' and account_type='a' or account_type='sa';";
                PreparedStatement ps = conn.prepareStatement(stmt);
                ResultSet rs = ps.executeQuery();
                String table = "    <table>"
                        + "     <tr>"
                        + "         <th>Username</th>"
                        + "         <th>Email</th>"
                        + "         <th>Account Type</th>"
                        + "         <th>Status</th>"
                        + "         <th>Activate/Deactivate</th>"
                        + "     </tr>";
                out.println(table);
                while(rs.next()){
                        out.println("           <tr>");
                        out.println("               <td>"+rs.getString("username")+"</td>");
                        out.println("               <td>"+rs.getString("email")+"</td>");
                        out.println("               <td>"+rs.getString("account_type")+"</td>");
                        out.println("               <td>"+rs.getString("activate")+"</td>");
                        out.println("               <td>"+"<form method=\"post\" action=\"SAActivateAccountServlet\">
                                                    <input type='text' value=" + rs.getString("email") + " style='display:none;' name='email'>
                                                    <input type='text' value=" + rs.getString("account_id") + " style='display:none;' name='hiddenid'>
                                                    <input type='submit' value='activate' id='A' name='activate'><input type='submit' value='deactivate' id='DA' name='deactivate'>
                                                    </form></td>");
                        out.println("           </tr>");
                }
                out.println("   </table>");

            rd = request.getRequestDispatcher("/WEB-INF/pagefragments/SAfooter.html");
            rd.include(request, response);
        }
    }
    }


    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (SQLException ex) {
            Logger.getLogger(SAadmin.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (SQLException ex) {
            Logger.getLogger(SAadmin.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
