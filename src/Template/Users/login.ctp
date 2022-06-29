<section class="login-content">
         <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
               <div class="col-md-6">
                  <div class="card">
                     <div class="card-body">
                        <div class="auth-logo">
                            <?php echo $this->Html->image('/app/images/logo_rojo.svg', ['style'=>'height:50px;','class'=>'img-fluid rounded-normal','alt' => 'Logo eclass']); ?>
                        </div>
                        <h2 class="mb-2 text-center"><?=__('Administrador de usuarios')?><span style="display: block;font-size: 0.7em;"><?=__('Ingresar')?></span></h2>
                     
                        <?php echo $this->Form->create() ?>
                           <div class="row">
                              <div class="col-lg-12">
                                  <?= $this->Flash->render() ?>
                                 <div class="form-group">
                                    <label><?=__('Email')?></label>
                                    <?php echo $this->Form->text('email',array('class'=>'form-control','label'=>false,'div'=>false,'placeholder'=>'Ingrese su email')) ?>

                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label><?=__('Contraseña')?></label>
                                    <?php echo $this->Form->control('password',array('type'=>'password','class'=>'form-control','label'=>false,'div'=>false,'placeholder'=>'Ingrese su clave')) ?>
                                 </div>
                              </div>

                           </div>
                           <div class="row">
                            <div class="col-lg-12">
                               <?= $this->Html->link(__('¿Olvido su contraseña?'), ['action' => 'reset'], ['class' => 'mb-2 d-block float-right']) ?>
                            </div>
                           </div>
                           <div class="d-flex justify-content-between align-items-center"> 
                              <?php echo $this->Form->button('Ingresar', array('class'=>'btn btn-primary btn-block','type' => 'submit'));?>
                           </div>
                        <?php echo $this->Form->end() ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>