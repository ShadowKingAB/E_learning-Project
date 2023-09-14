<?php
ob_start(); // to clear the browser cache...
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$get="select * from registration where username='$username' and password='$password' and status='accept' ";
$un="root";
  $upw="";
  $host="localhost";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";
// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
  $rs=$db->query($get);
   while($r=$rs->fetch_assoc())
   {
      $fn= $r['first_name'];
      $ln= $r['last_name'];
	  $name=$fn.' '.$ln;
      $father= $r['father_name'];
      $mother= $r['mother_name'];
      $dob= $r['dob'];
      $gender= $r['gender'];
      $course= $r['course'];
      $sem= $r['sem'];
      $reg= $r['register_no'];
      $phno= $r['phno'];
      $email= $r['email'];
      $profile_pic=$r['photo'];
	  $pasword=$r['password'];
	  $status='accept';
	  
   }
   if($rs->num_rows>0)
   {
        $_SESSION['un']=$username;
        $_SESSION['name']=$name;
		$_SESSION['dob']=$dob;
		$_SESSION['gender']=$gender;
        $_SESSION['course']=$course;
		$_SESSION['sem']=$sem;
		$_SESSION['reg']=$reg;
		$_SESSION['phno']=$phno;
		$_SESSION['email']=$email;
		$_SESSION['pic']=$profile_pic;
		$_SESSION['pswd']=$pasword;
		header("location:elearning.php");
	}
	else
	{
	    echo '<script>alert("NOT AUTHENTICATED");window.location="login.php";</script>';
	}
?>
   