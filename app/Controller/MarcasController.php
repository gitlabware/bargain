<?php
App::uses('AppController', 'Controller');
/**
 * Marcas Controller
 *
 * @property Marca $Marca
 * @property PaginatorComponent $Paginator
 */
class MarcasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
    public $layout = 'tienda';

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$marcas = $this->Marca->find('all', array(
            'recursive' => 0,
            'limit' => 50,
            'order' => array(
                'Marca.id DESC'
            )
        ));
        $this->set(compact('marcas'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Marca->exists($id)) {
			throw new NotFoundException(__('Invalid marca'));
		}
		$options = array('conditions' => array('Marca.' . $this->Marca->primaryKey => $id));
		$this->set('marca', $this->Marca->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add_dem() {
		if ($this->request->is('post')) {
			$this->Marca->create();
			if ($this->Marca->save($this->request->data)) {
				return $this->flash(__('The marca has been saved.'), array('action' => 'index'));
			}
		}
	}
    public function add()
    {
        if (!empty($this->data)) { 
            $this->Marca->create(); 
            if ($this->Marca->save($this->data)) { 
                $this->Session->setFlash('Marca registrada con exito', 'alerts/bueno'); 
                $this->redirect(array('action' => 'index'), null, true); 
            } else { 
                $this->Session->setFlash('No se pudo registrar la Marca'); 
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
	public function edit_dem($id = null) {
		if (!$this->Marca->exists($id)) {
			throw new NotFoundException(__('Invalid marca'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Marca->save($this->request->data)) {
				return $this->flash(__('The marca has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Marca.' . $this->Marca->primaryKey => $id));
			$this->request->data = $this->Marca->find('first', $options);
		}
	}
    public function edit($id=null){
        $this->Marca->id = $id;
        if (!$id) {
            $this->Session->setFlash('No existe la Marca');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Marca->read();

        } else {
            if ($this->Marca->save($this->request->data)) {
                $this->Session->setFlash('Los datos fueron modificados', 'alerts/bueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else {
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
	public function delete_dem($id = null) {
		$this->Marca->id = $id;
		if (!$this->Marca->exists()) {
			throw new NotFoundException(__('Invalid marca'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Marca->delete()) {
			return $this->flash(__('The marca has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The marca could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
     public function delete($id=null){
        $this->Marca->id=$id;
        $this->request->data=$this->Marca->read();
        if(!$id){
            $this->Session->setFlash('No existe la Marca a eliminar');
            $this->redirect(array('action' =>'index'));
        }
        else
        {
            if($this->Marca->delete($id)){
                $this->Session->setFlash('Se elimino la Marca '.$this->data['Marca']['nombre'], 'alerts/bueno');
                $this->redirect(array('action' =>'index'));
            }
            else{
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }
 }
