<?php
class PaysController extends AppController {

	public function index(){
		$this->set('pays', $this->Pay->find('all', array(
				'conditions' => array('Pay.deleted' => 0),
				'order' => array('date' => 'DESC')
			))
		);
	}

	public function view($id = null){
		if(isset($id)){
			$this->set('pay', $this->Pay->find('first', array(
				'conditions' => array('id' => $id)
			)));
		}
		else{
			$this->Session->setFlash('Id de payo inválido'/*, 'failure'*/);
			$this->redirect(array('action' => 'index'));
		}
	}

	public function add($id = null, $idPersona = null){
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

					$this->Session->setFlash('Pago ' . $action . ' exitosamente'/*, 'success'*/);
					$this->redirect(array('action' => 'index'));
				}
				else{
					$this->Session->setFlash('Error al guardar el pago'/*, 'failure'*/);
					//recupera el rut al input
					$this->request->data['Pay']['Person']['rut'] = $rut;
					//$this->redirect(array('action' => 'index'));
				}
			}
			else{
				$this->Session->setFlash('Persona no encontrada' /*, 'success' */);
			}
		}

		if(isset($id) && $id != 0){
			$pay = $this->Pay->find('first', array(
				'conditions' => array('Pay.id' => $id)
			));
			$this->request->data['Pay'] = $pay['Pay'];
		}

		if(isset($idPersona)){
			$person = $this->Pay->Person->find('first', array(
				'conditions' => array('Person.id' => $idPersona)
			));
			//Bloquear input!
			pr($person);

			$this->request->data['Pay']['Person'] = $person['Person'];
		}
	}

	public function delete($id = null){
		if(isset($id)){
			$this->Pay->id = $id;
			if($this->Pay->save(array('deleted' => 1))){
				//sumar deuda a la persona


				$this->Session->setFlash('Pago eliminado', 'default', array(), 'good');
			}
			else{
				$this->Session->setFlash('Error al eliminar el pago'/*, 'success'*/);
			}
		}
		else{
			$this->Session->setFlash('Id de pago inválido'/*, 'failure'*/);
		}
		$this->redirect(array('action' => 'index'));
	}
}
?>
