<?php
class ProductsController extends AppController {

	public function index(){
		if (!empty($this->request->data)) {
			$this->set('products', $this->Product->find('all',array(
				'conditions' => array(
					'LCASE(name) LIKE ' => '%' . strtolower($this->request->data['Product']['name']) . '%'
				)
			)
			));

		} else {
			$this->set('products', $this->Product->find('all', array(
					'conditions' => array('deleted' => 0),
					'order' => array('name' => 'asc')
				))
			);
		}
	}

	public function view($id = null){
		if(isset($id)){
			$this->set('product', $this->Product->find('first', array(
				'conditions' => array('id' => $id)
			)));
		}
		else{
			$this->Session->setFlash('Id de producto inválido'/*, 'failure'*/);
			$this->redirect(array('action' => 'index'));
		}
	}

	public function add($id = null){

		if(!empty($this->request->data)){
			if(isset($id)){
				$this->Product->id = $id;
				$action = 'modificado';
			}
			else{
				$this->Product->id = null;
				$action = 'creado';
			}
			if($this->Product->save($this->request->data)){
				$this->Session->setFlash('Producto ' . $action . ' exitosamente'/*, 'success'*/);
				$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash('Error al guardar el producto'/*, 'failure'*/);
				$this->redirect(array('action' => 'index'));
			}
		}

		if(isset($id)){
			$producto = $this->Product->find('first', array(
				'conditions' => array('id' => $id)
			));
			$this->request->data['Product'] = $producto['Product'];
		}
	}

	public function delete($id = null){
		if(isset($id)){
			$this->Product->id = $id;
			if($this->Product->save(array('deleted' => 1))){
				$this->Session->setFlash('Producto eliminado', 'default', array(), 'good');
			}
			else{
				$this->Session->setFlash('Error al eliminar el producto'/*, 'success'*/);
			}
		}
		else{
			$this->Session->setFlash('Id de producto inválido'/*, 'failure'*/);
		}
		$this->redirect(array('action' => 'index'));
	}

}
?>
