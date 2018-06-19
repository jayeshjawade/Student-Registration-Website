<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="w3.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster&effect=brick-sign">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.w3-lobster {
    font-family: "Lobster", Sans-serif;
}
</style>
<style>
.w3-tangerine {
    font-family: "Tangerine", serif;
}
</style>
<style>
body {margin:0;}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>

<body font-color="red">
<nav style ="background-colored:red ; color white:text-align:center:border style:double">
<div class="topnav" id="myTopnav">

  <a href="jay.php"><i class="fa fa-home">Home</i></a></center>
   <a href="find.php"><i class="fa fa-search">Search</i></a></center>
   <a href="register.php">Signup</a>
  <a href="signup.php">Logout</a></center>
  <a href="feedback.html">Feedback</a></center>
  <a href="#about">About</a><center>
</div>
<form method="POST" action="jay.php">
<br>
<div class="w3-card-4 w3-display-middle w3-light-gray">
<table border='0' width='480px' cellpadding='0' cellspacing='0' align='center'>
<center><tr>
   <td><center><h1 class="w3-container w3-lobster font-effect-brick-sign w3-purple"> Student Registration Form</h1></br></center></td>
</tr><center>

<table border='0' width='480px' cellpadding='0' cellspacing='0' align='center'>
<tr>
    <td align='center'>Name:</td>
    <td><input type='text' name='name' id='name' required></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Branch:</td>
    <td><select name='option' id='option' required> 
<option name=""></option>
<option name="MECH">MECH</option>
<option name="CIVIL">CIVIL</option>
<option name="EXTC">EXTC</option>
<option name="COMP">COMP</option>
<option name="IT">IT</option>
</select>
</td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Date Of Birth:</td>
    <td><input type='date' name='dob' id='dob' required></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Address:</td>
    <td><input type='text' name='address' id='address' required></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Mobile Number:</td>
    <td><input type='number' name='phone' id='phone' required></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Email:</td>
    <td><input type='text' name='email' id='email' required></td>
</tr>
<tr> <td>&nbsp;</td> </tr>

<tr> <td>&nbsp;</td> </tr>
<table border='0' cellpadding='0' cellspacing='0' width='480px' align='center'>
<tr> 
   <td align='center'><input class=" w3-purple w3-circle" type='submit' name='submit' value='register' id='submit'></td>
</tr>
</table>
</table>

</table>
</form>
</div>
</body>
</html>


<?php 
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$branch=$_POST['option'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];

$con=mysqli_connect("localhost","root","","data");
if($con==false)
{
echo "Connection failed";
}
$query="INSERT INTO `student`(`name`, `branch`, `dob`, `address`, `phone`, `email`) VALUES ('$name', '$branch', '$dob', '$address', '$phone', '$email')";

$run=mysqli_query($con,$query);

if($run==true)
{

?>
<script>
alert('Data Added Successfully');
</script>
<?php

}
else
{
?>
<script>
alert('Data Not Added');
</script>
<?php
}

}
?>
