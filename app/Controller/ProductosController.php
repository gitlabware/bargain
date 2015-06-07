<?php

App::uses('AppController', 'Controller');
App::uses('File', 'Utility');

/**
 * Productos Controller
 *
 * @property Producto $Producto
 * @property PaginatorComponent $Paginator
 */
class ProductosController extends AppController {

  /**
   * Components
   *
   * @var array
   */
  public $uses = array('Producto', 'Categoria', 'Imagene', 'Marca', 'Pedido', 'Item', 'Movimiento', 'Parametro');
  public $components = array('Paginator');
  public $layout = 'tienda';

  public function beforeFilter() {
    //parent::beforeFilter();    
    $this->Auth->allow('acerca', 'contacto', 'tienda', 'detalle', 'categorias');
  }

  public $paginate = array(
      'recursive' => -1,      
      'limit' => 9,
      'order' => 'Producto.numero DESC'
  );

  /**
   * index method
   *
   * @return void
   */
  public function index() {
    $this->Producto->recursive = 0;
    $this->set('productos', $this->Paginator->paginate());
  }

  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function view($id = null) {
    if (!$this->Producto->exists($id)) {
      throw new NotFoundException(__('Invalid producto'));
    }
    $options = array('conditions' => array('Producto.' . $this->Producto->primaryKey => $id));
    $this->set('producto', $this->Producto->find('first', $options));
  }

  /**
   * add method
   *
   * @return void
   */
  public function add() {

    if ($this->request->is('post')) {

      $cantidad = $this->request->data['Producto']['cantidad'];
      $precio = $this->request->data['Producto']['precio'];

      if ($this->request->data['Producto']['especial'] == 1)
        $this->request->data['Producto']['estado'] = 2;

      $this->Producto->create();
      if ($this->Producto->save($this->request->data)) {
        $ultimoID = $this->Producto->getLastInsertID();
        $this->request->data['Movimiento']['producto_id'] = $ultimoID;
        $this->request->data['Movimiento']['precio'] = $precio;
        $this->request->data['Movimiento']['entrada'] = $cantidad;
        $this->request->data['Movimiento']['total'] = $cantidad;
        $this->Movimiento->save($this->request->data['Movimiento']);

        $this->Session->setFlash('Producto Guardado Correctamente', 'alerts/bueno');
        $this->redirect(array('action' => 'insertaimagenes', $ultimoID));
      }
    }
    $dcc = $this->Producto->Categoria->find('list', array(
        'fields' => array('id', 'nombre')
    ));
    $dcm = $this->Producto->Marca->find('list', array(
        'fields' => array('id', 'nombre')
    ));
    $this->set(compact('dcc', 'dcm'));
  }

