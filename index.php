<!-- calendar starter code from https://davidwalsh.name/php-calendar -->
<DOCTYPE HTML>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>  <!-- required to handle IE -->
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="calendar.css?1422585377" type="text/css" />

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        
        <script src = "bootstrap/js/bootstrap.js"></script>
        


        <title> Time Savvy </title>

    </head>

    <body style="margin:50 30 30 30">
        <div class="container-fluid">

            <!-- referenced w3 site to learn how to use bootstrap's modal feature -->
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <h3 class="modal-title" id="exampleModalLongTitle">Preferences</h3>
              </div>
              <form action="http://localhost:8080/webprj/TimeSavvy" method="get">
              <div class="modal-body">
                   
                    Select what type of motivational messages you would like to receive:
                    <br>
                    
                    <input type="radio" name="motivationType" value="gentle"> Gentle <br>
                    <input type="radio" name="motivationType" value="neutral" checked> Neutral <br>
                    <input type="radio" name="motivationType" value="aggressive"> Aggressive
                    <br/>
                    <br/>
                    <input type="checkbox" name="notifications" value="none"> None <br/>
 

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="send btn btn-primary">Save changes</button>

            </div>
       </form>
    </div>
</div>
</div>

<header>

                <!-- 4. add navbar (code from getbootstrap.com >> components >> navbar) -->

                    <!-- try
                     navbar-static-top
                     - creates a full-width navbar that scrolls away with the page
                     - removes the left, right, and top border created by navbar-default
                     navbar-fixed-top
                     - creates a full-width navbar that sticks to the page
                     
                     navbar-inverse sets background to dark color scheme
                 -->

                 <!-- <nav class="navbar navbar-inverse navbar-static-top"> -->
                    <!-- <nav class="navbar navbar-inverse navbar-default">   -->
                        <nav class="navbar navbar-inverse navbar-fixed-top">

                        <!-- 5. bootstrap requires a containing element to wrap site contents.
                         There are two container classes to choose from (based on the above css bootstrap):
                         (1) .container class provides a responsive fixed width container
                         (2) .container-fluid class provides a full width container, spanning
                         the entire width of the view point
                         Both .container and .container-fluid set a max-width on the content
                         and cause the center alignment
                     -->
                     <div class="container">
                        <div class="navbar-header">

                                <!-- 6. The button is hidden on desktop and becomes a dropdown hamburger menu on mobile.
                                 The navigation bar is hidden on small screens and
                                 replaced by a button in the top right corner (try to re-size this window).
                                 Only when the button (hamburger menu) is clicked, the navigation bar will be displayed.
                                 (each <span class="icon-bar"> is a line in the hamburger menu)
                                 -->
                                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="index.php">Time Savvy <?php if (isset($_POST['motType'])) { echo $_POST['motType']; } ?> </a>
                                
                            </div>
                            
                            <!-- 7. nav-collapse makes it possible to expand and collapse the menu
                             require: javascript plugin (we use js bootstrap here, at the bottom)
                             
                             commonly, lists with links are used for navigation
                         -->
                         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="login_view.html">Log In</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Social<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Development</a></li>
                                        <li><a href="#">Consulting</a></li>
                                    </ul>
                                </li>
                                <li><a href="#myModal" data-toggle="modal" data-target="#myModal" class="pref">Preferences</a></li>

                                
                                
                               

                            </div>
                        </div>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="row">


                <!--<a href="#" id="popover" data-toggle="popover" title="Popover Header" data-content="Tasks">Toggle popover</a> -->
                
                <div class="col-sm-8">

                    <?php
                    require 'vendor/autoload.php';


                    /* draws a calendar */
                    function draw_calendar($month,$year){

                        /* draw table */
                        $calendar = '<table cellpadding="0" cellspacing="0" class="calendar" />';

                        /* table headings */
                        $headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
                        $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

                        /* days and weeks vars now ... */
                        $running_day = date('w',mktime(0,0,0,$month,1,$year));
                        $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
                        $days_in_this_week = 1;
                        $day_counter = 0;
                        $dates_array = array();

                        /* row for week one */
                        $calendar.= '<tr class="calendar-row">';

                        /* print "blank" days until the first of the current week */
                        for($x = 0; $x < $running_day; $x++):
                            $calendar.= '<td class="calendar-day-np"> </td>';
                            $days_in_this_week++;
                        endfor;

                            /* edited code to show what the current day is
                             - added if/else statement
                             - added $now variable to get what the current date is
                             - added id current day to allow for css rules to be added
                             */
                             $now = new Moment\Moment();
                             if ($now->getMonth() == $month && $now->getYear() == $year){

                                /* keep going with days.... */
                                for($list_day = 1; $list_day <= $days_in_month; $list_day++){
                                    if ($list_day == ($now->getDay())){
                                        $date = (string)($now->format('F j, o'));
                                        $day = '<td class="calendar-day" id="current-day" onclick="newPopper(this, \'' . $date . ' \')" />';

                                        $calendar.= $day;
                                        
                                        
                                        /* add in the day number */
                                        $num = '<div class="day-number" id="current-num">'.$list_day.'</div>';
                                        $calendar.= $num;
                                        
                                        $calendar.= str_repeat('<p> </p>',1);
                                        
                                        $calendar.= '</td>';
                                        if($running_day == 6):
                                            $calendar.= '</tr>';
                                            if(($day_counter+1) != $days_in_month):
                                                $calendar.= '<tr class="calendar-row">';
                                            endif;
                                            $running_day = -1;
                                            $days_in_this_week = 0;
                                        endif;
                                        $days_in_this_week++; $running_day++; $day_counter++;
                                    }
                                    else{
                                        $date = $list_day . '-' . $month . '-' . $year;
                                        
                                        
                                        $date = date('F j, o', strtotime($date));
                                        $calendar.= '<td class="calendar-day" onclick="newPopper(this, \'' . $date . ' \')" />';
                                        /* add in the day number */
                                        $calendar.= '<div class="day-number">'.$list_day.'</div>';
                                        
                                        $calendar.= str_repeat('<p> </p>',1);
                                        
                                        $calendar.= '</td>';
                                        if($running_day == 6):
                                            $calendar.= '</tr>';
                                            if(($day_counter+1) != $days_in_month):
                                                $calendar.= '<tr class="calendar-row">';
                                            endif;
                                            $running_day = -1;
                                            $days_in_this_week = 0;
                                        endif;
                                        $days_in_this_week++; $running_day++; $day_counter++;
                                    }
                                    
                                }
                            }
                            else {
                                for($list_day = 1; $list_day <= $days_in_month; $list_day++){
                                    $date = date('F j, o', strtotime($date));
                                    $calendar.= '<td class="calendar-day" onclick="newPopper(this, \'' . $date . ' \')" />';
                                    /* add in the day number */
                                    $calendar.= '<div class="day-number">'.$list_day.'</div>';
                                    $calendar.= str_repeat('<p> </p>',2);
                                    $calendar.= '</td>';
                                    if($running_day == 6):
                                        $calendar.= '</tr>';
                                        if(($day_counter+1) != $days_in_month):
                                            $calendar.= '<tr class="calendar-row">';
                                        endif;
                                        $running_day = -1;
                                        $days_in_this_week = 0;
                                    endif;
                                    $days_in_this_week++; $running_day++; $day_counter++;
                                }
                            }
                            
                            
                            
                            
                            
                            /* finish the rest of the days in the week */
                            if($days_in_this_week < 8 && $days_in_this_week !=1):
                                for($x = 1; $x <= (8 - $days_in_this_week); $x++):
                                    $calendar.= '<td class="calendar-day-np"> </td>';
                                endfor;
                            endif;
                            
                            /* final row */
                            $calendar.= '</tr>';
                            
                            /* end the table */
                            $calendar.= '</table>';
                            
                            

                            
                            /* all done, return result */
                            return $calendar;
                        }
                        /*-- own code to create calendar based on current month and year*/

                        $m = new Moment\Moment();
                        $month = '<span class="month">' . $m->format('F o') . '</span>';
                        echo $month;
                        $cal = draw_calendar(($m->getMonth()), ($m->getYear()));
                        echo $cal;



                        ?>
                    </div>


                    <!-- own code based on inclass toDo demo -->
                    <div class="col-sm-4">
                        <div class="todo">
                            <h2 style="font-family:Didot; font-weight:bold;"> Upcoming Events
                                <button class="btn btn-link btn-m" style="margin-left:20px; margin-top:-8px;"data-toggle="collapse" data-target="#addTask">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </h2>
                            <br/>
                            <div id="addTask" class="collapse">

                                <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                    <div class="form-group">
                                        <label for="task">Task:</label>
                                        <input style="background:rgba(255,255,255,0.5)" type="text" class="form-control" id="task" placeholder="What do you need to do?">
                                    </div>
                                    <div class="form-group">
                                        <label for="due">Due Date:</label>
                                        <input style="background:rgba(255,255,255,0.5)" type="text" class="form-control" id="due" placeholder="When should it be done?">
                                    </div>

                                    <input type="submit" class="btn btn-submit" onclick="addTask()" style="background:light gray; color:white;"/>
                                </form>
                            </div>
                            <table id="todoTable">
                                <thead>
                                    <tr>
                                        <th style="width:200; font-weight:bold;">Task</th>
                                        <th style="width:130; font-weight:bold;">Due Date</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>

                    <script type="text/javascript">

                        function Task(t, d, c) {
                            this.task = t;
                            this.due = d;
                            this.complete = c;
                        }

                        var tasks = [];

                        <!-- own code based on in class demo -->
                        function addTask() {

                            if (document.getElementById("task").value == "" || document.getElementById("due").value == "") {
                                window.alert("Please complete all fields to add a task.");
                            }
                            else {
                                var task = document.getElementById("task").value;
                                var due = document.getElementById("due").value;
                                var newTask = new Task(task, due, false);
                                tasks.push(newTask);
                                tasks.sort(function(a, b){return a.due.getTime() - b.due.getTime()});
                                console.log(tasks);
                                var todo = document.getElementById("todoTable");

                                var newRow = todo.insertRow(todo.rows.length);
                                newRow.style = "border-top:1px solid black";
                                var newCell = newRow.insertCell(0);
                                newCell.innerHTML = task;

                                newCell = newRow.insertCell(1);
                                newCell.innerHTML = due;
                                document.getElementById("task").value = "";
                                document.getElementById("due").value = "";
                                sortTable();
                            }
                        }

                        function addTask(t, d) {

                                var task = t;
                                var due = d;

                                var todo = document.getElementById("todoTable");

                                var newRow = todo.insertRow(todo.rows.length);
                                newRow.style = "border-top:1px solid black";
                                var newCell = newRow.insertCell(0);
                                newCell.innerHTML = task;

                                newCell = newRow.insertCell(1);
                                newCell.innerHTML = due;
                                document.getElementById("task").value = "";
                                document.getElementById("due").value = "";
                                sortTable();
                            }


                            function newPopper(x, y) {
                                var task = window.prompt("Add Task for " + y);

                                if (task) {
                                    var y = new Date(y);
                                    var newTask = new Task(task, y, false);
                                    tasks.push(newTask);
                                    tasks.sort(function(a, b){return a.due.getTime() - b.due.getTime()});
                                    console.log(tasks);
                                    addTask(newTask.task, newTask.due);
                                    x.innerHTML += '&bull; ' + task + '<br/>';
                                }

                            }

                            //sort table code from w3 tutorial
                            function sortTable() {
                                var table, rows, switching, i, x, y, shouldSwitch;
                                table = document.getElementById("todoTable");
                                
                                rows = table.getElementsByTagName("TR");
                                
                                for (i = 1; i < (rows.length - 1); i++) {
                                    switching = false;
                                    
                                    x = rows[i].getElementsByTagName("TD")[1];

                                    for (n = 1; n < (rows.length - 1); n++) {
                                        shouldSwitch = false;
                                        
                                        y = rows[n].getElementsByTagName("TD")[1];

                                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                            rows[i].parentNode.insertBefore(rows[n], rows[i]);
                                            
                                        }
                                    }
                                   
                              }
                          }






                    </script>
                </div>
            </div>
        </body>
        </html>
