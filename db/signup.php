<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="w3.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster&effect=brick-sign">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-allerta {
  font-family: "Allerta Stencil", Sans-serif;
}
</style>
<h1 class="w3-panel w3-allerta w3-topbar w3-bottombar w3-border-blue w3-pale-blue">gcoea.com !!!</h1>
<a href="register.php"><button class=" w3-allerta w3-topbar w3-bottombar w3-border-blue w3-pale-blue w3-display-topright w3-xlarge">signup</button></a>

<style>
.w3-lobster {
    font-family: "Lobster", Sans-serif;
}
</style>
</head>
<br>
<br>
<h1><marquee class="w3-container w3-lobster font-effect-brick-sign w3-jumbo" ><b>Govt. College Of Engineering</b></marquee></h1>
<br>
<br>
<br>
<head>
<script>
function submit(){
if(form1.username.value == '' || form1.password.value == ''){
	alert('All field is compulsory');
	return;
}
window.location="jay.html";
}
</script>
<title>LOGIN PAGE</title>
<link rel="stylesheet" type="text/css" href="sign.css" />
</head>
<body>

<div class="container">
	<section id="content">
		<form action="signup.php" method='POST'>
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password" />
			</div>
			<div>
				
			<!--	<a onclick="submit()" name='login'><p class="demo">LOGIN</p></a></br> -->
			<input type="submit" value="login" name="login"/>
				<p class="links"><a href="#">Lost your password?</a></p>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>

<?php 
if(isset($_POST['login']))
{
$name=$_POST['username'];
$pass=$_POST['password'];

$con=mysqli_connect("localhost","root","","data");
if($con==false)
{
echo "Connection failed";
}


$query="SELECT * FROM `login` where username='$name' and password='$pass'";

$run=mysqli_query($con,$query);

if(mysqli_num_rows($run) >0)
{
header('location:jay.php');
?>
<script>
alert('Welcome');
</script>
<?php
}
else
{
?>
<script>
alert('Invalid username or password');
</script>
<?php
}

}
?>
