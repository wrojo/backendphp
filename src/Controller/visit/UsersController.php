<?php
namespace App\Controller\Visit;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\EventInterface;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public  $session_filtro_index;
    public  $session_page_index;
    /**
     * BeforeFilter method
     *
     * @return \Cake\Http\Response|null
     */
    public function beforeFilter(EventInterface $event)
    {

        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('app/principal');
        $this->session_filtro_index = 'Filtro.Visita.index';
        $this->session_page_index = 'Filtro.Visita.index'; 
        $menu = $this->getMenu();
        $this->set(compact('menu'));

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $finder = $this->Users->find();
        $filter = array();
        $data = $this->request->getData();
        $session = $this->request->getSession();
        if($this->request->is('get')) {
            ////////Obtener data de búsqueda mediante el usao de sesiones.
            if($session->check($this->session_filtro_index)){
                $param = $this->request->getParam('?');
                $page = @$param['page'];
                if($page){
                    $session->write($this->session_page_index,$page);
                }
                else{
                    $session->delete($this->session_page_index);
                }
                $data = $session->read($this->session_filtro_index);
            }
        }
        if (@count($data) > 0) {
            $txt_buscar = @$data['txt_buscar'];
            $role_id = @$data['role_id'];
            if ($txt_buscar) {
                $finder->where(['OR' => [
                    'Users.names LIKE' => '%' . $txt_buscar . '%',
                    'Users.surnames LIKE' => '%' . $txt_buscar . '%',
                    'Users.email LIKE' => '%' . $txt_buscar . '%',
                ]]);
            }
            if ($role_id) {
                $filter['Users.role_id'] = $role_id;
            }
            ////////Guardar búsqueda en sesión.
            $session->write($this->session_filtro_index,$data);
        }
        $this->paginate['contain'] = [
            'Roles',
        ];
        $this->paginate['conditions'] = $filter;
        $this->paginate['limit'] = 20;

        try {

            $users = $this->paginate($finder);
        } catch (NotFoundException $e) {

            return $this->redirect(['action' => 'index']);
        }
        $is_empty = false;
        if (count($users) == 0) {
            $is_empty = true;
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('users', 'is_empty', 'roles','data'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles'],
        ]);

        $this->set('user', $user);
    }

    
    /**
     * isAuthorized method
     *
     * @param array $user User array data.
     * @return Boolean.
     */
    public function isAuthorized($user = null)
    {

        if (isset($user['role_id']) && $user['role_id'] === 2) {
            return true;
        }

        return parent::isAuthorized($user);
    }
    /**
     * getMenuAdmin method
     *
     * @return Array user Menu
     */
    private function getMenu()
    {
        $menu = [
            array('url' => ['controller' => 'users', 'action' => 'index'], 'html' => ' <span class="ml-2">Usuarios</span>', 'icono' => '<i class="fas fa-users"></i>'),
        ];

        return $menu;
    }
}
