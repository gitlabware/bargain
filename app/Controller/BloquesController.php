<?php
App::uses('AppController', 'Controller');
/**
 * Bloques Controller
 *
 * @property Bloque $Bloque
 * @property PaginatorComponent $Paginator
 */
class BloquesController extends AppController {

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
		$bloques = $this->Bloque->find('all', array(
            'recursive' => 0,
            'limit' => 50,
            'order' => array(
                'Bloque.id DESC'
            )
        ));
        $this->set(compact('bloques'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bloque->exists($id)) {
			throw new NotFoundException(__('Invalid bloque'));
		}
		$options = array('conditions' => array('Bloque.' . $this->Bloque->primaryKey => $id));
		$this->set('bloque', $this->Bloque->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add_dem() {
		if ($this->request->is('post')) {
			$this->Bloque->create();
			if ($this->Bloque->save($this->request->data)) {
				return $this->flash(__('The bloque has been saved.'));
                $this->redirect(array('action' => 'index'), null, true);
			}
		}
	}
    public function add()
    {
        if (!empty($this->data)) { 
            $this->Bloque->create(); 
            if ($this->Bloque->save($this->data)) { 
                $this->Session->setFlash('Bloque registrada con exito'); 
                $this->redirect(array('action' => 'index'), null, true); 
            } else { 
                $this->Session->setFlash('No se pudo registrar el Bloque'); 
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
		if (!$this->Bloque->exists($id)) {
			throw new NotFoundException(__('Invalid bloque'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bloque->save($this->request->data)) {
				return $this->flash(__('The bloque has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Bloque.' . $this->Bloque->primaryKey => $id));
			$this->request->data = $this->Bloque->find('first', $options);
		}
	}
    public function edit($id=null){
        $this->Bloque->id = $id;
        if (!$id) {
            $this->Session->setFlash('No existe el Bloque');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Bloque->read();

        } else {
            if ($this->Bloque->save($this->request->data)) {
                $this->Session->setFlash('Los datos fueron modificados');
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
		$this->Bloque->id = $id;
		if (!$this->Bloque->exists()) {
			throw new NotFoundException(__('Invalid bloque'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bloque->delete()) {
			return $this->flash(__('The bloque has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The bloque could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
    public function delete($id=null){
        $this->Zona->id=$id;
        $this->request->data=$this->Bloque->read();
        if(!$id){
            $this->Session->setFlash('No existe el Bloque a eliminar');
            $this->redirect(array('action' =>'index'));
        }
        else
        {
            if($this->Bloque->delete($id)){
                $this->Session->setFlash('Se elimino el Bloque '.$this->data['Bloque']['nombre']);
                $this->redirect(array('action' =>'index'));
            }
            else{
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }
 
 }
