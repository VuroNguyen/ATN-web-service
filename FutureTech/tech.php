<?php
  $hostname = 'localhost';
  $database = 'tech';
  $username = 'root';
  $password = '';

  //opening a connection
  $conn = new mysqli ($hostname, $username, $password, $database);

  if ($conn->connect_error) {
    die($conn->connect_error);
  }

  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  if (isset($_POST['ps'])) $ps = true;  else $ps = false;
  if (isset($_POST['sds'])) $sds = true;  else $sds = false;
  if (isset($_POST['wd'])) $wd = true;  else $wd = false;
  if (isset($_POST['wdc'])) $wdc = true;  else $wdc = false;


  $reference = $_POST['reference'];
  $questions = $_POST['questions'];

  $query = "insert into tech(fName, lName, email, phone, ps, sds, wd, wdc, questions, reference) values ('$fName', '$lName', '$email', '$phone', '$ps', '$sds', '$wd', '$wdc', '$questions', '$reference')";

  $results = $conn->query($query);

  if (!$results) {
    echo "Insert failed! ";
  }
  else {
    echo "Insert succesfully! ";
  }

  $query =  "select * from tech";
  $results = $conn->query($query);

  if (!$results) {
    echo "Select error";
  }

  while ($row = mysqli_fetch_array($results)) {
    echo $row['id']." ".$row['fName']." ".$row['lName']. " " .$row['email']. " " .$row['phone'] ."<br/>";
  }


 ?>
