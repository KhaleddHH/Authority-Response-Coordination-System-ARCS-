<?php
    session_start();
    if (!isset($_SESSION["username"])){
        header("location:../index.php");
    }
?>

<span style="font-family: verdana, geneva, sans-serif;">
  <!DOCTYPE html>

  <head>
    <title>History</title>
    <link rel="stylesheet" href="../user-dashboard/styling/admin-dashboard-styling.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  </head>

  <body>
  <header class="header">
      <div class="logo">
        <a href="#">Authority Response Coordination System (ARCS)</a>
      </div>
  
      <div class="profile-section">
        <div class="account">
          <img src="images/KOUSSA.png" alt="">
          <h4><?php echo $_SESSION["username"];?></h4>
        </div>
      </div>
    </header>
    <div class="container">
      <nav>
        <div class="side-nav">
          <span>Main Menu</span>
          <a href="admin-dashboard.php"  >Admin Dashboard</a>
          <a href="incidents.php" >Incident Reports</a>
          <a href="manage-users.php" class="active">Manage users</a>
          
  
          <div class="links">
            <span></span>
            <!-- <a href="metrics.html">Metrics</a> -->
            <a href="../pages/logout.php">Logout</a>
          </div>
        </div>
      </nav>
      <div class="main-body">
        <div class="user-form" style="width: 15%;display:block;float:left;";>
          <h1>Add User</h1>
          <form action="scripts/add-user.php" method="POST" id="submit-form">
            <label for="username">Username</label>
            <br>
            <input type="text" name="username" id="username" class="text-field" >
            <br>
            <label for="password">Password</label>
            <br>
            <input type="password" name="password" id="password" class="text-field">
            <br>
            <label for="confirm-password">Confirm password</label>
            <br>
            <input type="password" name="confirm-password" id="confirm-password" class="text-field">
            <br>
            <label for="first-name">First name</label>
            <br>
            <input type="text" name="first-name" id="first-name" class="text-field" >
            <br>
            <label for="last-name">Last name</label>
            <br>
            <input type="text" name="last-name" id="last-name" class="text-field" >
            <br>
            <label for="email">Email</label>
            <br>
            <input type="text" name="email" id="email" class="text-field" >
            <br>
            <label for="date-of-birth">Date of birth</label>
            <br>
            <input type="date" name="date-of-birth" id="date-of-birth">
            <br>
            <label for="permission">Permission</label>
            <br>
            <select name="permission" id="permission" class="text-field">
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
            <br>

          </form>


        <input type="button" value="Add" onclick="add()" id="submit-button" class="submit-button">
        </form>
        </div>
        <div class="history_lists" style="width: 70%;display:block;float:left;margin-left:5%;">
          <div class="list1">
          <div class="row">
              <h1 class="sub-page-title">Delete User</h1>
            </div>
            <table>
              <thead>
                <tr>
                

                <th>Username</th>
                  <th>Password</th>
                  <th>Permission</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Date of birth</th>
                </tr>
              </thead>
              <tbody>
              <?php

              $file = fopen("../csv/users.csv", "r");
              $t = 0;

              while (($row = fgetcsv($file)) !== false) {
                if($t == 0) {
                  $t = $t + 1;
                  continue;
                }
                $username = $row[0];
                $password =  $row[1];
                $permission =  $row[2];
                $first_name =  $row[3];
                $last_name =  $row[4];
                $email =  $row[5];
                $dob =  $row[6];
                echo '<tr>';
                echo '<td>' . $username.'</td>' ;
                echo '<td ><input class="pass-input" type="password" id="'.$username.'" value="'.$password.'" readonly></td>' ;
                echo '<td>' . $permission.'</td>' ;
                echo '<td>' . $first_name.'</td>' ;
                echo '<td>' . $last_name.'</td>' ;
                echo '<td>' . $email.'</td>' ;
                echo '<td>' . $dob.'</td>' ;
                  echo '<td><a  class="fake-button-2" href="scripts/delete-user.php?user='.$username.'">Delete</a></td>';
                  echo '<td><button onClick="viewPassword('."'" .$username. "'" . ')">Toggle Password</button></td>';
                echo '</tr>';
              }
            
            ?>
                
              </tbody>
            </table>
          
              
            </div>
           
          </div>
          </div>
      </div>




    </div>
    <script>
      function viewPassword(user) {
        // alert(user);
        var x =document.getElementById(user);
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }

      }
      function add() {
        var form = document.querySelector("form[id='submit-form']");
        var username = form.elements["username"].value;
        var password = form.elements["password"].value;
        var confirmPassword = form.elements["confirm-password"].value;
        var firstName = form.elements["first-name"].value;
        var lastName = form.elements["last-name"].value;
        var email = form.elements["email"].value;
        var dob = form.elements["date-of-birth"].value;

        if (username == "" || password == "" || confirmPassword == "" || firstName == "" || lastName == "" || email ==
          "" || dob == "") {
          alert("All fields must be filled!");
        } else if (password != confirmPassword) {
          alert("Passwords not matching!");
        } else {
          alert("User successfuly added!");
          document.getElementById("submit-form").submit();

        }

      }
    </script>
  </body>

  </html>
</span>