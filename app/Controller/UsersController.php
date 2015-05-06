<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    //public $components = array('Paginator');
    public $layout = 'tienda';
    
     public function beforeFilter()
    {
        //$this->Auth->allow();
        parent::beforeFilter();
    }

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $users = $this->User->find('all', array(
            'recursive' => 0,
            'limit' => 50,
            'order' => array(
                'User.id DESC'
            )
        ));
        $this->set(compact('users'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->User->exists($id))
        {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post'))
        {
            $this->User->create();
            if ($this->User->save($this->request->data))
            {
                $this->Session->setFlash('Usuario registrado', 'alerts/bueno');
                //return $this->flash(__('The user has been saved.'), array('action' => 'index'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->User->exists($id))
        {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            $this->User->id = $id;
            if ($this->User->save($this->request->data))
            {
                $this->Session->setFlash('Datos modificados', 'alerts/bueno');
                $this->redirect(array('action' => 'index'));
                //return $this->flash(__('The user has been saved.'), array('action' => 'index'));
            }
        } else
        {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->User->id = $id;
        //debug($id);exit;
        /**
         * if (!$this->User->exists()) {
         * 			throw new NotFoundException(__('Invalid user'));
         * 		}
         * 		$this->request->onlyAllow('post', 'delete');
         */
        if ($this->User->delete())
        {
            //return $this->flash(__('The user has been deleted.'), array('action' => 'index'));
            $this->Session->setFlash('Usuario Eliminado', 'alerts/bueno');
            $this->redirect(array('action' => 'index'));
        } else
        {
            return $this->flash(__('The user could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

    public function registro()
    {
        $this->layout = 'ajax';
        if ($this->request->is('post'))
        {                
            //debug($this->request->data);
            $correo = $this->request->data['User']['email'];
            $consultaCorreo = $this->User->findByEmail($correo, null, null, null . null, -1);
            //debug($consultaCorreo);
            if (empty($consultaCorreo))
            {
                $this->request->data['User']['estado'] = 5;
                $this->request->data['User']['role'] = 'visitante';
                $this->User->create();
                if ($this->User->save($this->request->data))
                {
                    $registradoId = $this->User->getLastInsertID();
                    $datosUsuario = $this->User->findById($registradoId, null, null, null, null, -1);
                    $this->set(compact('datosUsuario'));
                    //$this->Session->setFlash('Thanks you are register!!!');
                    //$this->redirect(array('controller'=>'productos', 'action'=>'tienda'));
                }
            } else
            {
                $yaEsta = 1;
                $this->set(compact('yaEsta', 'consultaCorreo'));
            }
        }
    }

    public function login()
    {
        $this->layout = 'login';
        if ($this->request->is('post'))
        {
            if ($this->Auth->login())
            {
                //return $this->redirect($this->Auth->redirect());
                $this->redirect(array('controller' => 'productos', 'action' => 'listado'));
            }
            $this->Session->setFlash('Usuario o password incorrectos', 'alerts/malo');
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function ingresa()
    {
        $this->layout = 'publico';

        if ($this->request->is('post'))
        {
            //debug($this->request->data);die;
            if ($this->Auth->login())
            {
                //return $this->redirect($this->Auth->redirect());
                $this->Session->setFlash('Welcome');
                $this->redirect(array('controller' => 'productos', 'action' => 'tienda'));
            } else
            {
                $this->Session->setFlash('Username or password incorrect');
                $this->redirect(array('controller' => 'productos', 'action' => 'tienda'));
            }
        }
    }

    public function salir()
    {
        if ($this->Auth->logout())
        {
            $this->redirect(array('controller' => 'productos', 'action' => 'tienda'));
        }
    }

    public function deshabilitar($idUsuario = null)
    {

        if ($this->request->is('get'))
        {

            //$this->User->read(null, $idUsuario);
            $this->User->id = $idUsuario;
            $this->User->set(array(
                'username' => '',
                'estado' => 4
            ));
            if ($this->User->save())
            {
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function habilitar($idUsuario = null)
    {

        if ($this->request->is('get'))
        {

            //$this->User->read(null, $idUsuario);
            $this->User->id = $idUsuario;
            $correo = $this->User->findById($idUsuario, null, null, null, null, -1);
            //$correo = $this->User->read(null, $idUsuario);
            $c = $correo['User']['email'];
            //debug($correo);die;
            $this->User->set(array(
                'username' => "$c",
                'estado' => 3
            ));
            if ($this->User->save())
            {
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function cambiopass($idUsuario = null)
    {
        $datosUsuario = $this->User->find('first', array(
            'recursive' => -1,
            'conditions' => array('User.id' => $idUsuario),
        ));
        if ($this->request->is('post'))
        {
            $idUsuario = $this->request->data['User']['id'];
            $pass = $this->request->data['User']['password'];
            //debug($this->request->data);
            //die;
            $data = array('id' => $idUsuario, 'password' => $pass);
            if($this->User->save($data))
            {
                $this->Session->setFlash('Password modificado', 'alerts/bueno');
                $this->redirect(array('action'=>'index'));
            }
        }
        $this->set(compact('datosUsuario', 'idUsuario'));
    }

}
