


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
              

