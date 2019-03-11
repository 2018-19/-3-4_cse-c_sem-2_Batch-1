<?php
 include 'dbConfig.php';

$uid = $_POST['email'];
$password =$_POST['password'];

if($uid!='' && $password!='')
{
    $result = mysqli_query($db, "select * from faculty where email='$uid'");
    if (mysqli_num_rows($result) > 0) 
    {
    $sql="insert into staff (email,password) values('$uid','$password')" or die("not inserted ");
    if ($db->query($sql) === TRUE) { ?>
	<script>
    window.location.href = "login.html";
     alert("Sign Up Successfully. ");</script><?php
    } 
    else 
    {
    echo "Error: " . $sql . "<br>" . $db->error;
    }
    }
    else{ 
        ?><script>
    window.location.href="login.html";
    alert("User/Faculty Doesnt Exist.Kindly Register with your  Dept Mail.");
    </script><?php
    }
    
}
else{
    ?>
    <script>
        window.location.href="login.html";
            alert("Please Enter Valid Details");
</script><?php
    
	
}
mysqli_close($db);
?> 

