package mypackage;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class LogIn
 */
@WebServlet("/LogIn")
public class LogIn extends HttpServlet 
{   
  private static final long serialVersionUID = 1L;
  
  public LogIn() {
        super();
        // TODO Auto-generated constructor stub
    }
  
  protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException 
     {
        res.setContentType ("text/html");
        PrintWriter out = res.getWriter ();  
        out.print ("<html>\n");
        out.print ("   <head>\n");
        out.print ("   <meta charset=\"UTF-8\">");
        out.print ("      <title>WelcomeUser</title>\n");
        out.print ("      <link rel=\"stylesheet\" type=\"text/css\"href=\"WelcomeUser.css\"/> ");
        out.print ("   </head>\n");
        out.print ("   <body>\n");
        out.print ("      <center><h2>Time Savvy</h2></center>\n");
        out.print ("      <hr />\n"); 
        String un = req.getParameter("username"); 
        out.print ("<h3><center> Welcome!");
        out.print (un);
        out.print (":)");
        out.print("</center></h3>\n");
        out.print("<center><a href=\"http://192.168.64.3/TimeSavvy/index.php\">Click here to start your Motivational Agenda!</a></center>");
        out.print ("      </font>\n");
        out.print ("   </body>\n");
        out.print ("</html>\n");
        out.close (); 
  
      }

}