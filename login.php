<?php
function sanitizeString($var){
	if(get_magic_quotes_gpc());
		$var=stripslashes($var);
		$var=strip_tags($var);
		$var=htmlentities($var);
		  return $var;
}
$username=sanitizeString($_POST["username"]);
$password=sanitizeString($_POST["password"]);

if(isset($username)&&isset($password)){
 if(!empty($username)&&(!empty($password))){
 	$connect=mysqli_connect("localhost","root","tony5610","alu");
 	//"SELECT name FROM alumniDetails WHERE (username='".$username."') AND password='".$password."'"));
 	$result=array(array());
 	$result=mysqli_fetch_assoc(mysqli_query($connect,"SELECT name FROM aluDetails WHERE(username='".$username."') AND password='".$password."'"));
 	 if($result["name"]== true){

 	 	header("Location:/homepage.html");
 	 }
 	 else {
 	 	echo "Wrong Username or Password";
 	 }
 }
}
?>