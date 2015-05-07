<?php
App::uses('AppController', 'Controller');
/**
 * Imagenes Controller
 *
 * @property Imagene $Imagene
 * @property PaginatorComponent $Paginator
 */
class ImagenesController extends AppController {

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
		$this->Imagene->recursive = 0;
		$this->set('imagenes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Imagene->exists($id)) {
			throw new NotFoundException(__('Invalid imagene'));
		}
		$options = array('conditions' => array('Imagene.' . $this->Imagene->primaryKey => $id));
		$this->set('imagene', $this->Imagene->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Imagene->create();
			if ($this->Imagene->save($this->request->data)) {
				return $this->flash(__('The imagene has been saved.'), array('action' => 'index'));
			}
		}
		$productos = $this->Imagene->Producto->find('list');
		$this->set(compact('productos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Imagene->exists($id)) {
			throw new NotFoundException(__('Invalid imagene'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Imagene->save($this->request->data)) {
				return $this->flash(__('The imagene has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Imagene.' . $this->Imagene->primaryKey => $id));
			$this->request->data = $this->Imagene->find('first', $options);
		}
		$productos = $this->Imagene->Producto->find('list');
		$this->set(compact('productos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Imagene->id = $id;
		if (!$this->Imagene->exists()) {
			throw new NotFoundException(__('Invalid imagene'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Imagene->delete()) {
			return $this->flash(__('The imagene has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The imagene could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}}
