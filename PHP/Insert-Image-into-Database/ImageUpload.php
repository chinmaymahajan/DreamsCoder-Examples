<html>
<head>
<title> Image Upload Demo - DreamsCoder.com </title>
</head> 
 <body>
<form name="admin" method="post" enctype="multipart/form-data">
<input type="file" name="pic">

<a href="www.dreamscoder.com">Visit here </a>
</form>
 
 
 
<?php
if(isset($_POST['submit']))
{
 
        $img=$_FILES['pic']['name'];
        $imgtmp=$_FILES['pic']['tmp_name'];
        $path = "Uploads";
        if(is_uploaded_file($imgtmp))
            {
                                             
            if(move_uploaded_file($imgtmp,"$path/$img"))
                {
 
        $sql = "INSERT INTO  `table_name` (`pic` ,`date`) VALUES ('$img', now() )";
        $qry = mysql_query($sql);
        if($qry)
            echo "Image Inserted Successfully in Database";
        else
             die($qry . mysql_error());
                } // if image is moved to permenanent Location
 
            }//if image is uploaded
 
}//if Submit Button is Clicked
 
?>

</body>
</html>