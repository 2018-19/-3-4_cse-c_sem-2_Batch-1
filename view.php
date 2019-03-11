 <!DOCTYPE html>
<?php    
    
include 'dbConfig.php';    
  session_start();  
    
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" type="text/css" href="viewmain.css">-->
<style>
/*
body {
    background-color: white;
    background-image: url("bg.jpg");
    background-size:  100%;
    background-repeat: no-repeat;
    background-position: left top;
    
}
*/
    
  input[type=text] , #date ,#demo{
    visibility:hidden;
}

input[type=checkbox]:checked + input[type=text] ,input[type=checkbox]:checked + #date input[type=date],
input[type=checkbox]:checked + select,
input[type=checkbox]:checked + #demo select
{
    visibility:visible;
}
    
    body{
        color: white;
    }

      table {
  width:100%;
}
table, th, td {
  border: 1px solid whitesmoke;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: white;
  color: white;
}

</style>
<link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/form.css">
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
   



<form action="" method="get">
<pre>
    <center> <font face="stencil" size="+5" color="orange">VIEW REPOSITORY</font></center><font face="Baskerville Old Face" size="+2" color="white"></font>
    <center>select one :<select size="1" name=tab>
    
    <option value="selectall">Select All</option>
    <option value="achievements">Achievments</option>
    <option value="participations">participations</option>
    <option value="paperpublications">Paper publications</option>
    </select> </br></center>
    
    <label for="checkbox-1">Email</label>&nbsp&nbsp&nbsp&nbsp<input type="checkbox" value="Email" id="checkbox-1"/><input type="text" placeholder="Search with Registered mail ID(Eg:anil.neerukonda.cse@anits.edu.in) " name="email"  pattern="[a-z0-9A-Z._%+-]+.cse@anits.edu.in" title="Search with registered Id only" />
    <label>Date Wise</label><input type="checkbox" /><div id="date">From Date:<input type="date" name="fdate"/> &nbsp To Date:<input type="date" name="todate" /></div>
    <label>Level</label>&nbsp&nbsp&nbsp&nbsp<input type="checkbox" /><div id="demo">select catagery :<select size="1" name=cat ><option value="none">None</option><option value="state">State</option><option value="national">National</option><option value="international">Inter-National</option></select>
    </div><center><input type="submit" name="submit" value="search"></center>
        
</form>
 <form>
