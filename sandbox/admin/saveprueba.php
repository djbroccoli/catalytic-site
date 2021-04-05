<?php 
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 //Getting actual file name
 $name = $_FILES['formimg']['name'];
 
 //Getting temporary file name stored in php tmp folder 
 //$tmp_name = $_FILES['formimg']['tmp_name'];

 $posti = $varname = $_POST['formname'];
 
 //Path to store files on server
 //$path = 'imagestest/';
 
 //checking file available or not 
 if(!empty($name)){
 //Moving file to temporary location to upload path 
 //move_uploaded_file($tmp_name,$path.$name);

 foreach($_FILES['formimg']['name'] as $key=>$val){
        //upload and stored images
 		$name = $_FILES['formimg']['name'][$key];
 		$tmp_name = $_FILES['formimg']['tmp_name'][$key];
 		$newname = rand(100,999).$name;
 		$imgname = strtolower($newname);

        $path = "../imgstest/";
        $target_file = $path.$imgname;
        move_uploaded_file($tmp_name,$target_file);
            
    }
 
 //Displaying success message 
 echo $posti;
 echo "<img src='$target_file' />";
 }else{
 //If file not selected displaying a message to choose a file 
 echo "Please choose a file";
 }
 }