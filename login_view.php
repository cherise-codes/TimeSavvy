<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LogInSignUp page</title>
<link rel="stylesheet" type="text/css"href="log_in.css"/>
<link href="css/icono.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<div class="MainPage">
    <div class="MainPage-Container">

      <!--  <ul calss="swithcer">
            <li ><a href="#0">Log In</a></li>
            <li ><a href="#0">New Account</a></li>
        </ul>-->

         <div class="col-md-offset-3 col-md-6">

            <div class="tab" > <!--tab form-->
                <button class="tablinks" onclick="openWindow(event, 'LogIn')" >Log In</button>
                <button class="tablinks" onclick="openWindow(event, 'NewAccount')">Sign Up</button>
            </div>

            <div id="LogIn" class="tabcontent">   <!--login form-->
                <form class="form-horizontal"  method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                <span class="heading">Time Savvy</span>
                <div class="form-group">
                    <input type="text" class="form-control" id="LogInEmail"
                    value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
                    <i class="fa fa-user"></i>

                </div>
                <div class="form-group">
                     <input type="password" class="form-control" id="userPassword0" placeholder="Set a password"/>
                    <i class="fa fa-lock"></i>
                    <img class="icon-img" id="ShowHide_img0" onclick="ShowHidePsw0()"   src="hide.png">
                </div>
                <div class="form-group">
                    <div class="main-checkbox">
                        <input type="checkbox" value="None" id="checkbox1" name="check"/>
                        <label for="checkbox1"></label>
                    </div>
                    <span class="text">Remember me</span>
                    <button type="submit" class="btn btn-default">Log In</button>
                </div>

               </form>
              <div class="bottom-message">
                <p><a href="#0">Forgot your password?</a></p>
              </div>
            </div>

            <div id="NewAccount" class="tabcontent">  <!--NewAccount form-->
                <form class="form-horizontal"  method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                <span class="heading">Join Time Savvy Now!</span>
                <div class="form-group">
                    <input type="text" class="form-control" name="UserName" placeholder="Set your Username" autofocus required autocomplete required/>
                    <i class="fa fa-user"></i>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="NewAccountEmail" placeholder="Please input your email address" autofocus required autocomplete required/>
                 <i class="fa fa-envelope"></i>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="userPassword1" placeholder="Set a password"/>
                    <i class="fa fa-lock"></i>
                    <img class="icon-img" id="ShowHide_img1" onclick="ShowHidePsw1()"    src="hide.png">
                </div>
                <div class="form-group">
                    <div class="main-checkbox">
                        <input type="checkbox" value="None" id="checkbox2" name="check"/>
                        <label for="checkbox2"></label>
                    </div>
                    <span class="text">I agree to</span><span class="text"><a href="#0">Terms</a></span>
                    <button type="submit" class="btn btn-default">Sign Up</button>
                </div>
                </form>
              <div class="bottom-message">
                <p><a href="CreateProfile.html">Create personal profile in detail?</a></p>
              </div>


            </div>
        </div>
    </div>
</div>



<script >  /*ShowHide eye-icon*/

        var ShowHide_img0 = document.getElementById("ShowHide_img0");
        var userInput0 = document.getElementById("userPassword0");
        //hide text block，show password block
        function ShowHidePsw0(){
            console.log("login");
            if (userInput0.type == "password")
            {
                console.log("logInShow");
                userInput0.type = "text";
                ShowHide_img0.src ="show.png";
            }else {
                console.log("logInHide");
                userInput0.type = "password";
                ShowHide_img0.src = "hide.png";
            }
        }

        var ShowHide_img = document.getElementById("ShowHide_img1");
        var userInput = document.getElementById("userPassword1");
        //hide text block，show password block
        function ShowHidePsw1(){
            console.log("signUp");
            if (userInput.type == "password")
            {
                console.log("signUpShow");
                userInput.type = "text";
                ShowHide_img.src ="show.png";
            }else {
                console.log("signUpHide");
                userInput.type = "password";
                ShowHide_img.src = "hide.png";
            }
        }

    /*Tab Switcher*/
    function openWindow(evt,pageName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(pageName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

<?php
$ans1 = $feedback = NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if (empty($_POST['username']))
      echo "<font color='grey'><i>Set your Username</i></font> <br />";
   else
   {
      $username = trim($_POST['username']);      // trim() remove leading space

      echo "you successfully logged in" . $_POST['UserName'];
      $feedback = "Correct!";
   }
}



 ?>

</body>
</html>