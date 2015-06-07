<?php

App::uses('AppController', 'Controller');

/**
 * Pedidos Controller
 *
 * @property Pedido $Pedido
 * @property PaginatorComponent $Paginator
 */
class PedidosController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $uses = array('Pedido', 'Item', 'User', 'Estado');
    public $components = array('Paginator');
    public $layout = 'tienda';

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        //$this->Pedido->recursive = 0;
        //$this->set('pedidos', $this->Paginator->paginate());
        //$pedidos;
        $pedidos = $this->Pedido->find('all', array(
            'recursive' => 0,
            'conditions' => array(
                'Pedido.estado' => 6
            ),
            'limit' => 50
        ));
        $this->set(compact('pedidos'));
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
        if (!$this->Pedido->exists($id))
        {
            throw new NotFoundException(__('Invalid pedido'));
        }
        $options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
        $this->set('pedido', $this->Pedido->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add_dem()
    {
        if ($this->request->is('post'))
        {
            $this->Pedido->create();
            if ($this->Pedido->save($this->request->data))
            {
                $this->Session->setFlash(__('The pedido has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The pedido could not be saved. Please, try again.'));
            }
        }
        $users = $this->Pedido->User->find('list');
        $this->set(compact('users'));
    }

    public function add()
    {
        if (!empty($this->data))
        {
            $this->Pedido->create();
            if ($this->Pedido->save($this->data))
            {
                $this->Session->setFlash('Pedido registrado con exito', 'alerts/bueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('No se pudo registrar el Pedido');
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
    public function edit_dem($id = null)
    {
        if (!$this->Pedido->exists($id))
        {
            throw new NotFoundException(__('Invalid pedido'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            if ($this->Pedido->save($this->request->data))
            {
                $this->Session->setFlash(__('The pedido has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The pedido could not be saved. Please, try again.'));
            }
        } else
        {
            $options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
            $this->request->data = $this->Pedido->find('first', $options);
        }
        $users = $this->Pedido->User->find('list');
        $this->set(compact('users'));
    }

    public function edit($id = null)
    {
        $this->Pedido->id = $id;
        if (!$id)
        {
            $this->Session->setFlash('No existe el Pedido');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data))
        {
            $this->request->data = $this->Marca->read();
        } else
        {
            if ($this->Pedido->save($this->request->data))
            {
                $this->Session->setFlash('Los datos fueron modificados', 'alerts/bueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('no se pudo modificar!!');
            }
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete_dem($id = null)
    {
        $this->Pedido->id = $id;
        if (!$this->Pedido->exists())
        {
            throw new NotFoundException(__('Invalid pedido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Pedido->delete())
        {
            $this->Session->setFlash(__('The pedido has been deleted.'));
        } else
        {
            $this->Session->setFlash(__('The pedido could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function delete($id = null)
    {
        $this->Pedido->id = $id;
        $this->request->data = $this->Pedido->read();
        if (!$id)
        {
            $this->Session->setFlash('No existe el Pedido a eliminar');
            $this->redirect(array('action' => 'index'));
        } else
        {
            if ($this->Pedido->delete($id))
            {
                $this->Session->setFlash('Se elimino el Pedido ' . $this->data['Pedido']['nombre'], 'alerts/bueno');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }

    public function detalle($idPedido = null)
    {
        $datosPedido = $this->Pedido->find('first', array(
            'recursive' => 2,
            'conditions' => array(
                'Pedido.id' => $idPedido,                
            )
        ));
        $this->set(compact('datosPedido'));
    }
    
    public function pagado($idPedido = null)
    {
        //$this->Pedido->read(null, $idPedido);
        //$data = array('id'=>$idPedido, 'estado'=>7);
        $datosPedido = $this->Pedido->find('all', array(
            'fields'=>array('MAX(factura) as maximo')
        ));
        //debug($datosPedido);
        if(empty($datosPedido)){
          $numeroFactura = 0;
        }else{
          $numeroFactura = $datosPedido[0][0]['maximo']+1;
        }
        //debug($numeroFactura);die;
        $this->Pedido->id = $idPedido;        
        //debug($modPedido);die;
        $this->Pedido->set(array(
            'estado'=>7,
            'factura'=>$numeroFactura
        ));
        if($this->Pedido->save())
        {
            $this->Item->updateAll(
            array('estado'=>7),
            array('pedido_id'=>$idPedido)        
            );
            $this->redirect(array('action'=>'index'));
        }
    }
    
    public function ventas(){
        $pedidos = $this->Pedido->find('all', array(
            'recursive' => 0,
            'conditions' => array(
                'Pedido.estado' => 7
            ),
            'limit' => 50
        ));
        $this->set(compact('pedidos'));
    }
    
    public function misordenes(){
        
        $this->layout = 'publico';
        $idUsuario = $this->Session->read('Auth.User.id');
        $misPedidos = $this->Pedido->find('all', array(
            'recursive'=>-1,
            'conditions'=>array('Pedido.user_id'=>$idUsuario),
            'limit'=>15,
            'order'=>'Pedido.id DESC'
        ));
        //debug($idUsuario);
        $this->set(compact('misPedidos'));
    }

}