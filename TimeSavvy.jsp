<%@ page language="java" contentType="text/html; charset=UTF-8"
pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>TimeSavvy JSP</title>

	<style>
		body {
			margin:30px;
			text-align: right;
			font-family: Garamound;
		}
</style>
</head>
<body>

	<%@ page language="java" %>
	<% session.setMaxInactiveInterval(2);%>
	
	<%! 
  // use JSP declaration to keep track visitors 
  
  int visitCount = 0;
  void addCount() 
  {
     visitCount++;
  }
%>
<% addCount(); %>


<% if (visitCount < 5) { %>
<!-- uses jsp expression to print out number of visits -->
	Incorrect Log In <br/>
	You have attempted to log in <%= visitCount %> times.
	<jsp:include page="login_view.html" />
<% }
else { 
	%>
	<jsp:forward page="TimeOut.jsp">
		<jsp:param name="error" value='<%= session.getId() %>' />
	</jsp:forward>

<% } %>

</body>
</html>