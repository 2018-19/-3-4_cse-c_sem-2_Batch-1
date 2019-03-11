<?php    
    
include 'dbConfig.php';    
  session_start();  
     $uid=$_SESSION['userid'];
    
$sql = "select * from achievements";    
$result = mysqli_query($db,$sql);

$sql1 = "select * from paperpublications";    
$result1 = mysqli_query($db,$sql1);

$sql2 = "select * from participations";    
$result2 = mysqli_query($db,$sql2);  

$sql3 = "select * from faculty";
$result3 = mysqli_query($db,$sql3);  

if(!isset($_SESSION['userid']) || trim($_SESSION['userid'])=='')
{
header("location:index.html");
}
else
{
  $userid=$_SESSION['userid'];  
    
}
?>    
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/sidenav.css">
</head>
<body background="back.jpg">
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home.php">Home</a>
<a href="personalrep.php">Personal Repository</a>
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
    function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
</script>
   

    <form>
 

   <table width="95%" border="3" cellspacing="2" cellpadding="3" align="center" id="printTable">
<?php
 
 $uid=$_SESSION['userid'];

    
while($row = mysqli_fetch_object($result3)){    
    if($uid==$row->email){
    
?>
 <tr><td><center><table width = "100%" border = "0" cellspacing = "1" cellpadding = "1" style="color:black" bgcolor="#16f7f7">
     <!--<tr><td align="center" >EMAIL ID</td>
          <td align="center" >NAME</td>
          <td align="center" >DESIGNATION </td>
          <td align="center" > Qualification</td>
          <td align="center" > Photo</td>
          </tr>-->

      <tr><td align="center"><font style="font-family:'Trebuchet MS'; font-size:18px" text-align:justify"><?php echo $row->email;?></font></td>
          <td align="center"><font style="font-family:'Trebuchet MS'; font-size:18px" text-align:justify"><?php echo $row->name;?></font></td>
          <td align="center"><font style="font-family:'Trebuchet MS'; font-size:18px" text-align:justify"><?php echo $row->designation;?></font></td>
          <td align="center"><font style="font-family:'Trebuchet MS'; font-size:18px" text-align:justify"><?php echo $row->qualification;?></font></td>
        <?php $pic=$row->photo;?>
          <td align="center"><?php echo '<img src="'.$pic.'" width="80" height="70">';?></td>
        </tr><?php }} ?> </table></center></td></tr>

    
        <tr><td><center><table width = "95%" border = "1" cellspacing = "1" cellpadding = "1" style="color:black" bgcolor="white"> 
        <tr><td colspan=7><center ><u><font  style="color:black; border:4px solid Tomato;font-family:Georgia;"> *ACHIEVEMENTS*</font></u></center></td></tr>
            <tr style="color:blue">    
                <td>TypeOfAchivement</td>    
                <td>EventORsubject</td>    
                <td>Level</td>    
                 
                <td>Organization</td>    
                <td>Date</td>    
                <td>AnyOther</td>    
                <td>Files</td>    
                    
            </tr>    
             

<?php    

$uid=$_SESSION['userid'];

    
while($row = mysqli_fetch_object($result)){    
    if($uid==$row->Email){
    
?>  
    <tr>  
        <td>  
            <?php echo $row->TypeOfAchivement;?>  
        </td>  
        <td>  
            <?php echo $row->EventORsubject;?>  
        </td>  
        <td>  
            <?php echo $row->Level;?>  
        </td>  
        <td>  
            <?php echo $row->Organization;?>  
        </td>  
        <td>  
            <?php echo $row->Date;?>  
        </td>  
        <td>  
            <?php echo $row->AnyOther;?>  
        </td>  
        <td><?php
             $imguri="uploads/".$row->files;  
             ?>
             <a href="<?= $imguri ?>" target="_blank">view doc</a> 

        </td>  
          
        
        <tr> <?php }} ?> </table></center></td></tr><br/><br/><br/>

   
   <tr><td><center><table width = "95%" border = "1" cellspacing = "1" cellpadding = "1" style="color:black" bgcolor="white"> 
        <tr><td colspan=9><center ><u><font  style="color:black; border:4px solid Tomato;font-family:Georgia;"> *PAPER PUBLICATIONS*</font></u></center></td></tr>
        
            <tr style="color:blue"> 
   
                <td>Type</td>    
                <td>Level</td>    
                <td>Publisher Name</td>    
                 
                <td>Title</td>    
                <td>Academic Year</td>    
                <td>UGC Approved</td>  
                 <td>Index value</td> 
                 <td>Impact factor</td>  
                <td>Files</td>    
                    
            </tr>    
             

<?php    

$uid=$_SESSION['userid'];

    
while($row = mysqli_fetch_object($result1)){    
    if($uid==$row->Email){
    
?>  
    <tr>  
        <td>  

            <?php echo $row->Type;?>  
        </td>  
        <td>  
            <?php echo $row->Level;?>  
        </td>  
        <td>  
            <?php echo $row->PublisherName;?>  
        </td>  
        <td>  
            <?php echo $row->Title;?>  
        </td>  
        <td>  
            <?php echo $row->AcademicYear;?>  
        </td>  
        <td>  
            <?php echo $row->UGCapproved;?>  
        </td>  
        <td>  
            <?php echo $row->Indexvalue;?>  
        </td>  
        <td>  
            <?php echo $row->Impactfactor;?>  
        </td>
        <td>  
            <?php
             $imguri="uploads/".$row->files;  
             ?>
             <a href="<?= $imguri ?>" target="_blank">view doc</a>  
        </td>

          
        
        <tr> <?php }} ?> </table></center></td></tr><br/><br/><br/>

   
   <tr><td><center><table width = "95%" border = "1" cellspacing = "1" cellpadding = "1" style="color:black" bgcolor="white"> 
        <tr><td colspan=8><center ><u><font  style="color:black; border:4px solid Tomato;font-family:Georgia;">*PARTICIPATIONS*</font></u></center></td></tr>
        
            <tr style="color:blue">    
                <td>Type Of Event</td>    
                <td>Topi cName</td>    
                <td>Level</td>    
                <td>Venue</td>
                <td>FromDate</td>    
                <td>ToDate</td>    
                <td>No.Of Days</td>    
                <td>Files</td>    
                    
            </tr>    
  

<?php    

$uid=$_SESSION['userid'];

    
while($row = mysqli_fetch_object($result2)){    
    if($uid==$row->Email){
    
?>  
    <tr>  
        <td>  
            <?php echo $row->TypeOfEvent;?>  
        </td>  
        <td>  
            <?php echo $row->TopicName;?>  
        </td>  
        <td>  
            <?php echo $row->Level;?>  
        </td>  
        <td>  
            <?php echo $row->Venue;?>  
        </td>  
        <td>  
            <?php echo $row->FromDate;?>  
        </td>  
        <td>  
            <?php echo $row->ToDate;?>  
        </td>  
        <td>  
            <?php echo $row->NoOfDays;?>  
        </td> 
        <td>  
            <?php
             $imguri="uploads/".$row->files;  
             ?>
             <a href="<?= $imguri ?>" target="_blank">view doc</a>  
        </td>   
          
        
        <tr> <?php }} ?> </table></center></td></tr></table> <br/>
        <div align="center" style="border:#CC0000;">
        <button  type="button" class="btn btn-warning btn-sm" onClick="printData('printTable')"    style="background-color:#0099FF; border-color:#00FF00;"><font color="#FFFFFF" style="font-weight:bold; font-family:'Trebuchet MS'; font-size:10px">Print</font></button>
    </div> 
        </form>
        
        </div>

    </body>
</html> 
