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
         
      </div>
      <div class="mb-2"></div>
      <button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-search"></i> Filtrar</button>
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
                  <td><?= h($user->role->name) ?></td>
                  <td>  
                     <a href="<?= $this->Url->build(['controller'=>'users','action'=>'edit',$user->id]); ?>"  alt="Editar usuario"><i class="fas fa-edit"></i></a>
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


