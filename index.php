
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Parking System</title>
<script type="text/javascript">
window.onload = setInterval(clock,1000);

  function clock()
  {
  var d = new Date();

  var date = d.getDate();

  var month = d.getMonth();
  var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
  month=montharr[month];

  var year = d.getFullYear();

  var day = d.getDay();
  var dayarr =["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];
  day=dayarr[day];

  var hour =d.getHours();
    var min = d.getMinutes();
  var sec = d.getSeconds();

  document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year;
  document.getElementById("time").innerHTML=hour+":"+min;
  }
</script>
<style media="screen">

  body{
    text-align: center;
  }

  input[type=submit] {
		background-color: #00FF00;
		padding: 10px 24px;
		border-radius: 10px;
	}

  input[type=reset] {
    background-color: 	#FAFAD2;
    padding: 10px 24px;
    border-radius: 10px;
    margin: 25px
  }

</style>
</head>
<body>
     <p id="date"></p>
     <p id="time"></p>

  <img src="Logo.png" alt="Company Logo">
  <h1>To book a parking</h1>
<form action="" method="post">

  <p>
        <label for="floor"><b>Choose Floor :</b></label>
        <br>
        <label for="Level">Level 1</label>
        <input type="radio" name="level" value="level 1">
        <br>
        <label for="Level">Level 2</label>
        <input type="radio" name="level" value="level 2">
      </p>
    <p>
          <label for="floor"><b>Vehicle Type :</b></label>
          <br>
          <label for="type">Car</label>
          <input type="radio" name="type" value="car">
          <br>
          <label for="type">Bike</label>
          <input type="radio" name="type" value="bike">
        </p>

      <p>
          <label for="plate_no"><b>Plate Number:</b></label>
          <input type="text" name="plate_no" id="plate_no">
      </p>
    <p>
        <label for="start_time"><b>Start Time:</b></label>
        <input type="number" name="start_time" id="start_time">
    </p>
    <p>
        <label for="end_time"><b>End Time :</b></label>
        <input type="number" name="end_time" id="end_time">
      </p>

    <input type="submit" value="Submit">
    <input type="reset" value="Reset">


</form>

<!-- To check space -->
<h1>To check the parking space</h1>

<form class="" action="parking.php" method="post">
<p>
  <label for="floor"><b>Choose Floor :</b></label>
  <br>
  <label for="Level">Level 1</label>
  <input type="radio" name="space" value="level 1">
  <br>
  <label for="Level">Level 2</label>
  <input type="radio" name="space" value="level 2">
</p>

<input type="submit" value="Submit">
<input type="reset" value="Reset">

</form>

</body>
</html>


<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "parking");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Take user input
$plate_no = $_POST ['plate_no'];
$start_time = $_POST['start_time'];
$end_time = $_POST ['end_time'];
$choice = $_POST ['level'];
$vehicle_type = $_POST['type'];

if (isset($_POST['submit'])) {

  ///calculate time taken
  function calculatetime($start_time,$end_time) {
  $time= ($end_time-$start_time)/100;
  return $time;
  }
  $time = calculatetime($start_time,$end_time);



}


if ($choice == "level 1") {

  $time= ($end_time-$start_time)/100;
  if ($vehicle_type == "car") {
    $total = ( $time*3);
  }
  else {
    $total =  ($time*1.50);;
  }

if ($time > 5) {
  // Attempt insert query execution
  $sql = "INSERT INTO level1 (
    plate_no,
    vehicle_type,
    start_time,
    end_time,
    fees)
    VALUES (
      '$plate_no',
      '$vehicle_type',
      '$start_time',
      '$end_time',
      '50')";
}
else {
  // Attempt insert query execution
  $sql = "INSERT INTO level1 (
    plate_no,
    vehicle_type,
    start_time,
    end_time,
    fees)
    VALUES (
      '$plate_no',
      '$vehicle_type',
      '$start_time',
      '$end_time',
      '$total')";
}


    //Inform whether the process is successful or not
  if(mysqli_query($link, $sql)){
      if ($time > 5) {
        echo "Charge : RM 50";
      }
      else {
        echo "Charge : RM ".$total ;
      }
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }


}

elseif ($choice == "level 2") {


      $time= ($end_time-$start_time)/100;

      //car
      if ($vehicle_type == "car") {
        $total = ( $time*3);
      }
      else {
        $total =  ($time*1.50);;
      }

      if ($time > 5) {
        // Attempt insert query execution
        $sql = "INSERT INTO level2 (
          plate_no,
          vehicle_type,
          start_time,
          end_time,
          fees)
          VALUES (
            '$plate_no',
            '$vehicle_type',
            '$start_time',
            '$end_time',
            '50')";
      }
      else {
        // Attempt insert query execution
        $sql = "INSERT INTO level2 (
          plate_no,
          vehicle_type,
          start_time,
          end_time,
          fees)
          VALUES (
            '$plate_no',
            '$vehicle_type',
            '$start_time',
            '$end_time',
            '$total')";
      }

        //Inform whether the process is successful or not
      if(mysqli_query($link, $sql)){
          if ($time > 5) {
            echo "Charge : RM 50";
          }
          else {
            echo "Charge : RM ".$total ;
          }
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }

      $sql = "INSERT INTO level2(fees)
              VALUES ('$total')";
    }

// Close connection
mysqli_close($link);
 ?>
