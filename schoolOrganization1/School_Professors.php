<?php

include'../database_connection/config.php';


?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="SCHOOL ADMIN">
    <meta name="description" content="">
    <title>School_Professors</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/School_Admin.css" media="screen">
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
    <meta property="og:title" content="School_Admin">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">

<style>
.u-section-1 .u-repeater-1 {
    grid-gap: 12px 12px;
    grid-template-columns: 100%;
    min-height: 100px;
}


</style>


</head>
  <body class="u-body u-xl-mode" data-lang="en">
    <section class="u-clearfix u-gradient u-section-1" id="sec-f243">
      <div class="u-clearfix u-sheet u-sheet-1">
        <img class="u-image u-image-contain u-image-default u-image-1" src="images/logo.png" alt="" data-image-width="1000" data-image-height="200">
        <img class="u-hover-feature u-image u-image-contain u-image-round u-preserve-proportions u-image-2" src="images/home.png" alt="" data-image-width="100" data-image-height="100" data-href="Page-2.php" title="Page 2">
        <h2 class="u-custom-font u-font-roboto-slab u-text u-text-default u-text-1">PROFESSORS</h2>
        <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-list u-list-1">
          <div class="u-repeater u-repeater-1">


          	<?php

            $stmt = $conn->prepare("SELECT * FROM school_professors");
            $stmt->execute();
            $result = $stmt->fetchAll();

                        foreach($result aS $professors)
                        {
                            ?>

            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-container-layout-1">
                <div class="u-container-style u-custom-color-2 u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-radius-30 u-shape-round u-group-1">
                  <div class="u-container-layout u-container-layout-2">
                    <img class="u-border-6 u-border-grey-30 u-image u-image-circle u-image-contain u-image-3" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($professors['img']); ?>" alt="" data-image-width="1033" data-image-height="1280">
                    <h1 class="u-custom-font u-font-roboto-slab u-text u-text-default-lg u-text-default-xl u-text-2"><?=$professors['full_name']?></h1>
                    <h4 class="u-custom-font u-font-roboto-slab u-text u-text-default u-text-grey-25 u-text-3"><?=$professors['position']?></h4>
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

  
</body></html>