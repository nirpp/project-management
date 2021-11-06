<!DOCTYPE html>
<html>
    <head>
        <title>
            upload page
        </title>
        <link rel="stylesheet" href="style.css">
    <body>
        <div class="container">
            <h3>Upload Your Project Here</h3>
        </div>
        <div class="form">
        <form method="post" enctype="multipart/form-data" >
            <label>Title</label>
            <input type="text" name="title"><br><br>
            <label>File Upload</label>
            <input type="File" name="file"><br><br>
            <input type="submit" name="submit">
         
         
        </form>
</div>
    </body>
</html>

 
<?php 
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "registration";  #database name
 
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
 
if (isset($_POST["submit"]))
 {
     #retrieve file title
        $title = $_POST["title"];
     
    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
     #upload directory path
$uploads_dir = 'images';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    #sql query to insert into database
    $sql = "INSERT into fileup(title,image) VALUES('$title','$pname')";
 
    if(mysqli_query($conn,$sql)){
 
    echo "File Sucessfully uploaded";
    }
    else{
        echo "Error";
    }
}
 
 
?>