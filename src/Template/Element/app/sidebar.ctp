<div class="mm-sidebar  sidebar-default ">
  <div class="mm-sidebar-logo d-flex align-items-center justify-content-between">
      <a href="javascript:void(0)" class="header-logo">
        <?php echo $this->Html->image('/app/images/logo_rojo.svg', ['style'=>'height:40px;','class'=>'img-fluid rounded-normal','alt' => 'Logo eclass']); ?>
      </a>
      <div class="side-menu-bt-sidebar">
          <i class="las la-bars wrapper-menu"></i>
      </div>
  </div>
  <div class="data-scrollbar" data-scroll="1">
      <nav class="mm-sidebar-menu">
          <ul id="mm-sidebar-toggle" class="side-menu">

             <?php foreach ($menu as $key => $m) : ?>
             <?php
                $clase = '';
                if($controllerName==strtolower($m['url']['controller']) && $actionName == strtolower($m['url']['action'])){
                  $clase = 'active';
                }
                $icono = '<i class="far fa-clipboard"></i>';
                if(isset($m['icono'])){
                   $icono = $m['icono'];
                }
             ?>
              <li class="<?php echo $clase ?>">
                  <a href="<?= $this->Url->build($m['url']); ?>" class="collapsed svg-icon"  aria-expanded="false">
                      <?php echo $icono;  ?>
                      <?= $m['html']; ?>
                  </a>
              
              </li>
             <?php endforeach; ?>
          </ul>
      </nav>
    
      <div class="pt-5 pb-2"></div>
  </div>
</div>