<?php

include'../database_connection/config.php';
session_start();

if($_SESSION['auth_user']['admin_id']==0){
echo"<script>window.location.href='../schoolOrganization1/Page-1.html'</script>";

}


if(ISSET($_POST['add_officer'])){


            
                    $organization_ID = $_POST['organization'];
                    $full_name = $_POST['fullname'];
                    $position = $_POST['position'];
                    $file = file_get_contents($_FILES['img']['tmp_name']);





                    
$sql = $conn->prepare("INSERT INTO organization_officers(organization_id, full_name, position, img) VALUES (?, ?, ?, ?)");
                $sql->execute([$organization_ID, $full_name, $position, $file]);
                echo "<script>alert('OFFICER ADDED')</script>";

                echo ("<script>location.href='Organization_Officers.php?id=".$organization_ID."'</script>");

}


if(ISSET($_POST['delete'])){
                    
                    $organization = $_GET['id'];
                    $id = $_POST['officers_iD'];
                    
    $stmt = $conn->prepare("DELETE FROM organization_officers WHERE id= ?");
    $stmt->execute([$id]);
    echo "<script>alert('OFFICER DELETED')</script>";

    echo ("<script>location.href='Organization_Officers.php?id=".$organization."'</script>");

}


if(ISSET($_POST['update'])){

                    $organization = $_GET['id'];
                    $OrgOfficer_ID = $_POST['orgOfficerID'];
                    $full_name = $_POST['full_name'];
                    $position = $_POST['position'];
                    $file = file_get_contents($_FILES['img']['tmp_name']);

                    
$sql = $conn->prepare("UPDATE organization_officers SET full_name = ?, position = ?, img = ? WHERE id = ?");
                $sql->execute([$full_name, $position, $file, $OrgOfficer_ID]);
                echo "<script>alert('OFFICER UPDATED')</script>";

                echo ("<script>location.href='Organization_Officers.php?id=".$organization."'</script>");

}
?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="SCHOOL ADMIN">
    <meta name="description" content="">
    <title>Officers</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/School_Admin.css" media="screen">
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
    <meta property="og:title" content="School_Admin">
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
        <a href="School_Organization.php" class="myButton1">
        <img class="u-hover-feature u-image u-image-contain u-image-round u-preserve-proportions u-image-2" src="images/back.png" alt="" data-image-width="100" data-image-height="100" title="School Organization">
        </a>

        <button type="button" class="myButton" data-toggle="modal" data-target="#myModal">ADD OFFICER</button>

        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModaldelete" style="float: right; margin-right: 5px;">DELETE OFFICER</button><br><br>


        <h2 class="u-custom-font u-font-roboto-slab u-text u-text-default u-text-1">OFFICERS</h2>
        <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-list u-list-1">
          <div class="u-repeater u-repeater-1">


          	<?php 

          	 if (isset($_GET['id'])) {
              
            $organization = $_GET['id'];

            $stmt = $conn->prepare("SELECT * FROM organization_officers WHERE organization_id = ?");
            $stmt->execute([$organization]);
            $result = $stmt->fetchAll();

                        foreach($result aS $organizationOfficers)
                        {
                            ?>

            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-container-layout-1">
                <div class="u-container-style u-custom-color-2 u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-radius-30 u-shape-round u-group-1">
                  <div class="u-container-layout u-container-layout-2">
                    <img class="u-border-6 u-border-grey-30 u-image u-image-circle u-image-contain u-image-3" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($organizationOfficers['img']); ?>" alt="" data-image-width="1033" data-image-height="1280">
                    <h1 class="u-custom-font u-font-roboto-slab u-text u-text-default-lg u-text-default-xl u-text-2"><?=$organizationOfficers['full_name']?></h1>
                    <h4 class="u-custom-font u-font-roboto-slab u-text u-text-default u-text-grey-25 u-text-3"><?=$organizationOfficers['position']?></h4>
                    <br><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalupdate_<?=$organizationOfficers['id']?>" style="float: right;">Update</button><br>
                  </div>
                </div>
              </div>
            </div>


<!---------------------------------------------UPDATE ADMIN MODAL----------------------------------------------------------->
    <div class="modal fade" id="myModalupdate_<?=$organizationOfficers['id']?>">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">UPDATE ADMIN</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body">

          <form action="" method="POST" enctype="multipart/form-data">

          <input type="hidden" class="form-control" value="<?=$organizationOfficers['id']?>" name="orgOfficerID" required>

                    <div class="form-group">
                       <label for="inputAdminName">Full Name</label>
                       <input type="text" class="form-control" id="inputAdminName" value="<?=$organizationOfficers['full_name']?>" name="full_name" required>
                   </div>
                   <div class="form-group">
                       <label for="inputPosition">Position</label>
                       <input type="text" class="form-control" id="inputPosition" value="<?=$organizationOfficers['position']?>" name="position" required>
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
                   
               
              
           <button name="update" class="btn btn-success">UPDATE</button>

           <button type="button" style="float: right;" class="btn btn-secondary" data-dismiss="modal">Close</button>

       </form>
          </div>

       </div>
  </div>
</div>


            <?php
                        }
                    }
                    
                 ?>


          </div>
        </div>
      </div>
      
    </section>

<?php 

             if (isset($_GET['id'])) {
              
            $organization1 = $_GET['id'];

            ?>
<!-------------------------------------ADD OFFICERS MODAL------------------------------------->
       <div class="modal fade" id="myModal">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">ENTER DETAILS</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body">

          <form action="" method="POST" enctype="multipart/form-data">
                
<input type="hidden" class="form-control" value="<?=$organization1?>" name="organization" readonly required>

                    <div class="form-group">
                       <label for="inputAdminName">Full Name</label>
                       <input type="text" class="form-control" id="inputAdminName" placeholder="Enter Full Name" name="fullname" required>
                   </div>
                   <div class="form-group">
                       <label for="inputPosition">Position</label>
                       <input type="text" class="form-control" id="inputPosition" placeholder="Enter Position" name="position" required>
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
                   
               
              
           <button name="add_officer" class="btn btn-primary">+ ADD</button>

           <button type="button" style="float: right;" class="btn btn-secondary" data-dismiss="modal">Close</button>

       </form>
          </div>

       </div>
  </div>
</div>

 <?php
        }
   
    
 ?>



<!---------------------------------------------DELETE ADMIN MODAL----------------------------------------------------------->
    <div class="modal fade" id="myModaldelete">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">DELETE OFFICER</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
          <div class="modal-body">

          <form action="" method="POST" enctype="multipart/form-data">
                   
                       
                   <div class="form-group">
                        <label for="inputSchoolAdmin">Organization Officers</label>
                        <select id="inputSchoolAdmin" name="officers_iD" class="form-control">
                              <option></option>
                              <?php 
                              $organization1 = $_GET['id'];

                        $stmt = $conn->prepare("SELECT * FROM organization_officers WHERE organization_id = ?");
                    $stmt->execute([$organization1]);
                     while ($OrganizationOfficers = $stmt->fetch(PDO::FETCH_ASSOC)) {
                     echo '<option value="'.$OrganizationOfficers['id'].'">'.$OrganizationOfficers['full_name'].', '.$OrganizationOfficers['position'].'</option>';
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