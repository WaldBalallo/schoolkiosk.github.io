<?php

include'../database_connection/config.php';
session_start();

if($_SESSION['auth_user']['admin_id']==0){
echo"<script>window.location.href='../schoolOrganization1/Page-1.html'</script>";

}

if(ISSET($_POST['add_section'])){
            
                    $course = $_POST['course'];
                    $year = $_POST['year'];
                    $section = $_POST['section'];
                    
$sql = $conn->prepare("INSERT INTO course_and_section(course_name, year, section ) VALUES (?, ?, ?)");
                $sql->execute([$course, $year, $section]);
                echo "<script>alert('SECTION ADDED')</script>";

                echo ("<script>location.href='Course.php?courseAcronym=".$course."'</script>");

}

if(ISSET($_POST['delete_section'])){
            
                    $id = $_POST['section'];
                    $course_acronym = $_POST['course'];
                    
    $stmt = $conn->prepare("DELETE FROM course_and_section WHERE id= ?");
    $stmt->execute([$id]);
    echo "<script>alert('SECTION DELETED')</script>";

    echo ("<script>location.href='Course.php?courseAcronym=".$course_acronym."'</script>");

}

?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="SCHOOL ADMIN">
    <meta name="description" content="">
    <title>Course</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/Course.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <!-- <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script> -->
    <meta name="generator" content="Nicepage 5.4.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,200,300,400,500,600,700,800,900">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Course">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">

<style>
	.u-section-1 .u-text-3 {
    font-size: 2.5rem;
    font-weight: 500;
    margin: 29px 35px 51px;
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


.myButton2 {
  float: right;
  box-shadow: 3px 4px 0px 0px #973232;
  background:linear-gradient(to bottom, #ff7979 5%, #e5373f 100%);
  background-color:#d97373;
  border-radius:19px;
  border:3px solid #cd4d4d;
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
.myButton2:hover {
  background:linear-gradient(to bottom, #e53737 5%, #ff7979 100%);
  background-color:#e53737;
}
.myButton2:active {
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

        <a href="School_Courses.php" class="myButton1">
        <img class="u-hover-feature u-image u-image-contain u-image-round u-preserve-proportions u-image-2" src="images/back.png" alt="" data-image-width="100" data-image-height="100" title="School Course">
        </a>

        <button type="button" class="myButton" data-toggle="modal" data-target="#myModal">ADD SECTION</button>
        <button type="button" class="myButton2" data-toggle="modal" data-target="#myModaldelete">Delete Section</button><br><br>


        <h2 class="u-custom-font u-font-roboto-slab u-text u-text-default-xl u-text-1">COURSE &amp; SECTION</h2>
        <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            
          	<?php 

          	if (isset($_GET['courseAcronym'])) {
          		
          	$course_acronym = $_GET['courseAcronym'];

            $stmt = $conn->prepare("SELECT * FROM course_and_section WHERE course_name = ? ORDER BY year, section ASC");
            $stmt->execute([$course_acronym]);
            $result = $stmt->fetchAll();

                        foreach($result aS $courseSection)
                        {
                            ?>

            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
                <div class="u-align-center u-border-3 u-border-black u-container-style u-expanded-width u-group u-radius-12 u-shape-round u-white u-group-2">

                  <a href="Students.php?course=<?=$courseSection['course_name']?>&&year=<?=$courseSection['year']?>&&section=<?=$courseSection['section']?>" style="text-decoration: none; color: black;">
                  <div class="u-container-layout u-container-layout-4">
                    <p class="u-text u-text-default u-text-3"><?=$courseSection['course_name']?> <?=$courseSection['year']?>-<?=$courseSection['section']?></p>
                  </div>
                </a>
                </div>
              </div>
            </div>
            <?php
                    }
                }
                    
                 ?>


        </div>
      </div>
      
    </section>

    <?php 

             if (isset($_GET['courseAcronym'])) {
              
            $course_acronym = $_GET['courseAcronym'];

            ?>
<!-------------------------------------ADD COURSE YEAR SECTION MODAL------------------------------------->
       <div class="modal fade" id="myModal">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">ENTER DETAILS</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body">

          <form action="" method="POST">
                
<input type="text" class="form-control" value="<?=$course_acronym?>" name="course" readonly required>

                    <div class="form-group">
                       <label for="inputYear">Year</label>
                       <input type="number" class="form-control" id="inputYear" placeholder="Ex. 1" name="year" required>
                   </div>
                   <div class="form-group">
                       <label for="inputSection">Section</label>
                       <input type="number" class="form-control" id="inputSection" placeholder="Ex. 1" name="section" required>
                   </div>
                   
                       
                   <!-- <div class="form-group">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                              <option selected>Choose...</option>
                              <option>...</option>
                        </select>
                   </div> -->
                   
               
              
           <button name="add_section" class="btn btn-primary">+ ADD</button>

           <button type="button" style="float: right;" class="btn btn-secondary" data-dismiss="modal">Close</button>

       </form>
          </div>

       </div>
  </div>
</div>

 <?php
        }
   
    
 ?>


<!----------------------------------DELETE COURSE YEAR SECTION MODAL------------------------------------->
       <div class="modal fade" id="myModaldelete">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">DELETE SECTION</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body">

          <form action="" method="POST">
                   
            <?php 

             if (isset($_GET['courseAcronym'])) {
              
            $course_acronym = $_GET['courseAcronym'];

            ?>
<input type="hidden" class="form-control" value="<?=$course_acronym?>" name="course" readonly required>
 <?php
        }
   
    
 ?>


                   <div class="form-group">
                        <label for="inputCourse">SELECT SECTION</label>
                        <select name="section" id="inputCourse" class="form-control" >
                              <option></option>
                              <?php 

                              $courseSection = $_GET['courseAcronym'];

                        $stmt = $conn->prepare("SELECT * FROM course_and_section WHERE course_name = ?");
                    $stmt->execute([$courseSection]);
                     while ($course = $stmt->fetch(PDO::FETCH_ASSOC)) {
                     echo '<option value="'.$course['id'].'">'.$course['course_name'].', Year '.$course['year'].'-'.$course['section'].'</option>';
                     }
                                ?>
                        </select>
                   </div>
                   
               
              
           <button name="delete_section" class="btn btn-danger">DELETE</button>

           <button type="button" style="float: right;" class="btn btn-secondary" data-dismiss="modal">Close</button>

       </form>
          </div>

       </div>
  </div>
</div>
    

  
</body></html>