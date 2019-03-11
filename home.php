<?php    
    
include 'dbConfig.php';    
  session_start();  
     $uid=$_SESSION['userid'];
    
 

$sql3 = "select * from faculty";
$result3 = mysqli_query($db,$sql3);  
?>
<html>
<head>
    
    
     <title>Anits </title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="css/sidenav.css">
<style type="text/css">
.flip-card {
  background-color: transparent;
  width: 300px;
  height: 200px;
  border: 1px solid #f1f1f1;
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: #bbb;
  color: black;
}

/* Style the back side */
.flip-card-back {
  background-color: dodgerblue;
  color: white;
  transform: rotateY(180deg);
}
</style>
</head>
<body background="back.jpg">

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home.php">Home</a>
<a href="personalrepository.php">Personal Repository</a>
  <a href="Paper Publication.html">Paper Publication</a>
  <a href="Participation.html">Participation</a>
  <a href="Achivements.html">Achivements</a>
    <a href="view.php">View</a>
<a href="logout.php" target="_parent">Logout</a>
</div>

    
  

<div id="main">
 
  <span style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()">&#9776; Menu</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
 document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
 document.body.style.backgroundColor = "white";
}
    $(window).load(function(){
     $('.loader').fadeOut();
});
</script>

 
    <font face="stencil" size="+5" color="orange"><center>FACULTY REPOSITORY SYSTEM</center></font>
    <br>
    <br>
    <br>
<font face="stencil" size="+2" color="white"><center>FACULTY PROFILE</center></font>
  
    

    <?php
 
 $uid=$_SESSION['userid'];

    
while($row = mysqli_fetch_object($result3)){    
    if($uid==$row->email){
    
?>
    <center><div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front"><?php $pic=$row->photo;?>
    <?php echo '<img src="'.$pic.'" alt="Avatar" style="width:300px;height:300px;">';?>
    </div>
    <div class="flip-card-back">
      <h1><?php echo $row->name;?></h1> 
      <p><?php echo $row->designation;?></p> 
      <p><?php echo $row->qualification;?></p>
    </div>
  </div>
</div></center>
    
    <?php }} ?>
    </div>
    </body>

        
</html> 