  /**
   * edit method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function edit_dem($id = null) {
    if (!$this->Producto->exists($id)) {
      throw new NotFoundException(__('Invalid producto'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Producto->save($this->request->data)) {
        return $this->flash(__('The producto has been saved.'), array('controller' => 'Productos', 'action' => 'listado', 'alerts/bueno'));
      }
    } else {
      $options = array('conditions' => array('Producto.' . $this->Producto->primaryKey => $id));
      $this->request->data = $this->Producto->find('first', $options);
    }
    $dcc = $this->Producto->Categoria->find('list', array('fields' => array('id', 'nombre')));
    $categorias = $this->Producto->Categoria->find('list');
    $dcm = $this->Producto->Marca->find('list', array(
        'fields' => array('id', 'nombre')
    ));
    $this->set(compact('categorias', 'dcc', 'dcm'));
  }

  public function edit($id = null) {
    $this->Producto->id = $id;
    if (!$id) {
      $this->Session->setFlash('No existe el Producto');
      $this->redirect(array('controller' => 'Productos', 'action' => 'listado'), null, true);
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->Producto->read();
    } else {
      if ($this->request->data['Producto']['especial'] == 1)
        $this->request->data['Producto']['estado'] = 2;
      else
        $this->request->data['Producto']['estado'] = 1;

      if ($this->Producto->save($this->request->data)) {
        $this->Session->setFlash('Los datos fueron modificados', 'alerts/bueno');
        $this->redirect(array('controller' => 'Productos', 'action' => 'listado'), null, true);
      } else {
        $this->Session->setFlash('no se pudo modificar!!');
      }
    }
    $dcc = $this->Producto->Categoria->find('list', array('fields' => array('id', 'nombre')));
    $categorias = $this->Producto->Categoria->find('list');
    $dcm = $this->Producto->Marca->find('list', array(
        'fields' => array('id', 'nombre')));
    $this->set(compact('categorias', 'dcc', 'dcm'));
  }

  /**
   * delete method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function delete($id = null) {
    $this->Producto->id = $id;
    if (!$this->Producto->exists()) {
      throw new NotFoundException(__('Invalid producto'));
    }
    //$this->request->onlyAllow('post', 'delete');
    if ($this->Producto->delete()) {
      //return $this->flash(__('The producto has been deleted.'), array('controller' => 'Productos', 'action' => 'listado'));
      $this->Session->setFlash('El producto fue eliminado', 'alerts/bueno');
      $this->redirect(array('action' => 'listado'));
    } else {
      return $this->flash(__('The producto could not be deleted. Please, try again.'), array('controller' => 'Productos', 'action' => 'listado'));
    }
  }

  public function listado() {
    $productos = $this->Producto->find('all', array(
        'recursive' => 0,
        'limit' => 50,
        'order' => array(
            'Producto.id DESC'
        )
    ));
    //debug($productos);
    $this->set(compact('productos'));
  }

  public function tienda() {
    $this->layout = 'publico';
    $sqlCuantosProducto = $this->Producto->find('count', array('recursive' => -1));
    //debug($sqlCuantosProducto);
    $productosFilaUno = $this->Producto->find('all', array(
        'recursive' => -1,
        'conditions' => array('Producto.estado' => 1),
        'limit' => 14,
        'order' => 'RAND()'
    ));

    //debug($productosFilaUno);
    $this->set(compact('productosFilaUno', 'productosEspeciales'));
  }

  public function insertaimagenes($idProducto = null) {
    if ($this->request->is('post')) {
      //debug($this->request->data);
      //$idProducto
      //die;
      for ($i = 0; $i <= 2; $i++) {
        $archivoImagen = $this->request->data['Imagen'][$i]['imagen'];
        $nombreOriginal = $this->request->data['Imagen'][$i]['imagen']['name'];
        $numero = $this->request->data['Imagen'][$i]['numero'];

        //debug($nombreOriginal);
        if (!empty($nombreOriginal)) {
          $auxiliarExtension = explode(".", $nombreOriginal);
          $extensionImagen = $auxiliarExtension[1];

          if ($archivoImagen['error'] === UPLOAD_ERR_OK) {
            $nombre = string::uuid();
            $nombreCompleto = $nombre . '.' . $extensionImagen;
            if (move_uploaded_file($archivoImagen['tmp_name'], WWW_ROOT . 'files' . DS . 'img' . DS . $nombreCompleto)) {
              //$ultimo = $this->Ambiente->find('first', array('order' => 'Ambiente.id DESC'));
              $this->Imagene->create();
              $this->request->data['Imagene']['imagen'] = $nombre . '.' . $extensionImagen;
              $this->request->data['Imagene']['producto_id'] = $idProducto;
              $this->request->data['Imagene']['numero'] = $numero;
              //debug($this->request->data['Imagene']);
              $this->Imagene->save($this->request->data['Imagene']);
              //$idAmbiente = $this->Ambiente->getLastInsertID();                            
            } else {
              //$this->redirect(array('action' => 'listado'));
            }
          } else {
            //$this->redirect(array('action' => 'listado'));
          }
        }
      }$this->Session->setFlash('Imagenes Guradadas', 'alerts/bueno');
      $this->redirect(array('action' => 'listado'));
      //die;
    }
    $datosProducto = $this->Producto->findById($idProducto);
    //debug($datosProducto);
    $this->set(compact('datosProducto'));
  }

  public function detalle($idProducto = null) {
    //$this->layout = 'tiendadetalle';
    $this->layout = 'publico';
    $datosProducto = $this->Producto->find('first', array(
        'recurisve' => -1,
        'conditions' => array('Producto.estado' => 1, 'Producto.id' => $idProducto),
        'limit' => 14,
        'order' => 'RAND()'
    ));
    $categoriaProducto = $datosProducto['Producto']['categoria_id'];
    //debug($categoriaProducto);die;
    //debug($datosProducto);die;
    $productosCategoria = $this->Producto->find('all', array(
        'recurisve' => -1,
        'conditions' => array('Producto.estado' => 1, 'Producto.categoria_id' => $categoriaProducto),
        'limit' => 8,
        'order' => 'RAND()'
    ));
    $this->set(compact('datosProducto', 'productosCategoria'));
  }

  public function ajaxver($idProducto = null) {
    $this->layout = 'ajax';
    $datosProducto = $this->Producto->find('first', array(
        'recursive' => 0,
        'conditions' => array('Producto.id' => $idProducto)
    ));
    $imagenesProducto = $this->Imagene->find('all', array(
        'recursive' => -1,
        'conditions' => array('Imagene.producto_id' => $idProducto)
    ));
    $this->set(compact('datosProducto', 'imagenesProducto'));
  }

  public function visible($id = null) {
    $this->Producto->id = $id;
    $this->request->data['Producto']['estado'] = 1;
    if ($this->Producto->save($this->request->data)) {
      $this->Session->setFlash('se mostrara visible en el Producto', 'alerts/bueno');
      $this->redirect(array('action' => 'listado'));
    }
  }

  public function novisible($id = null) {
    $this->Producto->id = $id;
    $this->request->data['Producto']['estado'] = 0;
    if ($this->Producto->save($this->request->data)) {
      $this->Session->setFlash('no se mostrara visible en el Producto listado', 'alerts/bueno');
      $this->redirect(array('action' => 'listado'));
    }
  }

  public function ajaxadcarrito($idUsuario, $idProducto) {
    $this->layout = 'ajax';
    //$consultaPedido = $this->Pedido->findByUserId($idProducto, null, null, null, null, -1);
    $consultaPedido = $this->Pedido->find('first', array(
        'recursive' => -1,
        'conditions' => array(
            'Pedido.user_id' => $idUsuario,
            'Pedido.estado' => 5
        )
    ));
    //debug($consultaPedido);exit;
    if (empty($consultaPedido)) {
      $this->request->data['Pedido']['user_id'] = $idUsuario;
      $this->request->data['Pedido']['estado'] = 5;
      $this->Pedido->create();
      if ($this->Pedido->save($this->request->data)) {
        $datosProducto = $this->Producto->findById($idProducto, null, null, null, null, -1);
        $precio = $datosProducto['Producto']['precio'];
        $idPedido = $this->Pedido->getLastInsertID();

        $this->request->data['Item']['producto_id'] = $idProducto;
        $this->request->data['Item']['pedido_id'] = $idPedido;
        $this->request->data['Item']['precio'] = $precio;
        $this->request->data['Item']['cantidad'] = 1;
        $this->request->data['Item']['estado'] = 5;

        $this->Item->create();
        if ($this->Item->save($this->request->data['Item'])) {
          $datosPedido = $this->Pedido->findById($idPedido, null, null, null, null, 0);
          //$datosPedido
          $this->set(compact('datosPedido'));
        }
      }
    } else {

      $veItem = $this->Item->find('first', array(
          'recursive' => -1,
          'conditions' => array(
              'Item.producto_id' => $idProducto,
              'Item.estado' => 5
          )
      ));

      $idPedido = $veItem['Item']['pedido_id'];

      if ($veItem) {
        $idItem = $veItem['Item']['id'];
        $cantidad = $veItem['Item']['cantidad'];
        $cantidad++;
        $data = array('id' => $idItem, 'cantidad' => $cantidad);
        if ($this->Item->save($data)) {
          $datosPedido = $this->Pedido->findById($idPedido, null, null, null, null, 0);
          //debug($datosPedido);die;
          $this->set(compact('datosPedido'));
        }
        //debug($veItem);exit;
      } else {
        $datosProducto = $this->Producto->findById($idProducto, null, null, null, null, 0);
        $precio = $datosProducto['Producto']['precio'];
        //debug($consultaPedido);
        $idPedido = $consultaPedido['Pedido']['id'];
        $this->request->data['Item']['producto_id'] = $idProducto;
        $this->request->data['Item']['pedido_id'] = $idPedido;
        $this->request->data['Item']['precio'] = $precio;
        $this->request->data['Item']['cantidad'] = 1;
        $this->request->data['Item']['estado'] = 5;
        //debug($this->request->data['Item']);exit;
        if ($this->Item->save($this->request->data['Item'])) {
          $datosPedido = $this->Pedido->findById($idPedido, null, null, null, null, 0);
          $this->set(compact('datosPedido'));
        }
      }
    }
  }

  public function imagenes($idProducto = null) {
    $imagenesProducto = $this->Imagene->find('all', array(
        'recursive' => -1,
        'conditions' => array('Imagene.producto_id' => $idProducto)
    ));

    $datosProducto = $this->Producto->findById($idProducto, null, null, null, null, -1);

    if ($this->request->is('post')) {
      //debug($this->request->data);die;
      //$idProducto
      //die;
      for ($i = 0; $i <= 2; $i++) {
        $archivoImagen = $this->request->data['Imagen'][$i]['imagen'];
        $nombreOriginal = $this->request->data['Imagen'][$i]['imagen']['name'];
        $numero = $this->request->data['Imagen'][$i]['numero'];

        //debug($nombreOriginal);
        if (!empty($nombreOriginal)) {
          $auxiliarExtension = explode(".", $nombreOriginal);
          $extensionImagen = $auxiliarExtension[1];

          if ($archivoImagen['error'] === UPLOAD_ERR_OK) {
            $nombre = string::uuid();
            $nombreCompleto = $nombre . '.' . $extensionImagen;
            if (move_uploaded_file($archivoImagen['tmp_name'], WWW_ROOT . 'files' . DS . 'img' . DS . $nombreCompleto)) {
              //$ultimo = $this->Ambiente->find('first', array('order' => 'Ambiente.id DESC'));
              $this->Imagene->create();
              $this->request->data['Imagene']['imagen'] = $nombre . '.' . $extensionImagen;
              $this->request->data['Imagene']['producto_id'] = $idProducto;
              $this->request->data['Imagene']['numero'] = $numero;
              //debug($this->request->data['Imagene']);
              $this->Imagene->save($this->request->data['Imagene']);
              //$idAmbiente = $this->Ambiente->getLastInsertID();                            
            } else {
              //$this->redirect(array('action' => 'listado'));
            }
          } else {
            //$this->redirect(array('action' => 'listado'));
          }
        }
      }$this->Session->setFlash('Imagenes Guradadas', 'alerts/bueno');
      $this->redirect(array('action' => 'listado'));
      //die;
    }
    //$datosProducto = $this->Producto->findById($idProducto);
    //debug($datosProducto);
    //$this->set(compact('datosProducto'));

    $this->set(compact('imagenesProducto', 'datosProducto'));
  }

  public function eliminaimagen($idImagen = null) {
    $datosImagen = $this->Imagene->findById($idImagen, null, null, null, null, -1);
    $idProducto = $datosImagen['Imagene']['producto_id'];
    $imagen = WWW_ROOT . 'files' . DS . 'img' . DS . $datosImagen['Imagene']['imagen']; //puedes usar dobles comillas si quieres 
    //File::delete
    $file = new File($imagen);
    if ($this->Imagene->delete($idImagen)) {
      if ($file->exists()) {
        $file->delete();
        $this->redirect(array('action' => 'imagenes', $idProducto));
      }
    }
    //$file->delete($imagen);
    //File::delete($imagen);
    //debug($imagen);
    //die;
  }

  public function carrito() {
    $this->layout = 'publico';
    $idUsuario = $this->Session->read('Auth.User.id');
    $datosPedido = $this->Pedido->find('first', array(
        'recursive' => 1,
        'conditions' => array(
            'Pedido.user_id' => $idUsuario,
            'Pedido.estado' => 5
        )
    ));

    $datosParametros = $this->Parametro->find('first', array(
        'recursive' => -1
    ));

    if ($this->request->is('post')) {

//            debug($this->request->data);
//            exit;
//            $cantidadItems = count($this->request->data['Producto']);
//            $idItem = $this->request->data['Dpedido']['0']['id'];
//            $datosItemCero = $this->Item->find('first', array(
//                'recursive'=>-1,
//                'conditions'=>array('Item.id'=>$idItem)
//            ));
      $tax = $this->request->data['Producto']['tax'];
      $shipping = $this->request->data['Producto']['shipping'];

      $idPedido = $this->request->data['Dpedido']['0']['pedido_id'];
      //debug($idPedido);die;
      $this->Pedido->read(null, $idPedido);
      $this->Pedido->set(array(
          'estado' => 6,
          'shipping' => $shipping,
          'tax' => $tax
      ));
      $this->Pedido->save();
      //$data = array('id' => $idPedido, 'estado' => 6);            
      //$this->Pedido->save($data);
      //debug($cantidadItems);
      foreach ($this->request->data['Dpedido'] as $dp) {
        $idItem = $dp['item_id'];
        $cantidad = $dp['cantidad'];
        //debug($idProducto);
        $this->Item->read(null, $idItem);
        $this->Item->set(array(
            'cantidad' => $cantidad,
            'estado' => 6
        ));
        //debug($idProducto);
        $this->Item->save();
      }
      $this->Session->setFlash('Order Successfully');
      $this->redirect(array('controller' => 'productos', 'action' => 'pedidorealizado', $idPedido));
    }
    //debug($consultaPedido);die;
    $this->set(compact('datosPedido', 'datosParametros'));
  }

  public function eliminadelcarrito($idItem = null) {
    $this->Item->id = $idItem;
    if (!$this->Item->exists()) {
      throw new NotFoundException(__('Invalid producto'));
    }
    //$this->request->onlyAllow('post', 'delete');
    if ($this->Item->delete()) {
      //return $this->flash(__('The producto has been deleted.'), array('controller' => 'Productos', 'action' => 'listado'));
      $this->redirect(array('controller' => 'productos', 'action' => 'carrito'));
    } else {
      //return $this->flash(__('The producto could not be deleted. Please, try again.'), array('controller' => 'Productos', 'action' => 'listado'));
    }
  }

  public function categorias($idCategoria = null) {
    $this->layout = 'publico';
    
    $this->Paginator->settings = $this->paginate;
    
    $data = $this->Paginator->paginate(      
      array('Producto.categoria_id LIKE' => $idCategoria)
    );
    
    $productos = $this->Producto->find('all', array(
        'recursive' => -1,
        'conditions' => array(
            'Producto.estado' => 1,
            'Producto.categoria_id' => $idCategoria,
        ),
        'limit' => 18,
        'order' => 'Producto.numero DESC'
    ));

    $this->set(compact('productos', 'data'));
  }

  public function acerca() {
    $this->layout = 'publico';
  }

  public function contacto() {
    $this->layout = 'publico';
  }

  public function pedidorealizado($idPedido = null) {
    $this->layout = 'publico';
    //debug($idPedido);die;
    $datosPedido = $this->Pedido->find('first', array(
        'recursive' => 1,
        'conditions' => array('Pedido.id' => $idPedido)
    ));
    $this->set(compact('datosPedido'));
  }

}
