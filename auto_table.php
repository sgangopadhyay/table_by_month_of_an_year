<?php
// PROGRAM : PHP program to create Dynamic table based on Day, Month of an Year
// PROGRAM WRITTEN BY : Suman Gangopadhyay
// Email ID : linuxgurusuman@gmail.com
// URL : https://www.linkedin.com/in/sumangangopadhyay/ 
// DATE : 8-Oct-2018
// Caveats : Connection to the MySQL database has to be done before executing this program

//Connection to the MySQL Database
  $ip = "localhost";
  $db = "auto_table";
  $username = "root";
  $password = "suman";
  $connection = mysqli_connect($ip,$username,$password,$db);
// Check for MySQL Database connectivity
  if(!mysqli_connect_errno()){
    echo "connection to database successfull"."<br/>";
    $month = date('M');
    $year = date('Y');
    $end_date_of_month = date('t');
    $table_name = $month."_".$year;
    $date_column = array();
// Create the dates columns for a month of a given year
    $i = 1;
    while ($i<=$end_date_of_month) {
      $date_column[$i] = "`date_column_$i` varchar(100)";
      $i = $i + 1;
    }
    $date_column = implode(',',$date_column);
    $date_column = trim($date_column);
// Create the MySQL Table and write it into the MySQL database
    $table_create = "CREATE TABLE IF NOT EXISTS $table_name($date_column)";
    if($connection->query($table_create)){
      echo "<br/>"."Table Created Successfully"."<br/>";
    }else{
      echo "<br/>"."Table Creation Failed !"."<br/>";
    }
  }else{
    die("ERROR : ".mysqli_connect_error());
  }
// Close the MySQL database connection
  mysqli_close($connection);
  ?>
