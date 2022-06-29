<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Core\Configure;

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
        $this->viewBuilder()->setLayout('app/login');
        $this->Auth->allow(['login','logout']);
        
    }

    public function login()
    {
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
                $this->Flash->error(__('El email o contraseña son incorrectas.'));
            }
        } 
    }
    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect(['action' => 'login']);
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
    
}
