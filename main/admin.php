<?php
 session_start();
 
 header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

 include("../database/db.php");
 if($_SESSION['user']!="root")
 {
   header("location:../login/loginpage.html");
   exit();
 }
  if(isset($_POST['name']))
  {
    $name=$_POST['name'];
    $check=mysqli_prepare($conne,"select * from users where name like ?");
    if($check)
    {
      $like="%$name%";
      mysqli_stmt_bind_param($check,"s",$like);
      mysqli_stmt_execute($check);
      $result=mysqli_stmt_get_result($check);
    }
    else 
    {
      echo "<script>alert('result finding failed');</script>";
      exit();
    }
    }
   else if(isset($_POST['username']))
    {
      $username=$_POST['username'];
      $check=mysqli_prepare($conne,"select * from users where userid=?");
      if($check)
      {
        mysqli_stmt_bind_param($check,"s",$username);
          mysqli_stmt_execute($check);
        $result=mysqli_stmt_get_result($check);
      }
      else 
    {
      echo "<script>alert('result finding failed');</script>";
      exit();
    }
    }
  else if(isset($_POST['user_id'])&&isset($_POST['sts']))
    {
      $user_id=$_POST['user_id'];
      $sts=$_POST['sts'];
      $check=mysqli_prepare($conne,"update users set status=? where userid=?");
      if($check)
      {
        mysqli_stmt_bind_param($check,"ss",$sts,$user_id);
       if(mysqli_stmt_execute($check))
       {
         echo "<script>alert('Successfully updated ID: $user_id');</script>";
         exit();
       }
       else
       {
        echo "<script>alert('Updation failed');</script>";
        exit();
       }
      }
    }
    else
{
    $check = mysqli_prepare($conne,"select * from users");
    if($check)
    {
        mysqli_stmt_execute($check);
        $result = mysqli_stmt_get_result($check);
    }
    else
    {
        echo "<script>alert('execution failed');</script>";
        exit();
       }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

   <style>
       
       body {
    background: radial-gradient(circle at 40% 20%,#bc9eed,transparent 20%), radial-gradient(circle at 80% 70%,#475bd5,transparent 20%),#2e2e2e;
    min-height: 100vh;
    color: white;
    background-attachment: fixed;
}
h1
{
    text-align: center;
    padding-top: 20px;
    letter-spacing: 3px;
    font-family: 'Poppins',sans-serif;
}
#inputs
{
    display: flex;
    flex-direction: column;
    gap:30px;
    margin-left: 50px;
}
 input[type="text"]
 {
     width: 40%;
     max-width: 400px;
     height: 30px;
     border: 1px solid #3863a8;
     outline: none;
     margin-right: 10px;
     transition: 0.3s ease all;
     font-weight: bold;
     
 }
 input[type="text"]:focus
 {
     transform: scale(1.05);
     box-shadow: 0 0 10px #5582ff;
 }
 input[type="submit"]
 {
     width: 30%;
     max-width: 200px;
     background: #2b6dff;
     color: white;
     height: 30px;
     border: none;
     border-radius:8px;
     transition:0.3s ease all;
     letter-spacing: 3px;
     font-weight: bold;
     font-family: 'Poppins',sans-serif;
 }
  input[type="submit"]:hover
  {
      transform: scale(1.05);
      background: white;
      color: #2b6dff;
  }
  button
  {
      width: 70%;
      max-width: 300px;
      margin-top: 30px;
      height: 40px;
      font-weight:bold;
      letter-spacing: 3px;
      border-radius: 5px;
      background: white;
      border: none;
      color: #1a5c9c;
      transition: 0.3s ease all;
  }
  button:hover
  {
      transform: scale(1.1);
  }
  #customer
  {
      background: white;
      width: 70%;
      max-width: 300px;
      margin-top: 20px;
      display: flex;
      justify-content: center;
      height: 40px;
      text-decoration: none;
      color: black;
      font-weight: bold;
      align-items: center; 
      border-radius: 10px;    
      transition: 0.3s ease all;
  }
  #customer:hover
  {
      transform: scale(1.1);
  }
  a
   {
       text-decoration: none;
       font-weight: bold;
   }
   #table
   {
       
       padding-top:40px ;
       overflow-x: auto;
   }
   table
    {
        margin: 10px auto;
        font-size: 20px;
        width: 80%;
       text-align: center;
       font-weight: bold;
       word-wrap: break-word;
         
   }
   th
   {
       padding: 10px;
       background: #408cff;
   }
   td
   {
       padding: 10px;
       background:white ;
       color: black;
   }
   #logout
   {
       display: flex;
       justify-content: center; 
       background: white;    
       height: 40px;
       width: 70%;
       max-width: 300px;
       align-items: center;
       border-radius: 5px;
       margin: 50px auto;
       font-size: 20px;
       transition: 0.3s ease all;
   }
   #logout:hover
   {
       transform: scale(1.1);
   }
   
   </style>
    <script>
        function updateinfo()
 {
    var user_id=prompt("Enter the username need to change");
    
     if (user_id==null) {
         alert("enter a valid username")
         return false;    
     }
     if(user_id)
     {
     var status=prompt("enter paid or unpaid");
     if (status==null) {
         alert("enter a valid option")
         return false;    
     }
     if (status.toLowerCase()!="paid" && status.toLowerCase()!="unpaid")
      {
         alert("enter a valid value(paid/unpaid).")
         return  false;
     }
     }
     else
     {
         alert("enter a valid username");
         return false;
     }
       document.update.user_id.value=user_id;
       document.update.sts.value=status.toLowerCase();
       document.update.submit();
   
}
    </script>
</head>
<body>
    <h1>ADMIN DASH</h1>
   <div id="inputs">
    <form method="POST">
        <input type="text" name="name" placeholder="name" required>
        <input type="submit" value="search">      
    </form>
    <form method="POST">
        <input type="text" name="username" placeholder="username" required>
        <input type="submit" value="search">
    </form>
    <button onclick="updateinfo()">UPDATE</button>
    <form name="update" method="POST">
        <input type="hidden" name="user_id">
        <input type="hidden" name="sts">
    </form>
    <a href="../customer/customer.php"  id="customer"> Add Customer</a>
    </div>
    <div id="table">
        
           <?php
if(mysqli_num_rows($result)>0)
{
    echo "<table rules=all border=1>";
    echo "<tr>
            <th>SN</th>
            <th>Name</th>
            <th>User-ID</th>
            <th>Number</th>
            <th>Status</th>
            <th>Updated At</th>
          </tr>";

    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>".$row['sn']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['userid']."</td>";
        echo "<td><a href=tel:".$row['number'].">".$row['number']."</a></td>";
        echo "<td>".$row['status']."</td>";
        echo "<td>".$row['updated_at']."</td>";
        echo "</tr>";
    }

    echo "</table>";
}
else
{
    echo "<h2 style='text-align:center;color:white;'>No Results Found</h2>";
}
?>

    </div>
     <div id="logout">
         <a href="logout.php">LOG OUT</a>
     </div>
</body>
</html>
