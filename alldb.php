<?php
include 'dbConfig.php';

$sql1="CREATE TABLE staff ( sno INT(10) NOT NULL AUTO_INCREMENT UNIQUE,  email VARCHAR(100) NOT NULL PRIMARY KEY , password VARCHAR(20) NOT NULL)";
$sql2="CREATE TABLE participations ( Email VARCHAR(100) NOT NULL , TypeOfEvent VARCHAR(100) NOT NULL , TopicName VARCHAR(100) NOT NULL , Level VARCHAR(100) NOT NULL , Venue VARCHAR(200) NOT NULL , FromDate DATE NOT NULL , ToDate DATE NOT NULL , NoOfDays INT(50) NOT NULL , files VARCHAR(255) NOT NULL )";
$sql3="CREATE TABLE achievements ( Email VARCHAR(100) NOT NULL ,TypeOfAchivement VARCHAR(100) NOT NULL , EventORsubject VARCHAR(100) NOT NULL , Level VARCHAR(100) NOT NULL , Organization VARCHAR(200) NOT NULL , Date DATE NOT NULL ,  AnyOther VARCHAR(255) NOT NULL , files VARCHAR(255) NOT NULL )";
$sql4="CREATE TABLE paperpublications ( Email VARCHAR(100) NOT NULL ,Type VARCHAR(100) NOT NULL , Level VARCHAR(100) NOT NULL , PublisherName VARCHAR(100) NOT NULL , Title VARCHAR(200) NOT NULL ,  AcademicYear VARCHAR(100) NOT NULL ,  UGCapproved enum('yes', 'no') NOT NULL , Indexvalue VARCHAR(200) NOT NULL , Impactfactor VARCHAR(100) NOT NULL , files VARCHAR(255) NOT NULL )";
$sql5="CREATE TABLE faculty ( email VARCHAR(100) NOT NULL , name VARCHAR(100) NOT NULL , designation VARCHAR(100) NOT NULL , qualification VARCHAR(100) NOT NULL , photo VARCHAR(500) NOT NULL ) ";
$sql6="INSERT INTO faculty VALUES 
('sivaranjani.cse@anits.edu.in','Dr.R.Sivaranjani','Professor & HOD','M.Tech.,Ph.D','pics/hod.jpg'),
('mramakrishna.cse@anits.edu.in','Dr.M.Ramakrishna Murty',	'Associate Professor',	'M.Tech, Ph.D.','pics/2.jpg'),
('tusar.cse@anits.edu.in','Dr. Tusar Kanti Mishra'	,'Associate Professor','B.Tech, M.Tech, Ph.D.','pics/3.jpg'),
('sratankumar.cse@anits.edu.in','S.Ratan Kumar'	,'Associate Professor'	,'M.Tech.,(Ph.D.)','pics/4.jpg'),
('jhyma.cse@anits.edu.in','Dr. J. Hyma','Associate Professor',	'B.Tech , M.Tech, Ph.D','pics/5.jpg'),
('bravikiran.cse@anits.edu.in','Mr.B.Ravi Kiran',	'Sr.Assistant Professor',	'M.Tech','pics/6.jpg'),
('pritee.cse@anits.edu.in','Pritee Parwekar',	'Assistant Professor',	'M.Tech','pics/7.jpg'),
('selvanideepthi.cse@anits.edu.in','Dr. K.SELVANI DEEPTHI',	'Assistant Professor',	'B.TECH, M.TECH, Ph.D','pics/8.jpg'),
('gjagadish.cse@anits.edu.in','G.Jagadish',	'Assistant Professor',	'M.Tech.,(Ph.D)','pics/9.jpg'),
('seshadri.rao.cse@anits.edu.in','Ch.Seshadri Rao',	'Assistant Professor',	'M.Tech','pics/10.jpg'),
('keerthi.cse@anits.edu.in','Keerthi Lingam',	'Assistant Professor',	'M.Tech','pics/11.jpg'),
('sabhavani.cse@anits.edu.in','S. A. Bhavani',	'Assistant Professor',	'B.Tech.,M.Tech','pics/12.jpg'),
('kurumallas.cse@anits.edu.in','K.Suresh',	'Assistant Professor',	'M.Tech.,(Ph.D)','pics/13.jpg'),
('vinodbabu.cse@anits.edu.in','P Vinod Babu',	'Assistant Professor',	'M.Tech.,(Ph.D)','pics/14.jpg'),
('srmishra.cse@anits.edu.in','S.Ranjan Mishra',	'Assistant Professor',	'B.Tech.,M.Tech','pics/15.jpg'),
('kchandrasekhar.cse@anits.edu.in','K.Chandra Sekhar'	,'Assistant Professor',	'B.Tech.,M.Tech','pics/16.jpg'),
('gowripushpa.cse@anits.edu.in','G.Gowri Pushpa',	'Assistant Professor',	'B.Tech.,M.Tech','pics/17.jpg'),
('gsanthoshi.cse@anits.edu.in','G.Santoshi',	'Assistant Professor',	'B.Tech.,(M.Tech)','pics/18.jpg'),
('gvgayathri.cse@anits.edu.in','G V Gayathri',	'Assistant Professor',	'B.Tech.,M.Tech','pics/19.jpg'),
('lakshmi.cse@anits.edu.in','S.V.S.S.Lakshmi',	'Assistant Professor',	'M.C.A.,M.Tech','pics/20.jpg'),
('ushabala.cse@anits.edu.in','Dr.V.USHA BALA',	'Assistant Professor',	'M.Tech, Ph.D','pics/21.jpg'),
('pranitha.cse@anits.edu.in','Pranitha Gadde',	'Assistant Professor',	'M.Tech','pics/22.jpg'),
('tkranthi.cse@anits.edu.in','T. Kranthi',	'Assistant Professor',	'M.Tech','pics/23.jpg'),
('mkranthikiran.cse@anits.edu.in','M.Kranthi Kiran',	'Assistant Professor',	'M.S.,M.Tech.,(Ph.D)','pics/24.jpg'),
('ggayatri.cse@anits.edu.in','Gunupuru Gayathri',	'Assistant Professor',	'M.Tech','pics/25.jpg'),
('sivajyothi.cse@anits.edu.in','B Siva Jyothi',	'Assistant Professor',	'M.Tech','pics/26.jpg'),
('parvathanenins.cse@anits.edu.in','P Naga Srinivasu',	'Assistant Professor',	'M.Tech.,(Ph.D).','pics/27.jpg'),
('eshwar.cse@anits.edu.in','G.V.Eswara Rao',	'Assistant Professor',	'M.Tech','pics/28.jpg'),
('joshua.cse@anits.edu.in','S.Joshua Johnson',	'Assistant Professor',	'M.Tech(CSE)','pics/29.jpg'),
('anitha.cse@anits.edu.in','T Anitha',	'Assistant Professor',	'M.Tech','pics/30.jpg'),
('anusha.cse@anits.edu.in','Anusha V',	'Assistant Professor',	'M.Tech','pics/31.jpg'),
('amaravathi.cse@anits.edu.in','K. AMARAVATHI',	'Assistant Professor',	'B.Tech(CSE), M.Tech(CSE)','pics/32.jpg'),
('lokeswari.cse@anits.edu.in','N.LOKESWARI',	'Assistant Professor',	'M.TECH','pics/33.jpg'),
('nagaratnam.cse@anits.edu.in','A.NAGARATNAM',	'Assistant Professor',	'M.Tech(CSE)','pics/34.jpg'),
('prathap.cse@anits.edu.in','S.PRATHAP',	'Assistant Professor',	'B.Tech(CSE), M.Tech (IT)','pics/35.jpg'),
('priyanka.cse@anits.edu.in','SIVARATRI.S.N.L.PRIYANKA',	'Assistant Professor',	'M.Tech','pics/36.jpg'),
('naidu.cse@anits.edu.in','REDDY NAIDU',	'Assistant Professor',	'B.Tech (CSE), M.Tech (CSE)','pics/37.jpg'),
('sathar.cse@anits.edu.in','G.SATHAR',	'Assistant Professor',	'B.Tech(CSE), M.Tech (CSE)','pics/38.jpg')";

if (($db->query($sql1) === TRUE) && ($db->query($sql2) === TRUE) && ($db->query($sql3) === TRUE) && ($db->query($sql4) === TRUE) && ($db->query($sql5) === TRUE) && ($db->query($sql6) === TRUE)) { ?>
	<script>
    window.location.href = "index.html";
     alert("Database ready.Proceed now ");</script><?php
} else {
    echo "Error: "  . $db->error;
}
?>