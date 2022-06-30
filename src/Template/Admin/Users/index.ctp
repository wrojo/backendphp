<?php
   /**
   * @var \App\View\AppView $this
   * @var \App\Model\Entity\Usuario[]|\Cake\Collection\CollectionInterface $usuarios
   */
   ?>
<div class="card">
   <div class="card-header d-flex justify-content-between">
      <div class="header-title">
         <h4 class="card-title">Usuarios</h4>
      </div>
      <div class="header-action">
         <?= $this->Html->link(__('Nuevo usuario'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']) ?>
      </div>
   </div>
   <div class="card-body">
      <?= $this->Form->create(null) ?>  
      <div class="row"> 
         <div class="col-lg-6">
         </div>
         <div class="col-lg-6">
            <div class="row">
               <div class="col-lg-8">
                  <small><strong><?= __('Buscar:')?></strong></small>
                  <?php echo $this->Form->control('txt_buscar',['class'=>'form-control','label'=>false,'placeholder'=>__('Buscar por nombres, apellidos o email.'),'value'=>@$data['txt_buscar']]); ?>
               </div>
               <div class="col-lg-4">
                  <small><strong><?= __('Rol:')?></strong></small>
                  <?php echo $this->Form->control('role_id', ['options' => $roles,'class'=>'form-control','empty'=>'Seleccione un rol','label'=>false,'default'=>@$data['role_id']]); ?>
               </div>
            </div>
         </div> 
      </div>
      <div class="mb-2"></div>
      <button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-search"></i> <?= __('Filtar')?></button>
      <div class="mb-3" style="clear:both"></div>
      <?= $this->Form->end() ?>
      <?= $this->Flash->render() ?>
      <div id="table" class="table-editable">
         <table class="table table-bordered table-responsive-md table-striped text-center">
            <thead>
               <tr>
                  <th><?= __('#')?></th>
                  <th><?= __('Nombres')?></th>
                  <th><?= __('Apellidos')?></th>
                  <th><?= __('Email')?></th>
                  <th><?= __('Rol')?></th>
                  <th><?= __('Acciones')?></th>
               </tr>
            </thead>
            <tbody>
               <?php $num = 1; 
                  foreach ($users as $user): 
                      
                    ?>
               <tr>
                  <td><?= $this->Number->format($user->id) ?></td>
                  <td><?= h($user->names) ?></td>
                  <td><?= h($user->surnames) ?></td>
                  <td><?= h($user->email) ?></td>
                  <td><span class="badge badge-info"><?= h($user->role->name) ?></span></td>
                  <td>  
                     <a href="<?= $this->Url->build(['controller'=>'users','action'=>'edit',$user->id]); ?>"  alt="<?= __('Editar usuario')?>"><i class="fas fa-edit"></i></a>
                     <a href="<?= $this->Url->build(['controller'=>'users','action'=>'view',$user->id]); ?>"  alt="<?= __('Ver usuario')?>"><i class="fas fa-eye"></i></a>

                     <?= $this->Form->postLink(__('<i class="fas fa-trash-alt"></i>'), ['action' => 'delete', $user->id,], ['confirm' => __('¿Realmente desea eliminar este registro ?'),'style'=>'','escape'=>false]) ?>
                  </td>
               </tr>
               <?php 
                  $num++;
                  endforeach; ?>
            </tbody>
         </table>
      </div>
      <?php if($is_empty) { ?>
      <p class="text-center"><?= __('No existen usuarios creados.')?></p>
      <?php  } ?>
      <?php echo $this->element('paginacion'); ?>
   </div>
</div>


