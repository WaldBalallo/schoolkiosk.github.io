<?php

include'../database_connection/config.php';
session_start();

if($_SESSION['auth_user']['admin_id']==0){
echo"<script>window.location.href='../schoolOrganization1/Page-1.html'</script>";

}



if(ISSET($_POST['add_student'])){
            
                    $fullName = $_POST['fullname'];
                    $course = $_POST['course'];
                    $year = $_POST['year'];
                    $section = $_POST['section'];
                    
$sql = $conn->prepare("INSERT INTO students(full_name, course, year, section) VALUES (?, ?, ?, ?)");
                $sql->execute([$fullName, $course, $year, $section]);
                echo "<script>alert('STUDENT ADDED')</script>";

                echo ("<script>location.href='Students.php?course=".$course."&&year=".$year."&&section=".$section."'</script>");

}


if(ISSET($_POST['add_schedule'])){
            
                    $file = file_get_contents($_FILES['schedImg']['tmp_name']);
                    $course = $_POST['course'];
                    $year = $_POST['year'];
                    $section = $_POST['section'];
                    
$sql = $conn->prepare("INSERT INTO student_schedules(course, year, section, schedule_img) VALUES (?, ?, ?, ?)");
                $sql->execute([$course, $year, $section, $file]);
                echo "<script>alert('SCHEDULE ADDED')</script>";

                echo ("<script>location.href='Students.php?course=".$course."&&year=".$year."&&section=".$section."'</script>");

}

?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="SCHOOL ADMIN">
    <meta name="description" content="">
    <title>Students</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/Students.css" media="screen">
    <!-- <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script> -->
    <meta name="generator" content="Nicepage 5.4.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,200,300,400,500,600,700,800,900">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>




    <link href="view_requested_docs_Jscripts_css/bootstrap.min.css" rel="stylesheet">   
<script src="view_requested_docs_Jscripts_css/jquery.min.js"></script>
<link rel="stylesheet" 
href="view_requested_docs_Jscripts_css/jquery.dataTables.min.css"></style>
<script type="text/javascript" 
src="view_requested_docs_Jscripts_css/jquery.dataTables.min.js"></script>
<script type="text/javascript" 
src="view_requested_docs_Jscripts_css/bootstrap.min.js"></script>
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Students">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">

<style>
  .u-section-1 .u-sheet-1 {
    min-height: 10px;
}


