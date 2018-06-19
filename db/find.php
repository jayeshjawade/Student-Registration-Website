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

<body class="w3-light-gray">
<nav style ="background-colored:red ; color white:text-align:center:border style:double">
<div class="topnav" id="myTopnav">

  <a href="jay.php"><i class="fa fa-home">Home</i></a></center>
   <a href="find.php"><i class="fa fa-search">Search</i></a></center>
   <a href="register.php">Signup</a>
  <a href="signup.php">Logout</a></center>
  <a href="feedback.html">Feedback</a></center>
  <a href="#about">About</a><center>
</div>
</br>

<form method="POST" action="find.php">
<center><h1 class="w3-container w3-lobster font-effect-brick-sign">Student Registration</h1></center>
</br></br>
    <center><td align='center'>Mobile Number</td></center>
    <td><center><input type='number' name='phone' id='phone'></center></td>
	</br>
	<table border='0' cellpadding='0' cellspacing='0' width='480px' align='center'>
<tr> 
   <td align='center'><input class=" w3-purple w3-ripple w3-xlarge" type='submit' name='submit' value='Search' id='submit'></td>
</tr>
</table>
	</br></br>
	<!--<table align='center' width="1000" cellpadding=5celspacing=5 border=1>
	<tr>
	<th>Id</th>
	<th>Name</th>
	<th>Branch</th>
	<th>DOB</th>
	<th>Address</th>
	<th>mobile number</th>
	<th>Email</th>
	</tr>
	</table>-->
	</form>
</body>
</html>


<?php
if(isset($_POST['submit']))
{
$phone=$_POST['phone'];

define('DB_HOST','localhost');
define('DB_USERNAME','root');
define('DB_PW','');
define('DB_NAME','data');

$con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PW,DB_NAME);

if($con->connect_error){
	die("Connection failed: ".$con->connect_error);
}
$responce = array();
$sql = "SELECT * FROM student WHERE `phone`= '$phone'";
$stmt = mysqli_query($con,$sql);
if(mysqli_num_rows($stmt) >0)
{
$r=mysqli_fetch_assoc($stmt);
?>
<table border="1" align="center" style="width:50%;margin-top:70px">
<tr>
   <th colspan="3">Student Details</th>
</tr>
<tr align="left">
    <th> id</th>
  <td><?php echo $r['id'] ?></td>
 </tr>
 
<tr align="left">
    <th> name</th>
  <td><?php echo $r['name'] ?></td>
 </tr>
 
 <tr align="left">
  <th> branch</th>
  <td><?php echo $r['branch'] ?></td>
 </tr>
 
 <tr align="left">
  <th> dob</th>
  <td><?php echo $r['dob'] ?></td>
 </tr>
 
 <tr align="left">
  <th> address</th>
  <td><?php echo $r['address'] ?></td>
 </tr>
 <tr align="left">
  <th> Phone</th>
  <td><?php echo $r['phone'] ?></td>
 </tr>
 <tr align="left">
  <th> email</th>
  <td><?php echo $r['email'] ?></td>
 </tr>
</table>

<?php
}
else
{
?>
<script>
alert('No Student Exists');
</script>
<?php
}
}
?>