<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "parking");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$show = $_POST['space'];

if ( $show = "level 1") {
  // Attempt select query execution
  $sql = "SELECT * FROM level1";
  if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Plate Number</th>";
                  echo "<th>Vehicle Type</th>";
                  echo "<th>Start Time</th>";
                  echo "<th>End Time</th>";
                  echo "<th>Fees</th>";
              echo "</tr>";
          while($row = mysqli_fetch_array($result)){
              echo "<tr>";
                  echo "<td>" . $row['plate_no'] . "</td>";
                  echo "<td>" . $row['vehicle_type'] . "</td>";
                  echo "<td>" . $row['start_time'] . "</td>";
                  echo "<td>" . $row['end_time'] . "</td>";
                  echo "<td>" . $row['fees'] . "</td>";
              echo "</tr>";
          }
          echo "</table>";
          // Free result set
          mysqli_free_result($result);
      } else{
          echo "No records matching your query were found.";
      }
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }

}

elseif ($show = "level 2") {
  // Attempt select query execution
  $sql = "SELECT * FROM level2";
  if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Plate Number</th>";
                  echo "<th>Vehicle Type</th>";
                  echo "<th>Start Time</th>";
                  echo "<th>End Time</th>";
                  echo "<th>Fees</th>";
              echo "</tr>";
          while($row = mysqli_fetch_array($result)){
              echo "<tr>";
                  echo "<td>" . $row['plate_no'] . "</td>";
                  echo "<td>" . $row['vehicle_type'] . "</td>";
                  echo "<td>" . $row['start_time'] . "</td>";
                  echo "<td>" . $row['end_time'] . "</td>";
                  echo "<td>" . $row['fees'] . "</td>";
              echo "</tr>";
          }
          echo "</table>";
          // Free result set
          mysqli_free_result($result);
      } else{
          echo "No records matching your query were found.";
      }
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}

// Close connection
mysqli_close($link);
?>
