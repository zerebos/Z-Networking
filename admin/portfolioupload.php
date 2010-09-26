<?php
$deletefile = $_GET['deletefile'];
$getfile = "/home/zack/www/portfolio/$deletefile";
if ($deletefile) {
$query = unlink($getfile);
if (!$query) {
}
if ($query) {
echo "Congratulations $user, Your File has been Deleted<br />";
}
}
$upload = $_REQUEST['submit'];
if ($upload) {
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
    if (file_exists("portfolio/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "portfolio/" . $_FILES["file"]["name"]);
      echo "Congratulations $user, Your File has been Uploaded<br />";
      }
  }
}
?>
<? 
    $path = "/home/zack/www/portfolio"; 
    $dir_handle = @opendir($path) or die("Unable to open $path"); 
    while ($file = readdir($dir_handle)) { 

    if($file == "." || $file == ".." || $file == "index.php" || is_dir($file)) 

        continue; 
        echo "<a href=portfolio/$file>$file</a> - <a href=index.php?page=Admin&action=portfolioupload&deletefile=$file>Delete File</a><br />"; 

    } 
    closedir($dir_handle); 

?>
<form action="" method="post" enctype="multipart/form-data">
<label for="file">Choose a File: </label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Upload!" />
</form>