<?php
 $host="localhost";
 $dbuser="root";
 $dbpass="";
 $dbname="operator";
 $conne=mysqli_connect($host,$dbuser,$dbpass,$dbname);
 if(!$conne)
 {
  die("<h3>connection failed</h3>");
 }
?>
