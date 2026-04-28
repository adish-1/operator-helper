<?php
include("../database/db.php");
 $message="";
 if($_SERVER['REQUEST_METHOD']== "POST")
 {
if(isset($_POST['name'])&&isset($_POST['userid'])&&isset($_POST['phno'])&&isset($_POST['status']))
 {
   $name=$_POST['name'];
   $userid=$_POST['userid'];
   $number=$_POST['phno'];
   $status=$_POST['status'];
 $check=  mysqli_prepare($conne,"insert into users(name,userid,number,status) values(?,?,?,?)");
    if($check)
    {
      mysqli_stmt_bind_param($check,"ssss",$name,$userid,$number,$status);
      if(mysqli_stmt_execute($check))
      {
        $message="<h3>CUSTOMER DATA SAVED</h3>";
      }
      else 
      {
        $message="<h3>CUSTOMER DATA SAVING FAILED</h3>";
      }
    }
    else 
    {
      $message="<h3>ENTER VALID INFORMATIONS</h3>";
    }
 }
 else
 {
   $message="<h3>ENTER VALUES FIRST THEN SUBMIT</h3>";
 }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page title</title>
    <link rel="stylesheet" href="customer.css">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    <script>
        function number()
 {
    var phno=document.form1.phno.value.length;
    if(phno!=10)
    {
        alert("enter a valid mobile nu")
        return false;
    }
    return true;
}
    </script>
</head>
<body>    
    <fieldset>
        <h2>CUSTOMER DETAILS</h2>   
        <form name="form1" onsubmit="return number()" method="POST">                 
            <div id="input">            
       <input type="text" name="name" required placeholder="Customer name"><br>        
       <input type="text" name="userid" required placeholder=" User-id"><br>
        <input type="tel" name="phno" required placeholder="Phone Number"><br>
           </div>
         <select required name="status">
          <option>paid</option>
          <option>unpaid</option>
           </select><br>
          <div id="submit">
              <input type="submit" value="submit">
           <input type="reset" value="clear">
          </div>
         </form>
         <?php
         echo "$message";
        ?>
    </fieldset>
</body>
</html>
