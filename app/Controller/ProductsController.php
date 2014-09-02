<?php
class ProductsController extends AppController {

/**
 * components
 * @var array
 */
	public $components = array('RequestHandler');

	public function index() {

		$conditions = array();
		if(!empty($this->request->data)){
			$conditions = array(
				'OR' => array(
					'LCASE(name) LIKE ' => '%' . strtolower($this->request->data['Product']['name']) . '%',
					'LCASE(code) LIKE ' => '%' . strtolower($this->request->data['Product']['name']) . '%'
				)
			);
		}

		$this->paginate = array(
            'conditions' => array_merge(
            	$conditions,
            	array('deleted' => 0)
            ),
			'order' => array('name' => 'asc'),
            'limit'  => 5
        );

	    $this->set('products', $this->paginate('Product'));
	}

	public function view($id = null) {
		if (isset($id)) {
			$this->set('product', $this->Product->find('first', array(
				'conditions' => array('id' => $id)
			)));
		}
		else {
			$this->Session->setFlash('Id de producto inválido'/*, 'failure'*/);
			$this->redirect(array('action' => 'index'));
		}
	}

	public function add($id = null) {

		if (!empty($this->request->data)) {
			if (isset($id)) {
				$this->Product->id = $id;
				$action = 'modificado';
			}
			else {
				$this->Product->id = null;
				$action = 'creado';
			}
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash('Producto ' . $action . ' exitosamente'/*, 'success'*/);
				$this->redirect(array('action' => 'index'));
			}
			else {
				$this->Session->setFlash('Error al guardar el producto'/*, 'failure'*/);
				$this->redirect(array('action' => 'index'));
			}
		}

		if (isset($id)) {
			$producto = $this->Product->find('first', array(
				'conditions' => array('id' => $id)
			));
			$this->request->data['Product'] = $producto['Product'];
		}
	}

	public function delete($id = null) {
		if (isset($id)) {
			$this->Product->id = $id;
			if ($this->Product->save(array('deleted' => 1))) {
				$this->Session->setFlash('Producto eliminado', 'default', array(), 'good');
			}
			else {
				$this->Session->setFlash('Error al eliminar el producto'/*, 'success'*/);
			}
		}
		else {
			$this->Session->setFlash('Id de producto inválido'/*, 'failure'*/);
		}
		$this->redirect(array('action' => 'index'));
	}

/**
 * all function
 * return all products in json format
 *
 * @author vsanmartin
 * @since 2014-08-26
 * @return void
 */
	public function all() {
		$products = $this->Product->find('all', array(
			'conditions' => array('deleted' => 0)
		));

		$json = array();
		foreach($products as $product) {
			$json[$product['Product']['code']] = $product['Product'];
		}
		$products = $json;

		$this->set(compact('products'));
        $this->set('_serialize', array('products'));
	}

	function auto_complete() {
		$this->autoRender = false;
        $products = $this->Product->find('all', array(
            'conditions' => array(
            	'OR' => array(
					'LCASE(name) LIKE ' => '%' . strtolower($this->request->data['Product']['name']) . '%',
					'LCASE(code) LIKE ' => '%' . strtolower($this->request->data['Product']['name']) . '%'
				)
            ),
            'limit' => 	3,
            'recursive'=> -1,
        ));

        $data = [];
        foreach ($products as $key => $value) :
        		$data[$key] = $value['Product']['name'];
        endforeach;

        echo $products = json_encode($data);
    }

}
