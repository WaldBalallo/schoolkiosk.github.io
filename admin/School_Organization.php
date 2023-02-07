<?php

include'../database_connection/config.php';

session_start();

if($_SESSION['auth_user']['admin_id']==0){
echo"<script>window.location.href='../schoolOrganization1/Page-1.html'</script>";

}

?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="SCHOOL ADMIN">
    <meta name="description" content="">
    <title>School_Organization</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/School_Organization.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.4.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,200,300,400,500,600,700,800,900">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="School_Organization">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="en">
    <section class="u-clearfix u-gradient u-section-1" id="sec-f243">
      <div class="u-clearfix u-sheet u-sheet-1">
        <img class="u-image u-image-contain u-image-default u-image-1" src="images/logo.png" alt="" data-image-width="1000" data-image-height="200">
        <img class="u-hover-feature u-image u-image-contain u-image-round u-preserve-proportions u-image-2" src="images/home.png" alt="" data-image-width="100" data-image-height="100" data-href="dashboard.php" title="Dashboard">
        <h2 class="u-custom-font u-font-roboto-slab u-text u-text-default-xl u-text-1">SCHOOL ORGANIZATION</h2>
        <div class="u-expanded-width u-gallery u-layout-grid u-lightbox u-no-transition u-show-text-none u-gallery-1">
          <div class="u-gallery-inner u-gallery-inner-1">

            <?php 

            $stmt = $conn->prepare("SELECT * FROM school_organization");
            $stmt->execute();
            $result = $stmt->fetchAll();

                        foreach($result aS $organization)
                        {
                            ?>

            <div class="u-effect-hover-zoom u-gallery-item u-shape-rectangle" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="" data-href="Organization_Officers.php?id=<?=$organization['id']?>">
              <div class="u-back-slide">
                <img class="u-back-image u-expanded" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($organization['organization_img']); ?>" data-image-width="400" data-image-height="400">
              </div>
              <div class="u-over-slide u-shading u-over-slide-1">
                <h3 class="u-gallery-heading"></h3>
                <p class="u-gallery-text"></p>
              </div>
            </div>
            <?php
                    }
                    
                 ?>

        </div>
      </div>
      
    </section>

  
</body></html>