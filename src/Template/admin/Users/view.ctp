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
   <div class="card-header d-flex justify-content-between">
      <div class="header-title">
         <h4 class="card-title"><?= __('Información usuario')?></h4>
      </div>
      <div class="header-action">
         <?= $this->Html->link(__('Listado'), ['action' => 'index'], ['class' => 'btn btn-sm btn-primary']) ?>
      </div>
   </div>
   <div class="card-body">
      <?= $this->Flash->render() ?>
      <div class="form-group">
         <label class="font-weight-bold"><?= __('Nombres:')?></label>
         <p><?= h($user->names) ?></p>
         <hr>
      </div>
      <div class="form-group">
         <label class="font-weight-bold"><?= __('Apellidos:')?></label>
         <p><?= h($user->surnames) ?></p>
         <hr>
      </div>
      <div class="form-group">
         <label class="font-weight-bold"><?= __('Email:')?></label>
         <p><?= h($user->email) ?></p>
         <hr>
      </div>
      <div class="form-group">
         <label class="font-weight-bold"><?= __('Rol:')?></label>
         <p><?= h($user->role->name) ?></p>
      </div>
   </div>
</div>