<div class="mm-top-navbar">
  <div class="mm-navbar-custom">
    <nav class="navbar navbar-expand-lg navbar-light p-0">
      <div class="mm-navbar-logo d-flex align-items-center justify-content-between">
        <i class="ri-menu-line wrapper-menu"></i>
        <a href="" class="header-logo"> 
          <?php echo $this->Html->image('/app/images/logo_rojo.svg', ['style'=>'height:40px;','class'=>'img-fluid rounded-normal','alt' => 'Logo eclass']); ?>
        </a>
      </div>
      <div class="mm-search-bar device-search">
      </div>
      <div class="d-flex align-items-center">
        <div class="d-flex align-items-cente info-usuario">
          <?php if($user_login):?>
            <p class="d-none d-lg-block d-md-block"> <?php echo $user_login['names'] ?> <?php echo $user_login['surnames'] ?>
              <span> <?php echo $user_login['role']['name'] ?> </span>
            </p>
          <?php endif; ?>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
          <i class="ri-menu-3-line"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto navbar-list align-items-center">
            <li class="nav-item nav-icon li-salir" ><a href="<?= $this->Url->build(['prefix'=>false,'controller'=>'users', 'action' => 'logout']); ?>" alt="<?=__('Salir')?>">
                    <i class="fas fa-sign-out-alt"></i> </a></li>
            <li class="nav-item nav-icon dropdown">
              <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $this->Html->image('/app/images/user.png', ['class'=>'img-fluid avatar-rounded','alt' => 'Usuario']); ?> </a>
              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <li class="dropdown-item d-flex svg-icon">
                  <?php if($user_login): ?>
                  <p> 
                    <?php echo $user_login['names'] ?> <br> 
                    <?php echo $user_login['surnames'] ?><br>
                    <span style="font-size: 0.8em;"> <?php echo $user_login['role']['name'] ?></span>
                  </p>
                 <?php endif; ?>
                <li class="dropdown-item  d-flex svg-icon border-top">
                  <a href="<?= $this->Url->build(['prefix'=>false,'controller'=>'users', 'action' => 'logout']); ?>" alt="<?=__('Salir')?>">
                    <i class="fas fa-sign-out-alt"></i> <?=__('Salir')?> </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>




