<?php
$conn=mysqli_connect("localhost","SRIDHALA","Sri@2003","bashith","3307");
session_start();
$id=$_POST['id'];
$sem=$_POST['sem'];
$_SESSION['id']=$id;
?>
<html>
    <style>
        body{
            background-color :lightyellow;
            overflow-x:hidden;
        }

        </style>
       
    <head><link rel="stylesheet" href="mod.css"></head>
       <title> EXAM REGISTRATION </title>
       <body>
       <div>
        <section class="ptu-title__container">
        <div class="ptu-title__logo-header">
        <a href="https://www.ptuniv.edu.in/" style="text-decoration: none; width: 190px;"> 
        <img src="images/logo.png" class="ptu-title__logo" alt="Puducherry Technological University"> 
        </a>
        </div>
        <div class="ptu-title__collage-name-container">
        <h1 class="ptu-title__collage-name">
        <span class="ptu-title__first-letter">P</span>
        <span>UDUCHERRY </span>
        <span class="ptu-title__first-letter">T</span>
        <span>ECHNOLOGICAL </span>
        <span class="ptu-title__first-letter">U</span>
        <span>NIVERSITY</span>
        </h1>
        <h5 class="ptu-title__place"><span class="w">(</span><b>Government of Puducherry Institution</b><span class="w">)</span></h5>
        <h5 class="ptu-title__place1"><b>Puducherry,India - <span class="w">605 014.</span></b></h5>
<div class="reg">
        <h1 align='center'></h1> <br> <br> </div>
</section>
 
<?php


