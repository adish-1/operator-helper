<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OPERATOR LOGIN KCCL</title>
    <link href="https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@0,400..700;1,400..700&family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <style>
        body 
{
    display: flex;
    align-items: center;
    flex-direction: column;
    min-height: 100vh;
    backdrop-filter:blur(10px);
    background: radial-gradient(circle at top,#556dff,transparent 60%),linear-gradient(135deg,#030721,#060f44);
}
 h2
 {
     display: flex;
     
     color: white;
     margin-top: 100px;
     font-family: 'Gelasio',sans-serif;
 }
 a
 {
     margin:auto;
     text-decoration: none ;
     color: white;
     background: linear-gradient(135deg,#922a18,#ff4a2b);
     width:80%;
     max-width: 600px;
     height: 80px;
     display: flex;
     align-items: center;
     justify-content: center;
     font-weight: bold;
     border-radius: 10px;
     font-size: 30px;
     transition: 0.5s ease all;
 }
 a:hover
 {
     background: linear-gradient(135deg,#4b842c,#8df953);
     transform: scale(1.1);
 }
    </style>
</head>
<body>
        <?php
 $message="";
if(isset($_GET['msg']))
{
  $value=$_GET['msg'];
  $message="";
  if($value=="false")
  {
    $message="WRONG INPUTS!CHECK ONCE MORE";
  }
  else if($value=="novalue")
  {
    $message="ENTER DETAILS FIRST";
  }
}
 else
 {
   $message="WRONG PATH GO TO LOGIN PAGE FIRST";
 }
 echo "<h2>$message</h2>";
?>
        <a href="../login/loginpage.html"> give another try</a>
</body>
</html>