<table width="97%" border="0" align="center" id="printTable" ><tr><td>
    <?php 
   echo"<table  border='2'>";
    
   if(!isset($_SESSION['userid']) || trim($_SESSION['userid'])=='')
{
header("location:index.html");
}
else
{
  $userid=$_SESSION['userid'];  
    
}   
if (isset($_GET['submit'])){ 
       include 'dbConfig.php';
    
$email=$_GET['email'];
$table = $_GET['tab'];
$fdate = $_GET['fdate'];
$todate = $_GET['todate'];
 $cat=$_GET['cat'];   

    if($table=="selectall"){
         
        echo("<h1 style='color:white;text-align:center'>Achivements  </h1>");
        if($cat!='none' && $email!=null){
            
             $sql = "select * from achievements  where Email='$email' and level='$cat' ";    
        }
            else if($cat!='none' or $email!=null) {
              
             $sql = "select * from achievements  where Email='$email' or level='$cat' ";    
            }
            else{
                $sql = "select * from achievements";    
            }
                $res = mysqli_query($db,$sql)or die("fatak");
$result = mysqli_query($db,"SHOW FIELDS FROM $dbName.achievements") or die("ur dead");

          
   echo "<table border='1' cellspacing='1' cellpadding='1' align='center'><tr>";
	while ($row = mysqli_fetch_array($result)) { 
		echo '<th style="color:blue;text-align:center" bgcolor="white">' .$row['Field'] . '</th>';
	}
	echo '</tr>';

   
    
     $i=0;
    $j=mysqli_num_rows($result);
    while((($row=mysqli_fetch_array($res))>0)){   
        
           echo "<tr style='color:tomato;text-align:center' bgcolor='#62d0d6'>";
        for($i=0;$i<$j;$i++){
          if($i==$j-1){
            
             $imguri="uploads/".$row[$i];  
             
echo ' <td style="color:black;text-align:center"><a href="'.$imguri.'" target="_blank">view doc</a></td>';
          }else{
         echo "<td style='color:black;text-align:center'>".$row[$i]."</td>";
              }
        }
        echo "</tr>";
       
    }
         echo "</table>";
        echo("<br><h1 style='color:white;text-align:center'>PaperPublications </h1>");
        if($cat!='none' && $email!=null)
$sql1 = "select * from paperpublications  where Email='$email' and level='$cat'";    
       else if($cat!='none' or $email!=null) {
            $sql1 = "select * from paperpublications  where Email='$email' or level='$cat'";  
       }
        else
             $sql1 = "select * from paperpublications";
            
        
$res = mysqli_query($db,$sql1);
   $result = mysqli_query($db,"SHOW FIELDS FROM $dbName.paperpublications") or die("ur dead1");
          
   echo "<table border='1' cellspacing='1' cellpadding='1' align='center'><tr>";
	while ($row = mysqli_fetch_array($result)) { 
		echo '<th style="color:blue;text-align:center" bgcolor="white">' .$row['Field'] . '</th>';
	}
	echo '</tr>';

   //2nd  
    
     $i=0;
    $j=mysqli_num_rows($result);
    while((($row=mysqli_fetch_array($res))>0)){
          
           echo "<tr style='color:tomato;text-align:center' bgcolor='#62d0d6'>";
        for($i=0;$i<$j;$i++){
          if($i==$j-1){
            
             $imguri="uploads/".$row[$i];
     echo ' <td style="color:black;text-align:center"><a href="'.$imguri.'" target="_blank">view doc</a></td>';
             
          
           }else{
         echo "<td style='color:black;text-align:center'>".$row[$i]."</td>";
       }
        }
        echo "</tr>";
       
    }
         echo "</table>";
 echo("<br><h1 style='color:white;text-align:center'>Participations  </h1>");
         if($cat!='none' && $email!=null)
$sql2 = "select * from participations where Email='$email' and level='$cat'";
        else if($cat!='none' or $email!=null) 
        $sql2 = "select * from participations where Email='$email' or level='$cat'";    
        else
         $sql2 = "select * from participations"; 
      
            
         $res = mysqli_query($db,$sql2);  

        $result = mysqli_query($db,"SHOW FIELDS FROM $dbName.participations") or die("ur dead2");

          
   echo "<table border='1' cellspacing='1' cellpadding='1' align='center'><tr>";
	while ($row = mysqli_fetch_array($result)) { 
		echo '<th style="color:blue;text-align:center" bgcolor="white">' .$row['Field'] . '</th>';
	}
	echo '</tr>';

   //3rd  
    
     $i=0;
    $j=mysqli_num_rows($result);
    while((($row=mysqli_fetch_array($res))>0)){
          
           echo "<tr style='color:tomato;text-align:center' bgcolor='#62d0d6'>";
        for($i=0;$i<$j;$i++){
          if($i==$j-1){
            
             $imguri="uploads/".$row[$i];  
             
             echo ' <td style="color:black;text-align:center"><a href="'.$imguri.'" target="_blank">view doc</a></td>';
          }else{
         echo "<td style='color:black;text-align:center'>".$row[$i]."</td>";
          }
        }
        echo "</tr>";
        
    }
        echo "</table>";

 
    }
    
    else{
    if($table=="participations"){
        if($cat!='none' && $email!=null&& $fdate!=null )
    $res= mysqli_query($db,"select * from $table where Email='$email'  and level='$cat' and FromDate >='$fdate' AND ToDate <='$todate' ") or die ("u died12");
        else if($cat!='none' && $email!=null){
             $res= mysqli_query($db,"select * from $table where Email='$email'  and level='$cat' ") or die ("u died13");
        }
        else if($cat!='none' && $fdate!=null){
        $res=mysqli_query($db,"select * from $table where level='$cat' and FromDate >='$fdate' AND  ToDate <='$todate' ") or die ("u died14");
            
        }
        else if($cat!='none' or $email!=null or $fdate!=null or $todate!=null){
            $res=mysqli_query($db,"select * from $table where Email='$email'  or level='$cat' or FromDate >='$fdate' AND  ToDate <='$todate' ") or die ("u died7");
        
        }
        else
        $res=mysqli_query($db,"select * from $table");
        
    }
        else{
             if($cat!='none' && $email!=null)
             $res= mysqli_query($db,"select * from $table where Email='$email' and level='$cat'") or die ("u died3");
            else if($cat!='none' || $email!=null)
            $res= mysqli_query($db,"select * from $table where Email='$email' or level='$cat'") or die ("u died4");
            else
              $res=mysqli_query($db,"select * from $table")or die("u dieed");
            
            
                
        }
         echo("<br><h1 style='color:white;text-align:center'>$table </h1>");
    $result = mysqli_query($db,"SHOW FIELDS FROM $dbName.$table") or die("ur dead5");
    
   echo "<table border='1' cellspacing='1' cellpadding='1' align='center'><tr>";
	while ($row = mysqli_fetch_array($result)) { 
		echo '<th style="color:blue;text-align:center" bgcolor="white">' .$row['Field'] . '</th>';
	}
	echo '</tr>';

    ?>
    
   
    <?php 
    
     $i=0;
    $j=mysqli_num_rows($result);
    while((($row=mysqli_fetch_array($res))>0)){
         
           echo "<tr style='color:tomato;text-align:center' bgcolor='#62d0d6'>";
        for($i=0;$i<$j;$i++){
          if($i==$j-1){
            
             $imguri="uploads/".$row[$i];  
             
             echo ' <td style="color:black;text-align:center"><a href="'.$imguri.'" target="_blank">view doc</a></td>';
          }else{
         echo "<td style='color:black;text-align:center'>".$row[$i]."</td>";
       }
        }
        echo "</tr>";
       
    }
         echo "</table>";
    }
}
    ?>
   </td></tr> </table> <br/>
        <div align="center" style="border:#CC0000;">
        <button  type="button" class="btn btn-warning btn-sm" onClick="printData('printTable')"    style="background-color:#0099FF; border-color:#00FF00;"><font color="#FFFFFF" style="font-weight:bold; font-family:'Trebuchet MS'; font-size:10px">Print</font></button>
   
    </div>  
        </form>     
     </div>
</body>
</html>
