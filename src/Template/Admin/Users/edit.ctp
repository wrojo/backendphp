<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
$myTemplates = [
    'nestingLabel' => '<div class="custom-control custom-checkbox custom-control-inline">{{input}}<label class="custom-control-label">{{text}}</label></div>',
    
];
$this->Form->setTemplates($myTemplates);
?>
<div class="card">
   <?= $this->Form->create($user,['enctype'=>'multipart/form-data']) ?>
   <div class="card-header d-flex justify-content-between">
      <div class="header-title">
         <h4 class="card-title"><?= __('Editar usuario')?></h4>
      </div>
      <div class="header-action">
         <?= $this->Html->link(__('Listado'), ['action' => 'index'], ['class' => 'btn btn-sm btn-primary']) ?>
      </div>
   </div>
   <div class="card-body">
      <?= $this->Flash->render() ?>
      <div class="form-group">
         <label><?= __('Nombres')?></label>
         <?php echo $this->Form->control('names', ['class'=>'form-control','label'=>false]); ?>
      </div>
      <div class="form-group">
         <label><?= __('Apellidos')?></label>
         <?php echo $this->Form->control('surnames', ['class'=>'form-control','label'=>false]); ?>
      </div>
      <div class="form-group">
         <label><?= __('Email')?></label>
         <?php echo $this->Form->control('email', ['class'=>'form-control','label'=>false]); ?>
      </div>
      <div class="form-group">
         <label><?= __('Clave')?></label>
         <?php echo $this->Form->control('password', ['type'=>'password','class'=>'form-control','label'=>false,'value'=>'']); ?>
      </div>
      <div class="form-group">
         <label><?= __('Rol')?></label>
         <?php echo $this->Form->control('role_id', ['options' => $roles,'class'=>'form-control','empty'=>__('Selecciona una opción'),'label'=>false]); ?>
      </div>
      <div class="form-group">
         <label><?= __('Cambio de contraseña')?></label>
         <?php echo $this->Form->control('is_reset_password', ['class'=>'','label'=>false]); ?>
      </div>
      <div class="form-group">
         <label><?= __('Usuario activo')?></label>
         <?php echo $this->Form->control('is_active', ['class'=>'','label'=>false]); ?>
      </div>
      <?= $this->Form->button(__('Editar usuario'),['class'=>'btn btn-primary mr-2','type' => 'submit']) ?>
   </div>
   <?= $this->Form->end() ?>
</div>