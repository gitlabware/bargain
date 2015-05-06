<?php
App::uses('AppController', 'Controller');
/**
 * Categorias Controller
 *
 * @property Categoria $Categoria
 * @property PaginatorComponent $Paginator
 */
class CategoriasController extends AppController {

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
		$categorias = $this->Categoria->find('all', array(
            'recursive' => 0,
            'limit' => 50,
            'order' => array(
                'Categoria.id DESC'
            )
        ));
        $this->set(compact('categorias'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
		$this->set('categoria', $this->Categoria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add_dem() {
		if ($this->request->is('post')) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->request->data)) {
				return $this->flash(__('The categoria has been saved.'), array('action' => 'index'));
			}
		}
	}
    public function add()
    {
        if (!empty($this->data)) { 
            $this->Categoria->create(); 
            if ($this->Categoria->save($this->data)) { 
                $this->Session->setFlash('Categoria registrada con exito', 'alerts/bueno'); 
                $this->redirect(array('action' => 'index'), null, true); 
            } else { 
                $this->Session->setFlash('No se pudo registrar la Categoria'); 
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
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Categoria->save($this->request->data)) {
				return $this->flash(__('The categoria has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
			$this->request->data = $this->Categoria->find('first', $options);
		}
	}
    public function edit($id=null){
        $this->Categoria->id = $id;
        if (!$id) {
            $this->Session->setFlash('No existe la Categoria');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Categoria->read();

        } else {
            if ($this->Categoria->save($this->request->data)) {
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
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Categoria->delete()) {
			return $this->flash(__('The categoria has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The categoria could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
    public function delete($id=null){
        $this->Categoria->id=$id;
        $this->request->data=$this->Categoria->read();
        if(!$id){
            $this->Session->setFlash('No existe la Categoria a eliminar');
            $this->redirect(array('action' =>'index'));
        }
        else
        {
            if($this->Categoria->delete($id)){
                $this->Session->setFlash('Se elimino la Categoria '.$this->data['Categoria']['nombre'], 'alerts/bueno');
                $this->redirect(array('action' =>'index'));
            }
            else{
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }
    
 }