.myButton {
  float: right;
  box-shadow: 3px 4px 0px 0px #1564ad;
  background:linear-gradient(to bottom, #79bbff 5%, #378de5 100%);
  background-color:#79bbff;
  border-radius:19px;
  border:3px solid #337bc4;
  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Arial;
  font-size:12px;
  font-weight:bold;
  padding:8px 18px;
  text-decoration:none;
  text-shadow:0px 1px 0px #528ecc;
}
.myButton:hover {
  background:linear-gradient(to bottom, #378de5 5%, #79bbff 100%);
  background-color:#378de5;
}
.myButton:active {
  position:relative;
  top:1px;
}

.myButton1 {
  
  display:inline-block;
  cursor:pointer;
  
  
  font-size:12px;
  font-weight:bold;
  padding:8px 18px;
  text-decoration:none;
  text-shadow:0px 1px 0px #528ecc;
}


.u-section-1 .u-image-2 {
    width: 87px;
    height: 87px;
    transition-duration: 0.5s;
    margin: 0 auto 0 ;
}

</style>

</head>


  <body class="u-body u-xl-mode" data-lang="en">
    <section class="u-clearfix u-gradient u-section-1" id="sec-f243">
      <div class="u-clearfix u-sheet u-sheet-1">
        <img class="u-image u-image-contain u-image-default u-image-1" src="images/logo.png" alt="" data-image-width="1000" data-image-height="200">

        <a href="dashboard.php" class="myButton1">
        <img class="u-hover-feature u-image u-image-contain u-image-round u-preserve-proportions u-image-2" src="images/home.png" alt="" data-image-width="100" data-image-height="100" title="Dashboard">
        </a>

        <?php 

             if (isset($_GET['course'])) {
              
            $course = $_GET['course'];

            ?>

        <a href="Course.php?courseAcronym=<?=$course?>" class="myButton1">
        <img class="u-hover-feature u-image u-image-contain u-image-round u-preserve-proportions u-image-2" src="images/back.png" alt="" data-image-width="100" data-image-height="100" title="Course & Section">
        </a>
        <?php
    }
    ?>
        <a class="myButton1" data-toggle="modal" data-target="#myModalsched">
        <img class="u-hover-feature u-image u-image-contain u-image-round u-preserve-proportions u-image-2" src="images/schedule.png" alt="" data-image-width="100" data-image-height="100" title="Dashboard">
        </a>

        <?php 

        if (isset($_GET['course']) && isset($_GET['year']) && isset($_GET['section'])) {
              
            $course = $_GET['course'];
            $year = $_GET['year'];
            $section = $_GET['section'];

            $stmt = $conn->prepare("SELECT * FROM student_schedules WHERE course = ? AND year = ? AND section = ?");
            $stmt->execute([$course, $year, $section]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (empty($result['id'])) {

            ?>
        <a class="myButton1" data-toggle="modal" data-target="#myModaladdsched">
        <img class="u-hover-feature u-image u-image-contain u-image-round u-preserve-proportions u-image-2" src="images/add_schedule.png" alt="" data-image-width="100" data-image-height="100" title="Dashboard">
        </a>
            <?php
                }
                }
                ?>

        

        <button type="button" class="myButton" data-toggle="modal" data-target="#myModal">ADD STUDENT</button>

        <h2 class="u-custom-font u-font-roboto-slab u-text u-text-default-xl u-text-1">STUDENTS</h2>
        
      </div>

      <div class="table-responsive" style="justify-content: center; margin-bottom: 80px; border: 2px solid black;">
<table id="mytable" class="display table" width="100%" >

<thead>  
          <tr>  
            <th>Full Name</th>  
            <th>Course</th>  
            <th>Year</th>  
            <th>Section</th>  
          </tr>  
        </thead>  
        <tbody>
          <?php 

        if (isset($_GET['course']) && isset($_GET['year']) && isset($_GET['section'])) {
              
            $course = $_GET['course'];
            $year = $_GET['year'];
            $section = $_GET['section'];

            $stmt = $conn->prepare("SELECT * FROM students WHERE course = ? AND year = ? AND section = ?");
            $stmt->execute([$course, $year, $section]);
            $result = $stmt->fetchAll();

                        foreach($result aS $students)
                        {
                            ?>
          <tr>  
            <td><?=$students['full_name']?></td>  
            <td><?=$students['course']?></td>  
            <td><?=$students['year']?></td>  
            <td><?=$students['section']?></td>  
          </tr>  
            <?php
                    }
                }
                    
                 ?>
        </tbody>  


</table>
</div>
      
    </section>

        <?php 

             if (isset($_GET['course']) && isset($_GET['year']) && isset($_GET['section'])) {
              
            $course = $_GET['course'];
            $year = $_GET['year'];
            $section = $_GET['section'];

            ?>
<!-------------------------------------ADD STUDENT MODAL------------------------------------->
       <div class="modal fade" id="myModal">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">ENTER DETAILS</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body">

          <form action="" method="POST">

                    <div class="form-group">
                       <label for="inputFullName">Full Name</label>
                       <input type="text" class="form-control" id="inputFullName" placeholder="Input Student Name" name="fullname" required>
                   </div>
                   <div class="form-group">
                       <label for="inputCourse">Course</label>
                       <input type="text" class="form-control" id="inputCourse" value="<?=$course?>" name="course" required readonly>
                   </div>
                   <div class="form-group">
                       <label for="inputYear">Year</label>
                       <input type="text" class="form-control" id="inputYear" value="<?=$year?>" name="year" required readonly>
                   </div>
                   <div class="form-group">
                       <label for="inputSection">Section</label>
                       <input type="number" class="form-control" id="inputSection" value="<?=$section?>" name="section" required readonly>
                   </div>
                   
                       
                   <!-- <div class="form-group">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                              <option selected>Choose...</option>
                              <option>...</option>
                        </select>
                   </div> -->
                   
               
              
           <button name="add_student" class="btn btn-primary">+ ADD</button>

           <button type="button" style="float: right;" class="btn btn-secondary" data-dismiss="modal">Close</button>

       </form>
          </div>

       </div>
  </div>
</div>

 <?php
        }
   
    
 ?>

 <?php 

             if (isset($_GET['course']) && isset($_GET['year']) && isset($_GET['section'])) {
              
            $course = $_GET['course'];
            $year = $_GET['year'];
            $section = $_GET['section'];

            ?>


 <!-------------------------------------ADD SCHEDULE MODAL------------------------------------->
       <div class="modal fade" id="myModaladdsched">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">ADD SCHEDULE</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body">

          <form action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                       <label for="inputIMG">Schedule IMG</label>
                       <input type="file" class="form-control" id="inputIMG" name="schedImg" required>
                   </div>
                   <div class="form-group">
                       <label for="inputCourse">Course</label>
                       <input type="text" class="form-control" id="inputCourse" value="<?=$course?>" name="course" required readonly>
                   </div>
                   <div class="form-group">
                       <label for="inputYear">Year</label>
                       <input type="text" class="form-control" id="inputYear" value="<?=$year?>" name="year" required readonly>
                   </div>
                   <div class="form-group">
                       <label for="inputSection">Section</label>
                       <input type="number" class="form-control" id="inputSection" value="<?=$section?>" name="section" required readonly>
                   </div>
                   
                       
                   <!-- <div class="form-group">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                              <option selected>Choose...</option>
                              <option>...</option>
                        </select>
                   </div> -->
                   
               
              
           <button name="add_schedule" class="btn btn-primary">+ ADD</button>

           <button type="button" style="float: right;" class="btn btn-secondary" data-dismiss="modal">Close</button>

       </form>
          </div>

       </div>
  </div>
</div>

 <?php
        }
   
    
 ?>

 <!-------------------------------------SCHEDULE MODAL------------------------------------->
  <div class="modal fade" id="myModalsched">
   <div class="modal-dialog modal-lg">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">SCHEDULE</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body"> <div class="text-center">
            <?php 

        if (isset($_GET['course']) && isset($_GET['year']) && isset($_GET['section'])) {
              
            $course = $_GET['course'];
            $year = $_GET['year'];
            $section = $_GET['section'];

            $stmt = $conn->prepare("SELECT * FROM student_schedules WHERE course = ? AND year = ? AND section = ?");
            $stmt->execute([$course, $year, $section]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!empty($result['id'])) {

            ?>
            <a href="admin-delete-schedule.php?id=<?=$result['id']?>&&course=<?=$course?>&&year=<?=$year?>&&section=<?=$section?>" class="btn btn-danger">DELETE SCHEDULE</a>
            <img class="img-fluid rounded" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($result['schedule_img']); ?>" alt="Schedule"/>
            <?php
                }else{
                    echo 'NO SCHEDULED SUBJECTS';
                }
                }
                ?>

        </div>


      </div>
           <!-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
       </div>
  </div>
</div>
    
    
    
<script>
$(document).ready(function(){
    $('#mytable').dataTable();
});
</script>
  
</body></html>