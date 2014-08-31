<?php
class RepositionsController extends AppController {

   	function index(){
		$this->paginate = array(
			'conditions' => array(
				'Reposition.deleted' => 0,
			),
            'order' => array('date' => 'desc'),
            'limit'  => 20
        );

		$this->set('repositions', $this->paginate('Reposition'));
   	}

	public function add($id = null, $idProduct = null){
		if(!empty($this->request->data)){
			if(isset($id) && $id != 0){
				$this->Reposition->id = $id;
				$action = 'modificada';
			}
			else{
				$this->Reposition->id = null;
				$action = 'agregada';
			}
			$name = $this->request->data['Reposition']['Product']['name'];
			$code = $this->request->data['Reposition']['Product']['code'];
			$product = $this->Reposition->Product->find('first', array(
				'fields' => array('stock'),
				'conditions' => array('Product.code' => $this->request->data['Reposition']['Product']['code'])
			));
			if(!empty($product)){
				//setea id de producto y elimina data product de reposición
				$this->request->data['Reposition']['id_product'] = $product['Product']['id'];
				unset($this->request->data['Reposition']['Product']);
				$this->request->data['Reposition']['date'] = date('Y-m-d H:i:s');

				if($this->Reposition->save($this->request->data)){

					//Actualizar stock del prducto
					$product['Product']['stock'] += $this->request->data['Reposition']['cantity'];
					$this->Reposition->Product->save($product);

					$this->Session->setFlash('Reposición ' . $action . ' exitosamente', 'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-success'
					));
					$this->redirect(array('action' => 'index'));
				}
				else{
					$this->Session->setFlash('Error al guardar la reposición', 'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-danger'
					));
					$this->request->data['Reposition']['Product']['name'] = $name;
					$this->request->data['Reposition']['Product']['code'] = $code;
				}
			}
			else{
				$this->Session->setFlash('Producto no encontrado', 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}
		}

		if(isset($id) && $id != 0){
			$reposition = $this->Reposition->find('first', array(
				'conditions' => array('Reposition.id' => $id)
			));
			$this->request->data['Reposition'] = $reposition['Reposition'];
		}

		if(isset($idProduct)){
			$product = $this->Reposition->Product->find('first', array(
				'conditions' => array('Product.id' => $idProduct)
			));
			$this->request->data['Reposition']['Product'] = $product['Product'];
			$this->set(compact('product'));
		}
	}
}
?>
