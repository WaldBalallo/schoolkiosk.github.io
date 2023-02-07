<?php

include'../database_connection/config.php';
session_start();

if($_SESSION['auth_user']['admin_id']==0){
echo"<script>window.location.href='../schoolOrganization1/Page-1.html'</script>";

}


if(ISSET($_POST['add_calendar'])){

                    $file = file_get_contents($_FILES['img']['tmp_name']);

                    
$sql = $conn->prepare("INSERT INTO school_calendar(calendar) VALUES (?)");
                $sql->execute([$file]);
                echo "<script>alert('CALENDAR ADDED')</script>";

                echo ("<script>location.href='School_Calendar.php'</script>");

}

if(ISSET($_POST['delete'])){
                    
                    $id = $_POST['calendar_iD'];
                    
    $stmt = $conn->prepare("DELETE FROM school_calendar WHERE id= ?");
    $stmt->execute([$id]);
    echo "<script>alert('CALENDAR DELETED')</script>";

    echo ("<script>location.href='School_Calendar.php'</script>");

}

if(ISSET($_POST['update'])){

                    $file = file_get_contents($_FILES['img']['tmp_name']);
                    $calendar_id = $_POST['calendarID'];

                    
$sql = $conn->prepare("UPDATE school_calendar SET calendar = ? WHERE id = ?");
                $sql->execute([$file, $calendar_id]);
                echo "<script>alert('CALENDAR UPDATED')</script>";

                echo ("<script>location.href='School_Map.php'</script>");

}

?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="SCHOOL ADMIN">
    <meta name="description" content="">
    <title>School_Calendar</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/School_Announcement.css" media="screen">
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
    <meta property="og:title" content="School_Announcement">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">

<style>
.u-section-1 .u-repeater-1 {
    grid-gap: 12px 12px;
    grid-template-columns: 100%;
    min-height: 100px;
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

.myButtonupdate {
  float: right;
  border-radius:19px;
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
.myButtonupdate:hover {
  background: linear-gradient(to bottom, #37e56d 5%, #298935 100%);
    background-color: #22973b;
}
.myButtonupdate:active {
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

.u-section-1 .u-group-1 {
    min-height: 500px;
    height: auto;
    margin: 14px 20px 0;
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

        <button type="button" class="myButton" data-toggle="modal" data-target="#myModal">ADD SCHOOL CALENDAR</button>

        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModaldelete" style="float: right; margin-right: 5px;">DELETE CALENDAR</button><br><br>

        <h2 class="u-custom-font u-font-roboto-slab u-text u-text-default-xl u-text-1" style="text-align: center;">SCHOOL CALENDAR</h2>
        <div class="u-expanded-width-sm u-expanded-width-xs u-list u-list-1">
          <div class="u-repeater u-repeater-1">

          	<?php 

            $stmt = $conn->prepare("SELECT * FROM school_calendar");
            $stmt->execute();
            $result = $stmt->fetchAll();

                foreach($result aS $calendar)
                        {

                            ?>
            

            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-1">
                <div class="u-container-style u-custom-color-2 u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-radius-30 u-shape-round u-group-1">
                  <div class="u-container-layout u-container-layout-2">
                    <br>
                    <img class="u-image u-image-default u-image-3" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($calendar['calendar']); ?>" alt="" data-image-width="1280" data-image-height="824">

                    <br><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalupdate_<?=$calendar['id']?>" style="float: right;">Update</button><br>
                    
                  </div>
                </div>
              </div>
            </div>



<!---------------------------------------------UPDATE MAP MODAL----------------------------------------------------->
    <div class="modal fade" id="myModalupdate_<?=$calendar['id']?>">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">UPDATE CALENDAR</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body">

          <form action="" method="POST" enctype="multipart/form-data">

          <input type="hidden" class="form-control" value="<?=$calendar['id']?>" name="calendarID" required>

                   <div class="form-group">
                       <label for="inputImg">Image</label>
                       <input type="file" class="form-control" id="inputImg"  name="img" required>
                   </div>
                   
                       
                   <!-- <div class="form-group">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                              <option selected>Choose...</option>
                              <option>...</option>
                        </select>
                   </div> -->
                   
               
              
           <button name="update" class="btn btn-success">UPDATE</button>

           <button type="button" style="float: right;" class="btn btn-secondary" data-dismiss="modal">Close</button>

       </form>
          </div>

       </div>
  </div>
</div>

            <?php
            }
            ?>

          </div>
        </div>
      </div>
      
    </section>


<!----------------------------------ADD SCHOOL MAP MODAL------------------------------------->
       <div class="modal fade" id="myModal">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">ADD IMAGE</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body">

          <form action="" method="POST" enctype="multipart/form-data">
                
                   <div class="form-group">
                       <label for="inputImg">Image</label>
                       <input type="file" class="form-control" id="inputImg"  name="img" required>
                   </div>
                   
                       
                   <!-- <div class="form-group">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                              <option selected>Choose...</option>
                              <option>...</option>
                        </select>
                   </div> -->
                   
               
              
           <button name="add_calendar" class="btn btn-primary">+ ADD</button>

           <button type="button" style="float: right;" class="btn btn-secondary" data-dismiss="modal">Close</button>

       </form>
          </div>

       </div>
  </div>
</div>




<!---------------------------------------------DELETE MAP MODAL----------------------------------------------------------->
    <div class="modal fade" id="myModaldelete">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">DELETE CALENDAR</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body">

          <form action="" method="POST" enctype="multipart/form-data">
                   
                       
                   <div class="form-group">
                        <label for="inputSchoolAdmin">School Map</label>
                        <select id="inputSchoolAdmin" name="calendar_iD" class="form-control">
                              <option></option>
                              <?php

                        $stmt = $conn->prepare("SELECT * FROM school_calendar");
                    $stmt->execute();
                     while ($SchoolCalendar = $stmt->fetch(PDO::FETCH_ASSOC)) {
                     echo '<option value="'.$SchoolCalendar['id'].'">School Calendar '.$SchoolCalendar['id'].'</option>';
                     }
                                ?>
                        </select>
                   </div>
                   
               
              
           <button name="delete" class="btn btn-danger">DELETE</button>

           <button type="button" style="float: right;" class="btn btn-secondary" data-dismiss="modal">Close</button>

       </form>
          </div>

       </div>
  </div>
</div>
    

  
</body></html>