<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <title>Solicitudes Ingresar | Departamento de Matemática y Ciencia de la Computación (DMCC)</title>
      
      <!-- Favicon -->
     <!--  <link rel="shortcut icon" href="../assets/images/favicon.ico" /> -->
    <!--   <link rel="stylesheet" href="../assets/css/backend-plugin.min.css"> -->
       <?php echo $this->Html->css('/app/css/backend-plugin.min.css'); ?>
     
      <?php echo $this->Html->css('/app/css/backend.css'); ?>
   
      <?php echo $this->Html->css('/app/vendor/@fortawesome/fontawesome-free/css/all.min.css'); ?>
     
      <?php echo $this->Html->css('/app/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css'); ?>

      <?php echo $this->Html->css('/app/css/custom_app.css'); ?>
    </head>
  <body class=" color-light " style="background-image: url(<?php echo $this->Url->build('/app/images/bg.jpg', ['fullBase' => true]); ?>); background-position: center center; background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
     <?= $this->fetch('content') ?> 
    </div>
    <!-- Wrapper End-->
    <!-- Backend Bundle JavaScript -->
    <?=  $this->Html->script('/app/js/backend-bundle.min.js'); ?>
    <!-- app JavaScript -->
    <?=  $this->Html->script('/app/js/app.js'); ?>  
  </body>
</html>