if(isset($_POST['submit']))
{
    $id=$_POST['id'];


    $query = "SELECT u_student.REGNO,u_student.SNAME,u_student.IMAGE,u_student.EMAIL,u_dept.DEPT_NAME,u_prgm.PRGM_NAME FROM u_student,u_dept,u_prgm
    WHERE u_student.PRGM_ID = u_prgm.PRGM_ID AND u_prgm.DEPT_ID = u_dept.DEPT_ID AND u_student.REGNO='$id'";


$query_run = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
$rowCount = mysqli_num_rows($query_run);
                   if($rowCount>0)
                    {

while($row = mysqli_fetch_array($query_run)){
?>
 <div style="text-align : center; padding-right:600px; margin-right:5px" class="stu1">
 <img src="<?php echo "images/".$row['IMAGE'];?>" width="125px" height="130px" alt="image">

 </div>
<div style="text-align : center; padding-right:600px; margin-right:5px" class="stu1">
    <h4>REGISTER NUMBER : <span class="c"><?php echo $row['REGNO']; ?></span></h4>
</div>
<div style="text-align : center; padding-right:600px; margin-right:5px" class="stu1">
    <h4>NAME : <span class="c"><?php echo $row['SNAME'] ?></span></h4>
</div>
<div style="text-align : center; padding-right:600px; margin-right:5px" class="stu1">
    <h4>PROGRAMME : <span class="c"><?php echo $row['PRGM_NAME'] ?></span></h4>
</div>
<div style="text-align : center; padding-right:600px; margin-right:5px" class="stu1">
    <h4>DEAPARTMENT : <span class="c"><?php echo $row['DEPT_NAME'] ?></span></h4>
</div>
<div style="text-align : center; padding-right:600px; margin-right:5px" class="stu1">
    <h4>EMAIL : <span class="c"><?php echo $row['EMAIL'] ?></span></h4>
</div>
<?php  
}
$query = "SELECT u_hm.REGNO,u_hm.H_OR_M,u_hm.DEPT_ID FROM u_hm WHERE u_hm.REGNO = '$id'";
$query_run = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
$rowCount = mysqli_num_rows($query_run);
                   if($rowCount>0)
                    {
                        while($row = mysqli_fetch_array($query_run)){?>
<div style="text-align : center; padding-right:600px; margin-right:5px" class="stu1">
    <h4>HONOR/MINOR : <span class="c"><?php echo $row['H_OR_M'] ?></span></h4>
</div>
                            
                     <?php   }
                    }
}
else{?><center><h2>STUDENT WITH <?php echo $id ?> NOT EXIST</h2></center><?php
}
}
?>
<?php
if(isset($_POST['submit']))
{

$id=$_POST['id'];
$query =  "SELECT u_exam_result.COURSE_CODE,u_exam_result.SEM,u_course.COURSE_NAME,u_course.CREDITS,u_course.COURSE_TYPE,u_exam_result.RESULT FROM u_exam_result,u_course WHERE u_exam_result.COURSE_CODE = u_course.COURSE_CODE AND u_exam_result.REGNO='$id' AND u_exam_result.SEM='$sem'";
$query_run = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
$flag=0;
$rowCount = mysqli_num_rows($query_run);
                   if($rowCount>0)
                    {?><center>
                        <H2>STUDENT RESULT </H2>

                </center>
                <div class="flex_cont">
                <div class="flex_cont">
                <table class="result_table" align="" border="3px">
                             <tr>
                                 <th>SUB_CODE</th>
                                 <th>SUB_NAME</th>
                                 <th>TYPE</th>
                                 <th>SEM</th>
                                 <th>RESULT</th>
                                 <th>CREDITS</th>
                          </tr> 
<?php                        
while($rows = mysqli_fetch_array($query_run))
{

?>

                <tr>

                <td><center><?php {echo $rows['COURSE_CODE'];} ?> </center></td>
                <td><center> <?php {echo $rows['COURSE_NAME'];} ?> </center></td>
                <td><center> <?php {echo $rows['COURSE_TYPE'];} ?> </center></td>
                <td> <center><?php {echo $rows['SEM']; }?> </center></td>
                <td> <center><?php {echo $rows['RESULT']; }?></center> </td>
                <td> <center><?php {echo $rows['CREDITS']; }?> </center></td>



<?php 
             
            }
            ?>
            </table>
            </div>
            <div class="flex_cont1">
            <div class="table-tilt">
            <table class="search_table" align="" border="3px">
                <tr>
                    <th>CREDITS EARNED IN <?php echo $sem;?> SEMESTER</th>
            
            </tr>
                <?php 
                $query1 =  "SELECT SUM(u_course.CREDITS) FROM u_course,u_exam_result WHERE u_course.COURSE_CODE = u_exam_result.COURSE_CODE AND u_exam_result.REGNO = '$id' AND u_exam_result.RESULT != 'F' AND u_exam_result.RESULT != 'Z' AND u_exam_result.SEM = '$sem' AND u_course.COURSE_CATG != 'OEC' AND u_course.COURSE_CODE NOT LIKE'%H0%' AND u_course.COURSE_CODE NOT LIKE'%M0%'";
                
                $query_run1 = mysqli_query($conn, $query1) or die("Error: " . mysqli_error($conn));
                while($rows = mysqli_fetch_array($query_run1))
                {
                ?><tr><td><center><?php {echo $rows['SUM(u_course.CREDITS)'];} ?>/
                <?php
                }
                $query5 =  "SELECT SUM(u_course.CREDITS) FROM u_course,u_exam_result WHERE u_course.COURSE_CODE = u_exam_result.COURSE_CODE AND u_exam_result.REGNO = '$id' AND u_exam_result.SEM = '$sem' AND u_course.COURSE_CATG != 'OEC' AND u_course.COURSE_CODE NOT LIKE'%H0%' AND u_course.COURSE_CODE NOT LIKE'%M0%'";
                
                $query_run5 = mysqli_query($conn, $query5) or die("Error: " . mysqli_error($conn));
                while($rows = mysqli_fetch_array($query_run5))
                {?>
                <?php {echo $rows['SUM(u_course.CREDITS)'];} ?></center></td></tr>
                </table>
                </div>
                <?php
                }
                ?>
            <br>
            <br>
            <div class="table-tilt">
            <table class="search_table" align="center" border="3px">
                <tr>
                    <th>CREDITS EARNED UPTO <?php echo $sem;?> SEM</th>

            
            </tr>
                <?php 
                $query3 =  "SELECT SUM(u_course.CREDITS) FROM u_course,u_exam_result WHERE u_course.COURSE_CODE = u_exam_result.COURSE_CODE AND u_exam_result.REGNO = '$id' AND u_exam_result.RESULT != 'F' AND u_exam_result.RESULT != 'Z' AND u_exam_result.SEM <= '$sem' AND u_course.COURSE_CATG != 'OEC'";
                
                $query_run3 = mysqli_query($conn, $query3) or die("Error: " . mysqli_error($conn));
                while($rows = mysqli_fetch_array($query_run3))
                {
                    $PENDING = $rows['SUM(u_course.CREDITS)']
                ?><tr><td><center><?php {echo $PENDING;} ?>/
                <?php
                }?>

<?php 
                $query3 =  "SELECT SUM(u_course.CREDITS) FROM u_course,u_exam_result WHERE u_course.COURSE_CODE = u_exam_result.COURSE_CODE AND u_exam_result.REGNO = '$id' AND u_exam_result.SEM <= '$sem' AND u_course.COURSE_CATG != 'OEC'";
                
                $query_run3 = mysqli_query($conn, $query3) or die("Error: " . mysqli_error($conn));
                while($rows = mysqli_fetch_array($query_run3))
                {
                    $totalcredit = $rows['SUM(u_course.CREDITS)']
                ?><?php {echo $totalcredit;} ?> </center></td>
                <?php
                $PENDING = $totalcredit - $PENDING;
                }?>
</table>
</div>
<br>
<br>
<div class="table-tilt">
<table class="search_table" align="center" border="3px">
                <tr>
                    <th>PENDING CREDITS</th>
                <tr>
                <tr>
                    <td><center><?php {echo $PENDING;} ?> </center></td>
                </tr>
            </table>
            </div>
            </div>
            
            
            <br>  
            <br>
            <br>              
<?php
    
          }
?>
<?php
if($sem>2){
    ?>
    <div class="flex_cont2">
    <div class="table-tilt">
    <?php
    $query = "SELECT u_course.COURSE_CODE,u_course.COURSE_NAME,u_exam_result.RESULT,u_exam_result.SEM FROM u_course,u_exam_result WHERE u_course.COURSE_CODE = u_exam_result.COURSE_CODE AND u_course.COURSE_CATG = 'oec' AND u_exam_result.REGNO = '20IT1031' AND u_exam_result.RESULT != 'F' AND u_exam_result.RESULT != 'Z'";
    $query_run = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
    $rowCount = mysqli_num_rows($query_run);
    ?>
    <table class="search_table" align="center" border="3px">
        <tr><th colspan="2"><center> OPEN ELECTIVE </center></th></tr>
        <tr><th>OEC</th><th>NPTEL SWAYAM</th></tr>
    <?php
    if($rowCount == 0)
    { ?>
    <tr><td> 0 COMPLETED AND 2 PENDING</td>
    <?php
    }
    else if($rowCount == 1)
    { ?>
    <tr><td>1 COURSE COMPLETED AND 1 PENDING</td> 
    <?php
    }
    else if($rowCount == 2)
    { ?>
    <tr><td> 2 COURSE COMPLETED AND 0 PENDING</td>
    <?php
    }  
        $query = "SELECT * FROM u_nptel_completion WHERE u_nptel_completion.REGNO = '$id' AND u_nptel_completion.RESULT = 'PASS'";
    $query_run = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
    $rowCount = mysqli_num_rows($query_run);
    if($rowCount == 0)
    { ?>
    <td> 2 OEC COURSE PENDING</td></tr></table>
    <?php
    }
    else if($rowCount == 1)
    { ?>
    <td>1 COURSE COMPLETED AND 1 PENDING</td></tr> </table>
    <?php
    }
    else if($rowCount == 2)
    { ?>
    <td> 2 COURSE COMPLETED AND 0 PENDING</td></tr></table>
    <?php
    }  

?>
</div>
<br><br>
<?php

$query = "SELECT u_hm.REGNO,u_hm.H_OR_M,u_hm.DEPT_ID FROM u_hm WHERE u_hm.REGNO = '$id'";
$query_run = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
$rowCount = mysqli_num_rows($query_run);
                   if($rowCount>0)
                   {
                    while($row = mysqli_fetch_array($query_run))
                    { ?>
                    <div class="table-tilt">
                     <table class="search_table" align="center" border="3px">
                        <tr>
                            <th><center><?php {echo $row['H_OR_M'];} ?> CREDITS</center></th>
                            <th><center>NUMBER OF BACKLOGS </center></th>
                        </tr>
<?php                     
                    }   
$query = "SELECT SUM(u_course.CREDITS) FROM u_course,u_exam_result WHERE u_course.COURSE_CODE = u_exam_result.COURSE_CODE AND u_exam_result.REGNO = '$id' AND u_exam_result.RESULT != 'F' AND u_exam_result.RESULT != 'Z' AND u_exam_result.SEM <= '$sem' AND u_course.COURSE_CATG != 'OEC' AND u_course.COURSE_CODE LIKE'%H0%' OR '%M0%'";
$query_run = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
$rowCount = mysqli_num_rows($query_run);
while($row = mysqli_fetch_array($query_run)){
    ?>
    <tr>
        <td><center><?php {echo $row['SUM(u_course.CREDITS)'];} ?> / 20</center></td>
    <?php    
                   }
                   $query = "SELECT COUNT(u_exam_result.RESULT) FROM u_exam_result,u_course WHERE u_course.COURSE_CODE = u_exam_result.COURSE_CODE  AND u_exam_result.RESULT = 'F' AND u_exam_result.REGNO = '$id' AND u_exam_result.SEM <='$sem' AND u_course.COURSE_CODE LIKE'%H0%' OR '%M0%'";
                   $query_run = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
                   $rowCount = mysqli_num_rows($query_run);
                   while($row = mysqli_fetch_array($query_run)){                 
?> 
<td><center><?php {echo $row['COUNT(u_exam_result.RESULT)'];} ?></center></td>
<?php 
 } 
 ?>
</table>
</div>
</div>
</div>
<br>
<br>
<?php                   
 }



    }
}
?>








<!-- <form align='center'  method="post" action="arrear.php" enctype="multipart/form-data">
   <input type="submit" name="submit" id="submit" value="Apply For Arrear Examination">
</form>    -->

</body>  
</html>