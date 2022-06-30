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
     
      <?php echo $this->Html->css('/app/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css'); ?>

      <?php echo $this->Html->css('/app/css/custom_app.css'); ?>
    </head>
  <body class=" color-light">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
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



