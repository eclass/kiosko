<?php
class RepositionsController extends AppController {

   	function index(){
   		$this->set('repositions', $this->Reposition->find('all', array(
				'conditions' => array('Reposition.deleted' => 0),
				'order' => array('date' => 'DESC')
			))
		);
   	}

	public function add($id = null, $idProduct = null){
		/*
		if(!empty($this->request->data)){
			if(isset($id) && $id != 0){
				$this->Pay->id = $id;
				$action = 'modificado';
			}
			else{
				$this->Pay->id = null;
				$action = 'agregado';
			}
			$rut = $this->request->data['Pay']['Person']['rut'];
			$person = $this->Pay->Person->find('first', array(
				'fields' => array('debt'),
				'conditions' => array('Person.rut' => $this->request->data['Pay']['Person']['rut'])
			));
			if(!empty($person)){
				//setea id de persona y elimina data persona del pago
				$this->request->data['Pay']['id_person'] = $person['Person']['id'];
				unset($this->request->data['Pay']['Person']);
				$this->request->data['Pay']['date'] = date('Y-m-d H:i:s');

				if($this->Pay->save($this->request->data)){

					//Actualizar deuda de la persona
					$person['Person']['debt'] -= $this->request->data['Pay']['amount'];
					$this->Pay->Person->save($person);

					$this->Session->setFlash('Pago ' . $action . ' exitosamente'/*, 'success'/);
					$this->redirect(array('action' => 'index'));
				}
				else{
					$this->Session->setFlash('Error al guardar el pago'/*, 'failure'/);
					//recupera el rut al input
					$this->request->data['Pay']['Person']['rut'] = $rut;
					//$this->redirect(array('action' => 'index'));
				}
			}
			else{
				$this->Session->setFlash('Persona no encontrada' /*, 'success' /);
			}
		}
		*/

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
			//Bloquear input!

			$this->request->data['Reposition']['Product'] = $product['Product'];
		}
	}
}
?>
