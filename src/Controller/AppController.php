<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'], 
            'authError'    => 'No estás autorizado para ver está vista.',
            'logoutRedirect' => [
                'prefix' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginAction' => [
                'prefix' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => [
                'prefix' => false,
                'controller' => 'Users',
                'action' => 'error'
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password', 'userModel' => 'Users'], 
                    'finder' => 'auth' 
                ]
            ],
            'storage'=>'Session'
           
        ]);

    }
    public function beforeFilter(EventInterface $event)
    {
        $controllerName = strtolower($this->request->getParam('controller'));
        $actionName = strtolower($this->request->getParam('action'));
        $user_login = $this->Auth->User();
        $this->set(compact('controllerName','actionName','user_login'));
    }
    
    public function isAuthorized($user = null)
    {
       
        return false;
    }
}
