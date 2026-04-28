<?php
session_start();

 header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

include("../database/db.php");

if($_SESSION['user']!="operator")
{
    header("location:../login/loginpage.html");
    exit();
}

if(!empty($_POST['name']))
{
    $value = $_POST['name'];
    $check = mysqli_prepare($conne,"select * from users where name like ?");
    
    if($check)
    {
        $like = "%$value%";
        mysqli_stmt_bind_param($check,"s",$like);
        mysqli_stmt_execute($check);
        $result = mysqli_stmt_get_result($check);
    }
    else
    {
        echo "<script>alert('execution failed');</script>";
        exit();
    }
}
else if(!empty($_POST['status']))
{
    $value = $_POST['status'];
    $check = mysqli_prepare($conne,"select * from users where status= ?");
    
    if($check)
    {
        mysqli_stmt_bind_param($check,"s",$value);
        mysqli_stmt_execute($check);
        $result = mysqli_stmt_get_result($check);
    }
    else
    {
        echo "<script>alert('statement execution failed');</script>";
        exit();
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
    <style>
        body {
    background: radial-gradient(circle at 40% 20%,#bc9eed,transparent 20%), 
                radial-gradient(circle at 80% 70%,#475bd5,transparent 20%), 
                #2e2e2e;
    min-height: 100vh;
    color: white;
    background-attachment: fixed;
}

h1 {
    text-align: center;
    padding-top: 20px;
    letter-spacing: 3px;
    font-family: 'Poppins',sans-serif;
}

/* search section */
#search {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-left: 50px;
}

fieldset {
    border: none;
}

input[type="text"], select {
    width: 40%;
    max-width: 400px;
    height: 30px;
    border: 1px solid #3863a8;
    outline: none;
    margin-right: 10px;
    font-weight: bold;
    transition: 0.3s ease all;
}

input[type="text"]:focus, select:focus {
    transform: scale(1.05);
    box-shadow: 0 0 10px #5582ff;
}

input[type="submit"] {
    width: 30%;
    max-width: 200px;
    background: #2b6dff;
    color: white;
    height: 30px;
    border: none;
    border-radius:8px;
    transition:0.3s ease all;
    letter-spacing: 2px;
    font-weight: bold;
}

input[type="submit"]:hover {
    transform: scale(1.05);
    background: white;
    color: #2b6dff;
}

/* table */
#table {
    padding-top:40px ;
    overflow-x: auto;
}

table {
    margin: 10px auto;
    font-size: 20px;
    width: 80%;
    text-align: center;
    font-weight: bold;
}

th {
    padding: 10px;
    background: #408cff;
}

td {
    padding: 10px;
    background:white ;
    color: black;
}

/* logout */
#link {
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

#link:hover {
    transform: scale(1.1);
}

#link a {
    text-decoration: none;
    color: black;
}
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@0,400..700;1,400..700&family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">

</head>
<body>
    <h1>Operator Dashboard</h1>
    
        <div id="search">
    <form method="POST">
    <fieldset>
        <input type="text" name="name" placeholder="name">
    <input type="submit" value="search">
    </fieldset>
    </form>          
    <form method="POST">
    <fieldset>
        <select name="status">
        
        <option>paid</option>
        <option>unpaid</option>
    </select>
    <input type="submit" value="search">
    </fieldset>
    </form>
    </div>
    <div id="table">
      <?php
if(mysqli_num_rows($result)>0)
{
    echo "<table rules=all border=1> ";
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
        <div id="link">
            <a href="logout.php"> log out </a>
        </div>
        
</body>
</html>
