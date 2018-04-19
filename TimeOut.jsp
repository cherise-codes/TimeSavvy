<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>TimeSavvy TimeOut</title>
<style>
	body {
		text-align: center;
		font-size: 40px;
		margin-top: 200px;
		animation-name: mymove;
		animation-duration: 6s;
		animation-iteration-count: infinite;
	}
	.box {
		background: rbga(0, 0, 0, 0.5)
	}
	@keyframes mymove {
    	0% 	{background-color: #c0e9ea;}
    	50% {background-color: #d4c3d8;}
    	100% {background-color: #c0e9ea;}
}
</style>
</head>
<body>
<div class="box">
<p class="uhoh"> Uh Oh! </p>
	<p>You have attempted to log in too many times. Please try again later. </p>
	<p style="position:bottom;">Your session ID is <%= request.getParameter("error") %> </p>
	</div>
</body>
</html>