<?php
function sanitizeString($var){
	if(get_magic_quotes_gpc());
		$var=stripslashes($var);
		$var=strip_tags($var);
		$var=htmlentities($var);
		  return $var;
}
$id_number=sanitizeString($_POST["id_number"]);
$adm_number=sanitizeString($_POST["adm_no"]);
$name=sanitizeString($_POST["name"]);
$date_of_birth=sanitizeString($_POST["date_of_birth"]);
$tel_no=sanitizeString($_POST["tel_no"]);
$email=sanitizeString($_POST["email"]);
$county=sanitizeString($_POST["county"]);
//$photo_file_name=sanitizeString($_POST["photo_upload"]);
$bio=sanitizeString($_POST["bio"]);
$username=sanitizeString($_POST["username"]);
$password=sanitizeString($_POST["password"]);
$photo_file_name=$_FILES['photo_upload'];
$cv_file_name=$_FILES['cvupload'];

$target_dir="./uploads/images/";
$target_dir2="./uploads/cv/";


$image_extensions=['jpeg','png','jpe','jpg'];
$errors=array();
$exploded_image_name=explode('.',$_FILES['photo_upload']['name']);
$exploded_image_name_ext=end($exploded_image_name);
$file_ext=strtolower($exploded_image_name_ext);
$image_ext_ok=0;

$cv_extensions=array('pdf','docx','doc','txt');
$cv_errors=array();
$exploded_cv_name=explode('.',$_FILES['cvupload']['name']);
$exploded_cv_name_ext=end($exploded_cv_name);
$cv_ext=strtolower($exploded_cv_name_ext);
$cv_ext_ok=0;


			if(isset($photo_file_name)){
				if($_FILES['photo_upload']['size']>20000000){
                   $errors[]="file too large";
				}
				for($i=0; $i<sizeof($image_extensions); $i++){
					if($file_ext===$image_extensions[$i]){
							$image_ext_ok=1;
			}
		}

		if($image_ext_ok<>1){
				$errors[]="Not an image file.";							
			}
			
			if(empty($errors)==true){
				
				move_uploaded_file($_FILES["photo_upload"]["tmp_name"],$target_dir.$_FILES["photo_upload"]["name"]);
					$image_path_name=$_FILES["photo_upload"]["name"];
			}
			else{
				$str_errors=implode(".",$errors);
				exit($str_errors);
					
			}
		}


			if(isset($cv_file_name)){
			if($_FILES["cvupload"]["size"]>200000){
				$errors[]="File too large";
			}
				for($i=0; $i<sizeof($cv_extensions); $i++){
					if($cv_ext===$cv_extensions[$i]){
							$cv_ext_ok=1;
					}
				}
			if($cv_ext_ok<>1){
				$cv_errors[]="Not a text file docx, doc, pdf";				
			}
			
			if(empty($cv_errors)==true){
				
				move_uploaded_file($_FILES["cvupload"]["tmp_name"],$target_dir2.$_FILES["cvupload"]["name"]);	
					$cv_path_name=$_FILES["cvupload"]["name"];
			}
			else{
				$str_errors_2=implode(".",$cv_errors);
				exit($str_errors_2);				
			}
			}


  if(isset($id_number)&&isset($adm_number)&&isset($name)&&isset($date_of_birth)&&isset($tel_no)&&isset($email)&&isset($county)&&isset($photo_file_name)&&isset($cv_file_name)&&isset($bio)&isset($username)&&isset($password)){

   	if(!empty($id_number)&&!empty($adm_number)&&!empty($name)&&!empty($date_of_birth)&&!empty($tel_no)&&!empty($email)&&!empty($county)&&!empty($photo_file_name)&&!empty($cv_file_name)&&!empty($bio)
        &&!empty($username)&&!empty($password)){


			
   		$connect=mysqli_connect("localhost","root","tony5610","alu");
   	echo $id_number,'<br>';
   	echo $adm_number,'<br>';
   	echo $name,'<br>';
   	echo $date_of_birth,'<br>';
   	echo $tel_no,'<br>';
   	echo $email,'<br>';
   	echo $county,'<br>';
   	echo $image_path_name,'<br>';
   	echo $cv_path_name,'<br>';
   	echo $bio,'<br>';
   	echo $username,'<br>';
   	echo $password,'<br>';
   	echo '<br>';

   		$result=mysqli_query($connect,"INSERT INTO aluDetails VALUES('$id_number','$adm_number','$name','$date_of_birth','$tel_no','$email','$county','images.jpg','$cv_path_name',$bio','$username','$password')");

   			if($result==true){
   				header("Location:profile.html");
   			}
   			else{
   				echo "Registration failed";
   			}

   			mysqli_close($connect);
   	}
   }

?>