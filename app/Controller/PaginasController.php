<?php
App::uses('AppController', 'Controller');
/**
 * Paginas Controller
 *
 * @property Pagina $Pagina
 * @property PaginatorComponent $Paginator
 */
class PaginasController extends AppController {

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
		$paginas = $this->Pagina->find('all', array(
            'recursive' => 0,
            'limit' => 50,
            'order' => array(
                'Pagina.id DESC'
            )
        ));
        $this->set(compact('paginas'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pagina->exists($id)) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		$options = array('conditions' => array('Pagina.' . $this->Pagina->primaryKey => $id));
		$this->set('pagina', $this->Pagina->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add_dem() {
		if ($this->request->is('post')) {
			$this->Pagina->create();
			if ($this->Pagina->save($this->request->data)) {
				return $this->flash(__('The pagina has been saved.'), array('action' => 'index'));
			}
		}
	}
    public function add()
    {
        if (!empty($this->data)) { 
            $this->Pagina->create(); 
            if ($this->Pagina->save($this->data)) { 
                $this->Session->setFlash('Pagina registrada con exito'); 
                $this->redirect(array('action' => 'index'), null, true); 
            } else { 
                $this->Session->setFlash('No se pudo registrar la Pagina'); 
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
		if (!$this->Pagina->exists($id)) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pagina->save($this->request->data)) {
				return $this->flash(__('The pagina has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Pagina.' . $this->Pagina->primaryKey => $id));
			$this->request->data = $this->Pagina->find('first', $options);
		}
	}
    public function edit($id=null){
        $this->Pagina->id = $id;
        if (!$id) {
            $this->Session->setFlash('No existe la Pagina');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Pagina->read();

        } else {
            if ($this->Pagina->save($this->request->data)) {
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
		$this->Pagina->id = $id;
		if (!$this->Pagina->exists()) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pagina->delete()) {
			return $this->flash(__('The pagina has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The pagina could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
    public function delete($id=null){
        $this->Pagina->id=$id;
        $this->request->data=$this->Pagina->read();
        if(!$id){
            $this->Session->setFlash('No existe la Pagina a eliminar');
            $this->redirect(array('action' =>'index'));
        }
        else
        {
            if($this->Pagina->delete($id)){
                $this->Session->setFlash('Se elimino la Pagina '.$this->data['Pagina']['nombre']);
                $this->redirect(array('action' =>'index'));
            }
            else{
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }
 }
