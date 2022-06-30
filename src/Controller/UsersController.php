<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Core\Configure;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * BeforeFilter method
     *
     * @return \Cake\Http\Response|null
     */
    public function beforeFilter(EventInterface $event)
    {
       
        parent::beforeFilter($event);
        $this->Auth->allow(['login','logout','error']);
        
    }

    public function login()
    {    
        $this->viewBuilder()->setLayout('app/login');
        if ($this->request->is('post')) { 
            $user = $this->Auth->identify();
            if ($user) {
                if($user['is_active']){
                    $this->Auth->setUser($user);
                    $this->redirectUser($user['role_id']);
                }
                else{
                    $this->Flash->error(__('Usuario no activo en el sistema.'));
                    $this->Auth->logout(); 
                }
            }
            else{
                $this->Flash->error(__('Error al autenticar el usuario en el sistema. Credenciales incorrectas o el usuario no se encuentra activo.'));
            }
        } 
    }
    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect(['action' => 'login']);
    }
    public function error()
    {
        $this->viewBuilder()->setLayout('app/default');
    }
    private function redirectUser($role_id){
        if($role_id===1){
            return $this->redirect([
                'prefix' => 'admin',
                'controller' => 'users',
                'action' => 'index'
            ]);
        }
        else if($role_id===2){
            return $this->redirect([
                'prefix' => 'visit',
                'controller' => 'users',
                'action' => 'index'
            ]);
        }
    }
    public function cambiarClave()
    {
        $this->viewBuilder()->setLayout('app/default');
        $user = $this->Users->get($this->login['id'], [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clave_actual = $this->request->getData('clave_actual');
            $clave = $this->request->getData('clave');
            $clave_2 = $this->request->getData('clave_2');
            $is_correcta = (new DefaultPasswordHasher)->check($clave_actual,$user->password);
            if(!$is_correcta){
                $this->Flash->error(__('La contraseña ingresada no es correcta.'));
                return $this->redirect(['action' => 'cambiarClave']);
            }
            if(strlen($clave)<4 || strlen($clave)>10){
                $this->Flash->error(__('La contraseña debe tener entre 4 y 10 carácteres.'));
                return $this->redirect(['action' => 'cambiarClave']);
            }
            if($clave !== $clave_2){
                $this->Flash->error(__('Las contraseñas deben ser idénticas.'));
                return $this->redirect(['action' => 'cambiarClave']);
            }
            $ip = $this->request->clientIp();
            $date = new \DateTime('NOW');
            $data['names'] = $user->names;
            $data['surnames'] = $user->surnames;
            $data['email'] = $user->email;
            $data['password'] = $clave;
            $data['is_reset_password'] = 0;
            $data['modified_id'] = $this->login['id'];
            $data['modified_ip'] = $ip;
            $data['modified_date'] = $date->format(Configure::read('DATABASE_DATE_FORMAT'));
            $user = $this->Users->patchEntity($user, $data);
            $resp = $this->Users->save($user);
            if($resp){
                $this->Flash->success(__('Contraseña modificada correctamente. Vuelva a iniciar sesión'));
                $this->Auth->logout();
                return $this->redirect(['action' => 'login']);
            }
       
        }
        $this->set(compact('user'));

    }
    
}
