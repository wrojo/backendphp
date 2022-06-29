<div class="container">
   <div class="row no-gutters height-self-center">
      <div class="col-sm-12 text-center align-self-center">
         <div class="mm-error position-relative">
               <?php echo $this->Html->image('/app/images/logo_rojo.svg', ['style'=>'height:50px;','class'=>'img-fluid rounded-normal','alt' => 'Logo eclass']); ?>
               <h2 class="mb-0 mt-4"><?= __('No tienes permisos para acceder a la página')?></h2>
               <a class="btn btn-primary d-inline-flex align-items-center mt-3" href="javascript:history.back()"><i class="ri-home-4-line"></i><?= __('Volver')?></a>
         </div>
      </div>
   </div>
</div>