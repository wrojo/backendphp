<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Backend App | APP</title>
      <!-- Favicon -->
      <?= $this->Html->meta(
          'favicon-16x16.png',
          '/app/images/favicon-16x16.png',
          ['type' => 'icon']
      );
      ?>
      <?php echo $this->Html->css('/app/css/backend-plugin.min.css'); ?>
      <?php echo $this->Html->css('/app/css/backend.css'); ?>
      <?php echo $this->Html->css('/app/vendor/@fortawesome/fontawesome-free/css/all.min.css'); ?>
      <?php echo $this->Html->css('/app/vendor/remixicon/fonts/remixicon.css'); ?>
      <?php echo $this->Html->css('/app/vendor/@icon/dripicons/dripicons.css'); ?>
      <?php echo $this->Html->css('/app/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css'); ?>
      <?php echo $this->Html->css('/app/css/custom_app.css?v=0.0.1'); ?>
    </head>
  <body class=" color-light ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

      <?= $this->element('app/sidebar') ?>       

      <?= $this->element('app/header') ?>


      <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <?= $this->fetch('content') ?> 
            </div>
         </div>
      </div>
      </div>
    </div>
    <!-- Wrapper End-->

    <?= $this->element('app/footer') ?>

    <!-- Backend Bundle JavaScript -->

    <?=  $this->Html->script('/app/js/backend-bundle.min.js'); ?>
    
    <!-- SweetAlert JavaScript -->
    <?=  $this->Html->script('https://unpkg.com/sweetalert/dist/sweetalert.min.js'); ?>






    
    <!-- app JavaScript -->
    <?=  $this->Html->script('/app/js/app.js'); ?>  


    <?php
   /*  $js = '/app/custom/js/'.strtolower($controllerName).'/'.strtolower($actionName).'.js?v='.rand(0, 99999999);
     $jsPath = WWW_ROOT.'backend/custom/js/'.strtolower($controllerName).'/'.strtolower($actionName).'.js';
     $info = new SplFileInfo($jsPath); 

     if($info->isFile()){
        echo $this->Html->script($js);
     }*/
     
    ?>

  </body>
</html>



