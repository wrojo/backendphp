<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$myTemplates = [
    'nestingLabel' => '<div class="custom-control custom-checkbox custom-control-inline">{{input}}<label class="custom-control-label">{{text}}</label></div>',
];
$this->Form->setTemplates($myTemplates);
?>
<section class="login-content">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-6">
                <div class="card"> 
                    <?= $this->Form->create($user,['enctype'=>'multipart/form-data']) ?> 
                    <div class="card-body"> <?= $this->Flash->render() ?> 
                    <h4 class="mb-2"><?= h($user->names) ?> <?= h($user->surnames) ?></h4>
                    <div class="form-group">
                    <label><?=__('Contraseña actual')?></label> <?php echo $this->Form->control('clave_actual', ['type'=>'password','class'=>'form-control','label'=>false,'value'=>'']); ?>
                    </div>
                    <div class="form-group">
                    <label><?=__('Contraseña')?></label> <?php echo $this->Form->control('clave', ['type'=>'password','class'=>'form-control','label'=>false,'value'=>'']); ?>
                    </div>
                    <div class="form-group">
                    <label><?=__('Confirmar contraseña')?></label> <?php echo $this->Form->control('clave_2', ['type'=>'password','class'=>'form-control','label'=>false,'value'=>'']); ?>
                    </div> <?= $this->Form->button(__('Cambiar contraseña'),['class'=>'btn btn-primary mr-2','type' => 'submit']) ?>
                </div> <?= $this->Form->end() ?> 
                </div>
            </div>
        </div>
    </div>
</section>
