<?php

include'../database_connection/config.php';
session_start();

if($_SESSION['auth_user']['admin_id']==0){
echo"<script>window.location.href='../schoolOrganization1/Page-1.html'</script>";

}


   if(ISSET($_POST['post'])){


            
                    $headline = $_POST['headline'];
                    $description = $_POST['description'];
                    $file = file_get_contents($_FILES['img']['tmp_name']);





                    
$sql = $conn->prepare("INSERT INTO school_announcement(headline, description, img) VALUES (?, ?, ?)");
                $sql->execute([$headline, $description, $file]);
                echo "<script>alert('POST ADDED')</script>";

                echo ("<script>location.href='School_Announcement.php'</script>");

}

?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="SCHOOL ADMIN">
    <meta name="description" content="">
    <title>School_Announcement</title>
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

        <button type="button" class="myButton" data-toggle="modal" data-target="#myModal">POST</button><br><br>

        <h2 class="u-custom-font u-font-roboto-slab u-text u-text-default-xl u-text-1">SCHOOL ANNOUNCEMENT</h2>
        <div class="u-expanded-width-sm u-expanded-width-xs u-list u-list-1">
          <div class="u-repeater u-repeater-1">

          	<?php 

            $stmt = $conn->prepare("SELECT * FROM school_announcement ORDER BY id DESC");
            $stmt->execute();
            $result = $stmt->fetchAll();

                        foreach($result aS $announce)
                        {
              $date = date_create($announce['date']);
              $Announcement_Date =  date_format($date,"F / d l / Y - g:i A");
                            ?>
            

            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-1">
                <div class="u-container-style u-custom-color-2 u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-radius-30 u-shape-round u-group-1">
                  <div class="u-container-layout u-container-layout-2">
                    <p class="u-text u-text-default-lg u-text-default-xl u-text-2"><?=$announce['description']?></p>

                    <!-- <a href="admin-delete-post.php?id=" class="btn btn-danger btn-circle" style="float: right;">DELETE POST</a> -->

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModaldelete" style="float: right;">DELETE POST</button>
                    <p class="u-text u-text-default-lg u-text-default-xl u-text-2">DATE: <?=$Announcement_Date?></p>

                    <img class="u-image u-image-default u-image-3" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($announce['img']); ?>" alt="" data-image-width="1280" data-image-height="824">
                    <div class="u-container-style u-custom-color-1 u-expanded-width-sm u-expanded-width-xs u-group u-opacity u-opacity-60 u-group-2">
                      <div class="u-container-layout u-container-layout-3">
                        <h2 class="u-custom-font u-font-roboto-slab u-text u-text-3"><?=$announce['headline']?></h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<!----------------------------------DELETE POST MODAL------------------------------------->
       <div class="modal fade" id="myModaldelete">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">Confirmation</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body">

          <p>Are you sure you want to delete this post?</p>
               
          <a href="admin-delete-post.php?id=<?=$announce['id']?>" class="btn btn-danger" style="float: right;">DELETE POST</a>
          

          <button type="button" style="float: right;" class="btn btn-secondary" data-dismiss="modal">Close</button>

       
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


<!----------------------------------ADD ANNOUNCEMENT MODAL------------------------------------->
       <div class="modal fade" id="myModal">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">ENTER DETAILS</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body">

          <form action="" method="POST" enctype="multipart/form-data">
                
                    <div class="form-group">
                       <label for="inputAdminName">HEADLINE</label>
                       <input type="text" class="form-control" id="inputAdminName" placeholder="Enter Headline" name="headline" required>
                   </div>
                   <div class="form-group">
                       <label for="inputPosition">Description</label>
                       
                       <textarea class="form-control" id="inputPosition" placeholder="Input your Description" name="description"></textarea required>
                   </div>
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
                   
               
              
           <button name="post" class="btn btn-primary">POST</button>

           <button type="button" style="float: right;" class="btn btn-secondary" data-dismiss="modal">Close</button>

       </form>
          </div>

       </div>
  </div>
</div>
    

  
</body></html>