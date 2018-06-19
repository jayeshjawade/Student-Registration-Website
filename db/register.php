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

<body>
<nav style ="background-colored:red ; color white:text-align:center:border style:double">
<div class="topnav" id="myTopnav">

  <a href="jay.php"><i class="fa fa-home">Home</i></a></center>
   <a href="find.php"><i class="fa fa-search">Search</i></a></center>
   <a href="register.php">Signup</a>
  <a href="signup.php">Logout</a></center>
  <a href="feedback.html">Feedback</a></center>
  <a href="#about">About</a><center>
</div>
<div class="container">

 <div id="login-form">
    <form method="POST" action="register.php">
    
     <div >
        
         <div>
             <h1 align="left" class="w3-container w3-lobster font-effect-brick-sign"><b>Sign Up</b></h1>
            </div>
        </br></br>
         <div>
             <hr />
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div>
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span ></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            <div >
             <div >
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <center><input type="text" name="username" class="form-control" placeholder="Enter Name" maxlength="50" value="" /></center></br>
                </div>
                <!--<span class="text-danger"><?php echo $nameError; ?></span>-->
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <center><input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="" /></center></br>
                </div>
                <!--<span class="text-danger"><?php echo $emailError; ?></span>-->
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <center><input type="password" name="password" class="form-control" placeholder="Enter Password" maxlength="15" /></center></br>
                </div>
              <!--  <span class="text-danger"><?php echo $passError; ?></span>-->
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <a href="#"><center><input type="submit" class="w3-purple w3-ripple" name="btn-signup" value="Sign up"></button></center></a>
			
	 </div>
            
            <div class="form-group">
             <hr />
            </div>
            
         
        
        </div>
   
    </form>
    </div> 

</div>

</body>
</html>



<?php
if(isset($_POST['btn-signup']))
{
$name=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['password'];


define('DB_HOST','localhost');
define('DB_USERNAME','root');
define('DB_PW','');
define('DB_NAME','data');

$con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PW,DB_NAME);

if($con->connect_error){
	die("Connection failed: ".$con->connect_error);
if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT email FROM login WHERE email='$email'";
   $result = mysqli_query($con,$query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
//  $password = hash('sha256', $pass);
  }
  // if there's no error, continue to signup
  else{

  $name=$_POST['username'];
$email=$_POST['email'];
$pass=md5($_POST['password']);

ini_set('display_errors',0);
$con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PW,DB_NAME);
   $query = "INSERT INTO `login`(`username`, `useremail`, `password`) VALUES('$name','$email','$pass')";
   $res =  mysqli_query($con,$query);
    
   if ($res==true) {
	
 ?>

<script>
alert('You SignUp succesfully!!! Welcome....');
</script>

<?php
	
		
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  
 } }
  

?>
